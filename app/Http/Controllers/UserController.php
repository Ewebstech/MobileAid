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

    public function viewUser(Request $request){
        $data['sessiondata'] = $_SESSION['UserDetails'];
        $role = $data['sessiondata']['role'];
        
        $data['UserDetails'] =  $this->getUserDetails($data['sessiondata']['email']);
    
        $URI= '/'.$role.'/view-profile';
        return view($URI)->with($data);
     }

    public function editUser(Request $request){
        $data['sessiondata'] = $_SESSION['UserDetails'];
        $role = $data['sessiondata']['role'];
        
        $data['UserDetails'] =  $this->getUserDetails($data['sessiondata']['email']);
          
        $URI= '/'.$role.'/edit-profile';
        return view($URI)->with($data);
     }

     public function getTodayRegs(){
        $userQuery = new Users;
        $userData = $userQuery->getUserRegToday();
        return $userData;
     }
     
     public function getUserDetails($username){
         $userQuery = new Users;
         $userData = $userQuery->getUser($username);

         if($userData){
            $userInfo = $userData->toArray();
       
            if($userInfo["role"] == "admin"){ 
                $UserDetails['firstname'] = $userInfo['firstname'];
                $UserDetails['lastname'] = $userInfo['lastname'];
                $UserDetails['phonenumber'] = $userInfo['phonenumber'];
                $UserDetails['email'] = $userInfo['email'];
                $UserDetails['Kyc'] = [];
                $UserDetails['ClientId'] = $userInfo['client_id'];
            } else {
                $userContent = $this->jsonToArray($userInfo['content']);
                if($userContent != null){
                    foreach($userContent as $field => $value){
                        $UserDetails[$field] = $value;
                    }
                } else {
                    $UserDetails['firstname'] = $userInfo['firstname'];
                    $UserDetails['lastname'] = $userInfo['lastname'];
                    $UserDetails['phonenumber'] = $userInfo['phonenumber'];
                    $UserDetails['email'] = $userInfo['email'];
                    $UserDetails['Kyc'] = [];
                    $UserDetails['ClientId'] = $userInfo['client_id'];
                }
            }

            $UserDetails['ClientId'] = $userInfo['client_id'];
            $UserDetails['Role'] = $userInfo['role'];
            $UserDetails['avatar'] = $userInfo['avatar'];

            return $UserDetails;
        }
        
        
    }


    public function getUserDetailsById($userId){
        $userQuery = new Users;
        $userData = $userQuery->getUserById($userId);

        if($userData){
           $userInfo = $userData->toArray();
      
           if($userInfo["role"] == "admin"){ 
               $UserDetails['firstname'] = $userInfo['firstname'];
               $UserDetails['lastname'] = $userInfo['lastname'];
               $UserDetails['phonenumber'] = $userInfo['phonenumber'];
               $UserDetails['email'] = $userInfo['email'];
               $UserDetails['Kyc'] = [];
               $UserDetails['ClientId'] = $userInfo['client_id'];
           } else {
               $userContent = $this->jsonToArray($userInfo['content']);
               if($userContent != null){
                   foreach($userContent as $field => $value){
                       $UserDetails[$field] = $value;
                   }
               } else {
                   $UserDetails['firstname'] = $userInfo['firstname'];
                   $UserDetails['lastname'] = $userInfo['lastname'];
                   $UserDetails['phonenumber'] = $userInfo['phonenumber'];
                   $UserDetails['email'] = $userInfo['email'];
                   $UserDetails['Kyc'] = [];
                   $UserDetails['ClientId'] = $userInfo['client_id'];
               }
           }

           $UserDetails['ClientId'] = $userInfo['client_id'];
           $UserDetails['Role'] = $userInfo['role'];
           $UserDetails['avatar'] = $userInfo['avatar'];

           return $UserDetails;
       }
       
       
   }

    public function getAllUsersByRole($role){
        $userQuery = new Users;
        $userData = $userQuery->getUsersByRole($role);
        //  dd($role);
        $UserDetails = [];
        if($userData){
           $userInfo = $userData->toArray();
            //dd($userInfo);
            $i = 0;
            foreach($userInfo as $users){
                $userContent = $this->jsonToArray($users['content']);
                if($userContent != null){
                    foreach($userContent as $field => $value){
                        $UserDetails[$i][$field] = $value;
                    }
                } else {
                    $UserDetails[$i]['firstname'] = $users['firstname'];
                    $UserDetails[$i]['lastname'] = $users['lastname'];
                    $UserDetails[$i]['phonenumber'] = $users['phonenumber'];
                    $UserDetails[$i]['email'] = $users['email'];
                    $UserDetails[$i]['Kyc'] = [];
                    
                }
                $UserDetails[$i]['ClientId'] = $users['client_id'];
                $UserDetails[$i]['Role'] = $users['role'];
                $UserDetails[$i]['avatar'] = $users['avatar'];
                $i++;
            }
            return ($UserDetails) ? $UserDetails : "";
       }
       
   }
    
    public function saveUser(Request $request) {
        $params = $request->all();
        //dd($params);
        //validate requests
        if($params["role"] == "patient"){
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
                'role' => 'required'
            ]);
    
        } else {
            $validator =  Validator::make($request->all(), [
                //validation rules
                'email' => 'email|required',  
                'phonenumber' => 'required',
                'contact_address' => '',
                'city' => '',
                'postal_code' => '',
                'country' => '',
                
            ]);
        }

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
                    'template' => 'profile_update',
                    'Username' => $params['email']
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
