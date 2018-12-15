<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Validator;
use App\Utils\Packages;


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

    public function getRenewable(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = strtolower($UserDetails['role']);
        $userId = $UserDetails['client_id'];
        $userContent = $this->helper->getUserDetailsById($userId);
        $package_name = $userContent["package"];
        $data['package'] = $this->getpackageDetails($package_name);
        $data['ClientId'] = $UserDetails['client_id'];
        //dd($data['Packages']);
        $URI= '/'.$role.'/renewal';
        
        return view($URI)->with($data);
    }

    public function getpackageDetails($package_name){
        $package_array = Packages::getPackage(strtoupper($package_name));
        $package = $package_array;
        return $package;
    }

    public function getPackagePrice(){
        $package_name = $this->getSubscriptionPackage();
        $package_array = Packages::getPackage(strtoupper($package_name));
        $packagePrice = $package_array['Price'];
        return $packagePrice;
    }

    public function getCalls(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $userId = $UserDetails['client_id'];
        $userContent = $this->helper->getUserDetailsById($userId);
        return (!is_null($userContent['calls'])) ? $userContent['calls'] : 0;
    }

    public function getSubscriptionStatus(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $userId = $UserDetails['client_id'];
        $userContent = $this->helper->getUserDetailsById($userId);
        return ($userContent['status']) ? $userContent['status'] : "InActive";
    }
    
    public function getSubscriptionPackage(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $userId = $UserDetails['client_id'];
        $userContent = $this->helper->getUserDetailsById($userId);
        return ($userContent['package']) ? $userContent['package'] : "None";
    }


    public function selectSubscription(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $data['Packages'] = $this->getPackages($local=true);
        $data['ClientId'] = $UserDetails['client_id'];

        //dd($this->getpackageDetails('gold'));
        $URI= '/'.$role.'/choosesub';
        
        return view($URI)->with($data);
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


    public function getUserSubscriptionData($user_email){
        $subQuery = new Subscriptions();
        $subDetailsArray = $subQuery->getUserSubscription($user_email)->toArray();
       
        if(!empty($subDetailsArray)){
            $subDetails = $subDetailsArray[0];
        } else {
            $subDetails = [];
        }

        return $subDetails;

    }

    public function selectPackage(Request $request){
        $formparams = $request->all();
        //dd($formparams);
        $validator =  Validator::make($request->all(), [
            //validation rules
            'package' => 'required',
            'client_id' => 'required'
        ]);

        if($validator->fails()) {
            //if validation error return error messages
            if(isset($formparams['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }
        
        $package = ucfirst(strtolower($formparams['package']));
        // Retrieve client's info - Check previous package
        $userId = $formparams["client_id"];
        
        $userDetails = $this->helper->getUserDetailsById($userId);
        if(isset($userDetails['view'])) { unset($userDetails['view']); }
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
        $params['client_id'] = $formparams['client_id'];
        // Query to get current user's subscription status
        $subQuery = new Subscriptions();
        if($userDetails['email']){
            $userparam = $userDetails['email'];
        } else {
            $userparam = $userDetails['user'];
        }
        
        $subDetailsArray = $subQuery->getUserSubscription($userparam)->toArray();
       
        if(!empty($subDetailsArray)){
            $subDetails = $subDetailsArray[0];
        } else {
            $subDetails = [];
        }

        $params['view'] = $formparams['view']; // Ensure view param is copied

        //dd($subDetailsArray);
        if(count($subDetails) > 0){
            //Get Previous Package
            
            $previousPackage = $subDetails['package'];
            $MaxCalls = $subDetails['calls'];
            if($previousPackage == $params['package']){
                if(isset($params['view'])){
                    $status = "error";
                    $data = "You are already subscribed on ". $params['package'] . " package";
                    return $this->returnOutput($status,$data);
                } else {
                    return $this->error('You are already subscribed on '. $params['package'] . ' package. ', HttpStatusCodes::UNAUTHORIZED);
                }
            } else {
                if($MaxCalls > 0){
                    if(isset($params['view'])){
                        $status = "error";
                        $data = "Your subscription is still active on ". $subDetails['package'] . " package and cannot be modified until it is exhausted.";
                        return $this->returnOutput($status,$data);
                    } else {
                        return $this->error('Your subscription is still active on '. $params['package'] . ' package and cannot be modified until it is exhausted.', HttpStatusCodes::UNAUTHORIZED);
                    }
                    
                } else {
                    return $this->processSubscriptionUpdates($params,$subUpdate=true);
                }
            }
        } else {

            // Add Subscription Details
            
            $params["calls"] = "0";
            $params["status"] = "InActive";
            $params["user"] = $userDetails['email'];
            return $this->processSubscriptionUpdates($params);
        }
    }

    private function processSubscriptionUpdates($params,$subUpdate=false){
        try{
            if($subUpdate){
                $subQuery = new Subscriptions();
                $subDetails = $subQuery->updateSubscription($params);
            } else {
                $subQuery = new Subscriptions();
                $subDetails = $subQuery->addSubscription($params);
            }
            
            // Update Users Table with Subscription Details
            $userQuery = new Users;
            $userUpdate = $userQuery->updateUserContent($params);
            
            if($subDetails and $userUpdate){ 
              
                if(isset($params['view'])){
                    if($subDetails){
                        //var_dump("success");
                        $status = "success";
                        $data = "Subscription Selection Successful: ". $params['package'] . " Package <br> <a href='/renewal' class='btn btn-secondary'><i class='fa fa-sign-in'></i> <b>Proceed To Payment Now</b></a>";
                        return $this->returnOutput($status,$data);
                    } else {
                        $status = "failure";
                        $data = "Subscription Error. Please Try again!";
                        return $this->returnOutput($status,$data);
                        
                    }
                } else {
                    $msg = "Subscription Selection Successful: ". $params['package'] . " Package. ";
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

        $package[0] = Packages::getPackage('SILVER');

        $package[1] = Packages::getPackage('GOLD');

        $package[2] = Packages::getPackage('TITANIUM');

        $package[3] = Packages::getPackage('DIAMOND');

        return $package;
    } 
}

