<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HelperController;
use App\Utils\RequestRules;
use App\User;
use App\Subscription;
use App\Model\Users;

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
            $contentParams = $params;
            unset($contentParams['password']);
            $content = json_encode($contentParams);
            //creates a new user in database
            $user = [
                'firstname' => ucfirst(strtolower($params['firstname'])),
                'lastname' => ucfirst(strtolower($params['lastname'])),
                'email' => $params['email'],
                'phonenumber' => $params['phonenumber'],
                'password' => $params['password'],
                'avatar' => $avatar_img,
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
            $msg = 'Hello '. $user['firstname']. ', Your Registration Was Successful!';
            $data = $user;
            return $this->regSuccess($msg, $user, HttpStatusCodes::OK);
        }
        
    }

    public function ussd_getUserSubscription(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('USSD_QUERY_SUBSCRPTION_DATA'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('client_id', $params['client_id'])->where('phonenumber', $params['phonenumber'])->first();
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



}
