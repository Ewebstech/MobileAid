<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Helpers\HttpStatusCodes;
use App\Model\Users;
use App\Http\Controllers\HelperController;

class UserController extends Controller
{
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
            $this->middleware('redirectauth', ['except' => [
                'saveUser'
            ]]);
        
        $this->helper = new HelperController;
    }

    public function editUser(Request $request){
        $data['sessiondata'] = $_SESSION['UserDetails'];
        $role = $data['sessiondata']['role'];
        
        $data['UserDetails'] =  $this->getUserDetails($data['sessiondata']['email']);
        if(!$data['UserDetails']['Kyc']){
            $data['UserDetails']['Kyc'] = [];
        }
      
        $URI= '/'.$role.'/edit-profile';
        return view($URI)->with($data);
     }

     public function getUserDetails($username){
         $userQuery = new Users;
         $userData = $userQuery->getUser($username);

         if($userData){
            $userInfo = $userData->toArray();
            $userContent = $this->jsonToArray($userInfo['content']);
            $UserDetails['Kyc']['emergency_contact_name_1'] = "";
            $UserDetails['Kyc']['emergency_contact_name_2'] = "";
            $UserDetails['Kyc']['emergency_contact_num_1'] = "";
            $UserDetails['Kyc']['emergency_contact_num_2'] = "";
            $UserDetails['Kyc']['hmo_information'] = "";
            $UserDetails['Kyc']['postal_code'] = "";
            $UserDetails['Kyc']['city'] = "";
            $UserDetails['Kyc']['medical_condition_details'] = "";
            $UserDetails['Kyc']['contact_address'] = "";
            $UserDetails['Kyc']['country'] = "";
            $UserDetails['Kyc']['treatment_status'] = "";


            foreach($userContent as $field => $value){
                $UserDetails[$field] = $value;
            }
            $UserDetails['ClientId'] = $userInfo['client_id'];
            $UserDetails['Role'] = $userInfo['role'];
            $UserDetails['avatar'] = $userInfo['avatar'];
         }

         return $UserDetails;
     }

    public function saveUser(Request $request) {
        $params = $request->all();
        //validate requests

        $validator =  Validator::make($request->all(), [
            //validation rules
            'treatment_status' => '',
            'email' => 'email|required',  
            'phonenumber' => 'required',
            'emergency_contact_name_1' => '',
            'emergency_contact_num_1' => '',
            'emergency_contact_name_2' => '',
            'emergency_contact_num_2' => '',
            'hmo_reg_status' => '',
            'hmo_information' => '',
            'medical_condition' => '',
            'medical_condition_details' => '',
            'contact_address' => '',
            'city' => '',
            'postal_code' => '',
            'country' => '',
            
        ]);

        if($validator->fails()) {
            //if validation error return error messages
            if(isset($params['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }

        $userDetails_1 = User::where('email', $params['email'])->where('phonenumber', $params['phonenumber'])->first();
       
        if($userDetails_1){

            $retrievedDataContent = $userDetails_1->toArray()['content'];
            $Content = $this->jsonToArray($retrievedDataContent);
            $Content['Kyc'] = $params;
     
        try{
            $params['content'] = json_encode($Content);
            //creates a new user in database
            $userQuery = new Users();
            $updateUser = $userQuery->updateUserDetails($params);

            if($updateUser){
                // Send Email to User
                $mailParams = [
                    'Name' => $Content['firstname']. " ". $Content['lastname'],
                    'Email' => $params['email'],
                    'Subject' => 'Notification on Profile Update',
                    'template' => 'emails.profile_update'
                ];

                $sendMail = $this->helper->sendMail($mailParams);

                if(isset($params['view'])){
                    if($updateUser){
                        $status = "success";
                        $data = "Your Data has been Updated Successfully";
                        return $this->returnOutput($status,$data);
                    } else {
                        $status = "failure";
                        $data = "Error on Update. Please Try again!";
                        return $this->returnOutput($status,$data);
                        
                    }
                } else {
                    $msg = "Data Update Successful";
                    $data = $params['content'];
                    return $this->regSuccess($msg, $data, HttpStatusCodes::OK);
                }
            }

        } catch(\Exception $e) {
            //something went wrong during registration
                return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
            }
        } else {
            return $this->validationError('Wrong User Email or Phonenumber', HttpStatusCodes::BAD_REQUEST);
        }


    }
    
}