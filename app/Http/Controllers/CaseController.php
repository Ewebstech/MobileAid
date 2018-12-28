<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Users;
use App\Subscription;
use App\Model\Reports;
use App\Model\ClientCases;
use App\Utils\RequestRules;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Hash;
use App\Helpers\generateDefaultPassword;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;

class CaseController extends Controller
{
    protected $helper;


    public function __construct()
    {
        $this->helper = new HelperController;
    }

    private function handleCasesArray($arraylized){
        $i = 0;
        $caseInf = [];
        foreach($arraylized as $caseInfo){
           // $caseInfo = $casesInfo;
            $caseInf[$i] = $caseInfo;
            $caseInf[$i]['Content'] = $this->jsonToArray($caseInfo['content']);
            $caseInf[$i]['Time'] = date('jS \of F Y, h:i a', strtotime($caseInf[$i]['created_at']));
            // Get Doctor's Details
            if($caseInf[$i]['doctor_id'] != null) {
                $doctor = $this->helper->getUserDetailsById($caseInf[$i]['doctor_id']);
                if($caseInf[$i]['doctor_id'] = $doctor['ClientId']){
                    $caseInf[$i]['doc_name'] = $doctor['firstname']. " ". $doctor['lastname'];
                }
            } else {
                $caseInf[$i]['doc_name'] = "Yet to Assign";
            }
            // Get Report Using Case ID
            $reportQuery = new Reports;
            $reportData = $reportQuery->getCaseReport($caseInf[$i]['case_id']);
            if($reportData){
                $reportArray = $this->jsonToArray($this->arraylize($reportData->content));
                $caseInf[$i]['report'] = isset($reportArray['report']) ? $reportArray['report'] : null;
            } else {
                $caseInf[$i]['report'] = null;
            }
            
            $i++;
        }
        //dd($caseInf);
        return $caseInf;
    }

    public function getOpenCasesByClientId($client_id){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getUserOpenCases($client_id);
        $arraylized = $this->arraylize($cases);
        $caseInfo = $this->handleCasesArray($arraylized);

        return $caseInfo;
    }

    public function getClosedCasesByClientId($client_id){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getUserClosedCases($client_id);  
        return $this->arraylize($cases);
    }

    public function getAllOpenCases(){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getAllOpenCases();  
        $arraylized = $this->arraylize($cases);
        $caseInfo = $this->handleCasesArray($arraylized);
        
        return $caseInfo;
    }

    public function getAllClosedCases(){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getAllClosedCases();  
        $arraylized = $this->arraylize($cases);
        $caseInfo = $this->handleCasesArray($arraylized);
        
        return $caseInfo;
    }

    public function getAllHandledCases($handler){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getAllHandledCases($handler);  
        $arraylized = $this->arraylize($cases);
        $caseInfo = $this->handleCasesArray($arraylized);
        
        return $caseInfo;
    }

    public function getUserCaseDetails($client_id){
        $caseQuery = new ClientCases;
        $cases = $caseQuery->getUserCases($client_id);  
        $arraylized = $this->arraylize($cases);
        $caseInfo = $this->handleCasesArray($arraylized);
        
        return $caseInfo;
    }


