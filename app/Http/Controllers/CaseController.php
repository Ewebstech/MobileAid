<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Users;
use App\Subscription;
use App\Utils\RequestRules;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;

class CaseController extends Controller
{
    protected $helper;


    public function __construct()
    {
        $this->helper = new HelperController;
    }

    /**
     * This Method handles client to doctor call logistics immediately the button to call is clicked by the patient.
     * It debits calls and creates a case id for a new session with doctor. 
     */
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
                        $userDataContent = $this->jsonToArray($userData['content']);
                        $subscriptionData = $has_Subscription->toArray();
                        $subscriptionDataContent = $this->jsonToArray($subscriptionData['content']);
                        
                       // dd($userData);
                        dd($userDataContent);
                        // Perform Caller Logistics 
                        $calls_available = (int) $subscriptionData['calls'];
                        $subscription_status = $subscriptionData['status'];
                        if($calls_available > 0 and $subscription_status == "Active"){
                            // Subtract and update information
                            $call_balance = $calls_available - 1;
                            // Set Status
                            if($call_balance == 0){
                                $status = "InActive";
                            } else {
                                $status = "Active";
                            }

                            $updateparams = $subscriptionDataContent;
                            $updateparams['calls'] = $call_balance;
                            $updateparams['status'] = $status;
                            $subQuery = new Subscriptions();
                            $subDetails = $subQuery->updateSubscription($params);

                            // Update Users Table with Subscription Details
                            $updateparams = $userDataContent;
                            $updateparams['calls'] = $call_balance;
                            $updateparams['status'] = $status;
                            $userQuery = new Users;
                            $userUpdate = $userQuery->updateUserContent($params);
                        } 
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
