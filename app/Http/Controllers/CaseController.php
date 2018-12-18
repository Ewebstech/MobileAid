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

class CaseController extends Controller
{
    protected $helper;


    public function __construct()
    {
        $this->helper = new HelperController;
    }

    public function initiateCall(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('CLIENT_CASES'));

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
                        $userData = $userDetails->toArray();
                        
                        //dd($userDetails);
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
