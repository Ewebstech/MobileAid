<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Users;
use App\Utils\RequestRules;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\UploadController;

class UserController extends Controller
{
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
            $this->middleware('redirectauth', ['except' => [
                'saveUser','editProfile', 'getRefreshedDetails'
            ]]);
            // $this->middleware('jwt-auth', ['only' => [
            //     'editProfile'
            // ]]);
        
        $this->helper = new HelperController;
    }


    public function getRefreshedDetails(Request $request){
        $params = $request->all();
        //dd($params);
        $validator =  Validator::make($request->all(), RequestRules::getRule('GET_USER_DETAILS'));
    
        if($validator->fails()) {
            //if validation error return error messages
            if(isset($params['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }

        $userDetails_1 = User::where('client_id', $params['client_id'])->first();
       
        if($userDetails_1){
     
        try{
            if(isset($params['view'])){
                if($updateUser){
                    $status = "success";
                    $data = "Your Data has been Retrieved Successfully";
                    return $this->returnOutput($status,$data);
                } else {
                    $status = "failure";
                    $data = "Error on Update. Please Try again!";
                    return $this->returnOutput($status,$data);
                    
                }
            } else {
                $msg = "Data Retrieval Successful";
                $data = $userDetails_1;
                return $this->regSuccess($msg, $data, HttpStatusCodes::OK);
            }
    

        } catch(\Exception $e) {
            //something went wrong during registration
                return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
            }
        } else {
            return $this->validationError('Wrong Client ID', HttpStatusCodes::BAD_REQUEST);
        }

    }

    public function editProfile(Request $request){
        $params = $request->all();
        //dd($params);
        $validator =  Validator::make($request->all(), RequestRules::getRule('UPDATE_PROFILE'));
    
        if($validator->fails()) {
            //if validation error return error messages
            if(isset($params['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }

        $userDetails_1 = User::where('phonenumber', $params['phonenumber'])->first();
       
        if($userDetails_1){

            $retrievedDataContent = $userDetails_1->toArray()['content'];
            
            $Content = $this->jsonToArray($retrievedDataContent);
     
        try{
            //dd($request->file('image_name'));
            if(isset($params['view']) and is_object($request->file('image_name'))){
                /**
                 * Upload and Change Profile Picture
                 */
                //dd($request->file('image_name'));
                $folder = "profile/".$params['phonenumber'];
                $imageUpload = UploadController::store($request,$folder);
                $params["avatar"] = $imageUpload['imageurl'];
                //dd($imageUpload);
            }
            //($Content);
            //dd($params['avatar'])
            $Content['firstname'] = isset($params["firstname"]) ? $params["firstname"] : $Content["firstname"];
            $Content['email'] = $params['email'];
            $Content['lastname'] = isset($params["lastname"]) ? $params["lastname"] : $Content["lastname"];
            $Content['avatar'] = isset($params["avatar"]) ? $params["avatar"] : $Content['avatar'];
            $params['avatar'] = isset($params["avatar"]) ? $params["avatar"] : $Content['avatar'];
            $Content['user'] = $params["email"];
            $Content['gender'] = $params["gender"];
            $Content['role'] = $params["role"];

            if(isset($params['password']) and !empty($params['password'])){
                $params['hashed_password'] =  hash::make($params['password']);
            } else {
                $params['hashed_password'] = null;
            }
          
            $params['content'] = json_encode($Content);
            //creates a new user in database
            $userQuery = new Users();
            $updateUser = $userQuery->updateUserDetails($params);
            $getUser = $userQuery->getUser($params['email']);
            $allDetails = $getUser->toArray();
            //dd($allDetails);
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
                        // Update Session Data
                        $sessionUserDetails = $this->helper->setSession($allDetails);
                        //dd($sessionUserDetails);
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
            $UserDetails['role'] = $userInfo['role'];
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
           $UserDetails['role'] = $userInfo['role'];
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
                $UserDetails[$i]['role'] = $users['role'];
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
        if($params["role"] == "client"){
            $validator =  Validator::make($request->all(), RequestRules::getRule('PATIENT_KYC'));
    
        } else {
            $validator =  Validator::make($request->all(), RequestRules::getRule('OTHER_KYC'));
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
            $params['hashed_password'] = null;
            $params['avatar'] = isset($Content['avatar']) ? $Content['avatar'] : '/images/male_avatar.png';
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