    public function terminatedCallHandle(Request $request){
        $params = $request->all();
        //dd($params);
        $validator =  Validator::make($request->all(), RequestRules::getRule('SEARCH_2MA'));
    
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
        try{
            $msg = "Terminated Call Data Sent";
            $data = $this->arraylize($userDetails_1);
            // Send Email to User
             // Send Email to User
             $mailParams = [
                'Name' => $data['firstname']. ' '. $data['lastname'],
                'Email' => $data['email'],
                'Subject' => ucfirst($data['firstname']). ', was your call was Terminated?',
                'template' => 'default',
                'Body' => 'Hello, '. $data['firstname']. ' '. $data['lastname']. ', we noticed that your call couldn\'t go through to the doctor, this might be caused by your in-active subscription status. Please kindly renew your subscription to gain access to 2MA mobile medical services. Thank you. ',
            ];
            
            $sendMail = $this->helper->sendMail($mailParams);

            return $this->success($msg, HttpStatusCodes::OK);
        } catch(\Exception $e) {
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        }
        } else {
            return $this->validationError('This phonenumber is not on the 2MA platform', HttpStatusCodes::NOT_FOUND);
        }
    }

    /**
     * This endpoint gets caller's information from database
    */

    public function getCallerInfo(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('CALLER_INFO'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('phonenumber', $params['client_phonenumber'])->first(); // Check if Client Exists
        $isvalid_clientId_role_doctor = User::where('client_id', $params['doctor_id'])->where('role','doctor')->first(); // Validate doctor's id
        $has_Subscription = Subscription::where('phonenumber', $params['client_phonenumber'])->first();

        if($userDetails){
            if($isvalid_clientId_role_doctor){
                $subData = $this->helper->getUserSubscriptionDataViaMobile($params['client_phonenumber']);
                try{
                    $userData = $userDetails->toArray();
                    $userDataContent = $this->jsonToArray($userData['content']);
                   // dd($userDataContent);
                    $caseQuery = new ClientCases();
                    $caseData = $caseQuery->getUserCasesByPhonenumber($userData['phonenumber']);
                    if(isset($userDataContent["calls"])){
                        $calls = (int) $userDataContent["calls"];
                        if($calls > 0){

                            $subscriptionData = $has_Subscription->toArray();
                            $subscriptionDataContent = $this->jsonToArray($subscriptionData['content']);
                          
                            // Perform Caller Logistics 
                            $calls_available = (int) $subscriptionData['calls'];
                            $subscription_status = $subscriptionData['status'];
                            if($calls_available > 0 and $subscription_status == "Active"){
                                // Subtract anphonenumberd update information
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
                                $subDetails = $subQuery->updateSubscription($updateparams);
    
                                // Update Users Table with Subscription Details
                                $updateparams = $userDataContent;
                                $updateparams['calls'] = $call_balance;
                                $updateparams['status'] = $status;
                                $userQuery = new Users;
                                $userUpdate = $userQuery->updateUserContent($updateparams);
                            }

                            if($subDetails and $userUpdate){
                                // Create Case
                                
                                $caseparam = $params; // copy request data
                                $caseparam['case_id'] = $this->generateDefaultStaticPassword(5);
                                $caseparam['client_name'] = $userDataContent['firstname']. " ". $userDataContent['lastname'];
                                $caseparam['client_id'] = $userData['client_id'];
                                $caseparam['client_email'] = $userDataContent['email'];
                                $caseparam['client_phonenumber'] = $userDataContent['phonenumber'];
                                $caseparam['client_package'] = $userDataContent['package'];
                                $caseparam['case_status'] = "open";
                                $caseparam['sub_status'] = $userDataContent['status'];
                                
                                $caseQuery = new ClientCases();
                                $caseDetails = $caseQuery->addCase($caseparam);

                                if($caseDetails){
                                    $data = $caseparam;
                                    $msg = "Data Retrieval Successful";
                                    return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                                } else {
                                    return $this->error('Case not created. Call cannot proceed. Please Terminate.', HttpStatusCodes::BAD_REQUEST);
                                }
                            } 

                        } elseif($calls == 0 and $caseData){
                            $caseDetails = $this->arraylize($caseData);
                            if($caseDetails){
                                $data = $caseDetails;
                                $msg = "Data Retrieval Successful";
                                return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                            } else {
                                return $this->error('Could not retrieve user details', HttpStatusCodes::BAD_REQUEST);
                            }

                        } else {
                            return $this->error('Client Subscription In-active. Please Terminate Call.', HttpStatusCodes::BAD_REQUEST);
                        }
                    } else {
                        return $this->error('This client is new and has not subscribed. Please Terminate Call.', HttpStatusCodes::BAD_REQUEST);
                    }
                   
                    // if(!$caseData){
                    //     return $this->error('No Consultancy Case was Found for this Client. Please Terminate Call.', HttpStatusCodes::BAD_REQUEST);
                    // } else {
                    //     $caseDetails = $this->arraylize($caseData);
                    //     if($caseDetails){
                    //         $data = $caseDetails;
                    //         $msg = "Data Retrieval Successful";
                    //         return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                    //     } else {
                    //         return $this->error('Could not retrieve user details', HttpStatusCodes::BAD_REQUEST);
                    //     }
                    // }
        
                } catch(\Exception $e) {
                    //something went wrong
                    return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        
                }
            } else {
                return $this->error('Doctor Credential Invalid!', HttpStatusCodes::BAD_REQUEST);
            }
        
        } else {
            return $this->error('Caller is not a 2MA Client!', HttpStatusCodes::BAD_REQUEST);
        }
    }

     /**
     * This endpoint gets gets details of completed call between doctors and clients
    */

    public function completeCallLog(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  Validator::make($request->all(), RequestRules::getRule('COMPLETED_CALLS'));

        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        $userDetails = User::where('phonenumber', $params['client_phonenumber'])->first(); // Check if Client Exists
        $isvalid_clientId_role_doctor = User::where('client_id', $params['doctor_id'])->where('role','doctor')->first(); // Validate doctor's id
        
        if($userDetails){
            if($isvalid_clientId_role_doctor){
                try{
                    $userData = $userDetails->toArray();
                    $userDataContent = $this->jsonToArray($userData['content']);
                    
                    $caseQuery = new ClientCases();
                    $caseData = $caseQuery->getCaseById($params['case_id']);
                    if(!$caseData){
                        return $this->validationError('Case ID Invalid!', HttpStatusCodes::NOT_FOUND);
                    } else {
                        $caseDetails = $this->arraylize($caseData);
                        $caseDetails['call_info'] = $params;
                        
                        $caseDetails['case_status'] = "closed"; // Case can now be closed at this point
                        $caseDetails['doctor_id'] = $params['doctor_id'];

                        $reportQuery = new Reports;
                        $saveData = $reportQuery->saveCallInfo($caseDetails);

                        // Update Case status to closed
                        $updateThisCase = $caseQuery->updateCase($caseDetails);

                        if($saveData and $updateThisCase){
                            $data = null;
                            $msg = "Data Saved Successfully";
                            return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                        } else {
                            return $this->validationError('Could not save call data', HttpStatusCodes::UNPROCESSABLE_ENTITY);
                        }
                    }
        
                } catch(\Exception $e) {
                    //something went wrong
                    return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);
        
                }
            } else {
                return $this->validationError('Doctor credential Invalid!', HttpStatusCodes::NOT_FOUND);
            }
        
        } else {
            return $this->validationError('No client exists with this phonenumber! ', HttpStatusCodes::NOT_FOUND);
        }
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
                      
                        // Perform Caller Logistics 
                        $calls_available = (int) $subscriptionData['calls'];
                        $subscription_status = $subscriptionData['status'];
                        if($calls_available > 0 and $subscription_status == "Active"){
                            // Subtract anphonenumberd update information
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
                            $subDetails = $subQuery->updateSubscription($updateparams);

                            // Update Users Table with Subscription Details
                            $updateparams = $userDataContent;
                            $updateparams['calls'] = $call_balance;
                            $updateparams['status'] = $status;
                            $userQuery = new Users;
                            $userUpdate = $userQuery->updateUserContent($updateparams);

                            if($subDetails and $userUpdate){
                                // Create Case
                                
                                $caseparam = $params; // copy request data
                                $caseparam['case_id'] = $this->generateDefaultStaticPassword(5);
                                $caseparam['client_name'] = $userDataContent['firstname']. " ". $userDataContent['lastname'];
                                $caseparam['client_id'] = $params['client_id'];
                                $caseparam['client_email'] = $userDataContent['email'];
                                $caseparam['client_phonenumber'] = $userDataContent['phonenumber'];
                                $caseparam['client_package'] = $userDataContent['package'];
                                $caseparam['case_status'] = "open";
                                $caseparam['sub_status'] = $userDataContent['status'];
                                
                                $caseQuery = new ClientCases();
                                $caseDetails = $caseQuery->addCase($caseparam);

                                if($caseDetails){
                                    $data = $caseparam;
                                    $msg = "Call can Proceed to Doctor";
                                    return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                                } else {
                                    return $this->validationError('Case not created. Call cannot proceed', HttpStatusCodes::BAD_REQUEST);
                                }
                            } 
                        } else {
                            return $this->validationError('No Active Subscription', HttpStatusCodes::BAD_REQUEST);
                        }
                    }
        
                } catch(\Exception $e) {
                    //something went wrong
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
