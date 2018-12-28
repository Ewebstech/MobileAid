<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Users;
use App\Subscription;
use App\Model\Transactions;
use App\Utils\RequestRules;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;

class UssdController extends Controller
{
    protected $helper;


    public function __construct()
    {
        $this->helper = new HelperController;
    }

    public function ussd_registerUser(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('USSD_REGISTER'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $gender = $params['gender'];
        $params['role'] = "client";

        if($gender == "male"){
           $avatar_img = "/images/male_avatar.png";
        } elseif($gender == "female") {
            $avatar_img = "/images/female_avatar.png";
        } else {
            $avatar_img = "/images/male_avatar.png";
        }

        try{
            $clientID = strtoupper($this->generateClientId());
            $params['password'] = $this->generateDefaultStaticPassword(6);
           
            // Create Dummy Email Address
            $params['client_id'] = $clientID;
            $params['avatar'] = $avatar_img;
            $params['email'] = strtolower($clientID)."@tempemail.com";
            $content = json_encode($params);
            //creates a new user in database
            $user = [
                'firstname' => ucfirst(strtolower($params['firstname'])),
                'lastname' => ucfirst(strtolower($params['lastname'])),
                'email' => $params['email'],
                'phonenumber' => $params['phonenumber'],
                'password' => hash::make($params['password']),
                'avatar' => $params['avatar'],
                'role' => $params['role'],
                'remember_token' => str_random(rand(0,9)),
                'content' => $content,
                'client_id' => $clientID,
            ];

            $saveUserData = User::create($user);
            
        } catch(\Exception $e) {
            //something went wrong during registration
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        }
        
        if($saveUserData){
            // Send SMS to User

            $msg = 'Hello '. $user['firstname']. ', Your Registration Was Successful!';
            $data = $user;
            return $this->regSuccess($msg, $params, HttpStatusCodes::OK);
        }
        
    }

    public function ussd_getUserSubscription(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('USSD_QUERY_SUBSCRPTION_DATA'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('phonenumber', $params['phonenumber'])->first();
        $has_Subscription = Subscription::where('phonenumber', $params['phonenumber'])->first();
        
        if($userDetails){
            if($has_Subscription){
                try{
                    $subData = $this->helper->getUserSubscriptionDataViaMobile($params['phonenumber']);
                    //dd($subData);
                    if($subData){
                        $msg = 'Subscription Data Retrieved';
                        $data = $subData;
                        return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                    }
        
                } catch(\Exception $e) {
                    //something went wrong during registration
                    return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        
                }
            } else {
                return $this->validationError('No Subscription Package Exists for this User!', HttpStatusCodes::NOT_FOUND);
            }
        
        } else {
            return $this->validationError('Wrong Client ID or Phonenumber', HttpStatusCodes::BAD_REQUEST);
        }
        
    }

    public function ussd_GetUserName(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('SEARCH_2MA'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('phonenumber', $params['phonenumber'])->first();
        //$has_Subscription = Subscription::where('phonenumber', $params['phonenumber'])->first();
        
        if($userDetails){
                try{
                    $subData = $this->arraylize($userDetails);
                    //dd($subData);
                    if($subData){
                        $msg = 'User Data Retrieved';
                        $data = $subData['firstname']. " ". $subData['lastname'];
                        return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                    }
        
                } catch(\Exception $e) {
                    //something went wrong during registration
                    return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        
                }
        
        } else {
            return $this->validationError('Wrong Client ID or Phonenumber', HttpStatusCodes::BAD_REQUEST);
        }
        
    }

    public function UssdPaymentValidation(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('USSD_PAYMENT_VALIDATION'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('phonenumber', $params['phonenumber'])->first();
             
        if($userDetails){
                try{
                    $subData = $this->arraylize($userDetails);
                   
                    if($subData){

                        $params['client_id'] = $subData['client_id'];
                        $params['email'] = $subData['email'];
                        $params['currency'] = "NGN";
                        $params['channel'] = "USSD";
                        $params['amount'] = (int) $params['amount'] * 100;
                        
                       
                        $Resource = new Transactions;
                        $saveTrans = $Resource->addTransactionUssd($params);
                        if(is_bool($saveTrans)){
                            // Credit Customers
                            
                            $usersSubData = $this->helper->getUserSubscriptionData($params['email']);
                            
                            $subparams = $this->jsonToArray($usersSubData['content']);
                           
                            // Current Call Number                                                                                        
                            $remaining_calls = $this->helper->getCalls($params['client_id']);
                            //dd($subparams);
                            if($params['status'] == "success"){
                             
                                $callable = $this->helper->getpackageDetails($subparams['package'])['LocalMaxCalls'];
                                $new_calls = (int) $remaining_calls + (int) $callable;
                            } else {
                                $new_calls = (int) $remaining_calls + 0;
                            }
                           
                            $subparams['calls'] = $new_calls;
                            $subparams['status'] = 'Active';
                            
                            $subQuery = new Subscriptions();
                            $subDetails = $subQuery->updateSubscription($subparams);
                            
                            if($subDetails){
                                // Update Users Table with Subscription Details
                                $userQuery = new Users;
                                $userUpdate = $userQuery->updateUserContent($subparams);   
                            }

                            if($userUpdate){
                                $msg = "Payment Notification";
                                $data = $params;
                                return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                            } 
                            
                        } else {
                            return $this->validationError('Transaction ID is Expired!', HttpStatusCodes::BAD_REQUEST);
                        }
                       
                    }
        
                } catch(\Exception $e) {
                    //something went wrong during registration
                    return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
                }
        
        } else {
            return $this->validationError('Invalid Phonenumber', HttpStatusCodes::BAD_REQUEST);
        }
        
    }



}
