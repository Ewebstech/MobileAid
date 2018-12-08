<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Validator;


class SubscriptionController extends Controller
{
    protected $helper;

    public function __construct()
    {   
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth',['except' => [
            'getPackages','selectPackage'
        ]]);
        $this->helper = new HelperController;
    }

    public function getPackages($local=false){
        $Packages = $this->definePackages();

        if($local){
            return $Packages;
        } else {
            $data = $Packages;
            $msg = "Request Successful";
            return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
        }
    }

    public function selectPackage(Request $request){
        $formparams = $request->all();

        $validator =  Validator::make($request->all(), [
            //validation rules
            'package' => 'required',
            'client_id' => 'required'
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

        $package = $formparams['package'];
        // Retrieve client's info - Check previous package
        $userId = $formparams["client_id"];
        $userDetails = $this->helper->getUserDetailsById($userId);
        $params = $userDetails;
        if($userDetails == null) {
            //if validation error return error messages
            if(isset($params['view'])){
                $errorResponse = $this->validationError('Authentication Handshake Failed!');
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError('Authentication Handshake Failed!', HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }
        
        $params['package'] = $package;
        // Query to get current user's subscription status
        $subQuery = new Subscriptions();
        if($userDetails['email']){
            $userparam = $userDetails['email'];
        } else {
            $userparam = $userDetails['user'];
        }
        
        $subDetails = $subQuery->getUserSubscription($userparam);
        if($subDetails){
            $subDetails = $subDetails->toArray()[0];
        }
       
        if(count($subDetails) > 0){
            //Get Previous Package
            
            $previousPackage = $subDetails['package'];
            $MaxCalls = $subDetails['calls'];
            if($previousPackage == $params['package']){
                //dd("i am here");
                // You are already subscribed on this package
                return $this->error('You are already subscribed on this package. ', HttpStatusCodes::NOT_MODIFIED);
            } else {
              
                if($MaxCalls > 0){
                    return $this->error('Your subscription is still active and cannot be modified until it is exhausted. ', HttpStatusCodes::NOT_MODIFIED);
                } else {
                    return $this->processSubscriptionUpdates($params);
                }
            }
        } else {

            // Add Subscription Details
            $params["calls"] = "0";
            $params["status"] = "Supended";
            $params["user"] = $userDetails['email'];
            return $this->processSubscriptionUpdates($params);
        }
    }

    private function processSubscriptionUpdates($params){
        try{
            $subQuery = new Subscriptions();
            $subDetails = $subQuery->addSubscription($params);

            // Update Users Table with Subscription Details
            $userQuery = new Users;
            $userUpdate = $userQuery->updateUserContent($params);
            
            if($subDetails and $userUpdate){ 
                if(isset($params['view'])){
                    if($subDetails){
                        //var_dump("success");
                        $status = "success";
                        $data = "New Subscription Package Added Successfully";
                        return $this->returnOutput($status,$data);
                    } else {
                        $status = "failure";
                        $data = "Subscription Error. Please Try again!";
                        return $this->returnOutput($status,$data);
                        
                    }
                } else {
                    $msg = "New Subscription Package Added Successfully";
                    $data = $params;
                    return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                }
            } else {
                return $this->validationError('Couldn\'t Perform Update Operations', HttpStatusCodes::BAD_REQUEST);
            }

        } catch(\Exception $e) {
            //something went wrong during updates
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        }
    }

    private function definePackages(){

        $package[0] = [
            "Title" => "Silver",
            "Price" => "2000",
            "LocalMaxCalls" => "1",
            "IntMaxCalls" => "0"
        ];

        $package[1] = [
            "Title" => "Gold",
            "Price" => "5000",
            "LocalMaxCalls" => "1",
            "IntMaxCalls" => "0"
        ];

        $package[2] = [
            "Title" => "Titanium",
            "Price" => "25000",
            "MaxCalls" => "3",
            "IntMaxCalls" => "2"
        ];

        $package[3] = [
            "Title" => "Diamond",
            "Price" => "65000",
            "MaxCalls" => "5",
            "IntMaxCalls" => "3"
        ];


        return $package;
    } 
}

