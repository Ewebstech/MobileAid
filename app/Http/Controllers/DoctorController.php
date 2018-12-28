<?php

namespace App\Http\Controllers;

use App\User;
use App\Doctor;
use App\Model\Users;
use App\Model\Doctors;
use App\Model\Reports;
use App\Model\ClientCases;
use App\Utils\RequestRules;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;

class DoctorController extends Controller
{
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth', [ 'except' => 'switchStatus']);
        $this->helper = new HelperController;
    }

    public function saveReport(Request $request){
        $formparams = $request->all();
    
        $caseQuery = new ClientCases();
        $caseData = $caseQuery->getCaseById($formparams['caseId']);
        if($caseData){
            $caseDetails = $this->arraylize($caseData);
            $params = $caseDetails;
            $params['report'] = $formparams['xdata'][0];
            $params['case_id'] = $formparams['caseId'];

            $reportQuery = new Reports;
            $saveData = $reportQuery->saveReport($params);

            if($saveData){
                $status = "success";
                $data = "Case Report Saved Successfully";
                return $this->returnOutput($status,$data);
            } else {
                $status = "error";
                $data = "Problem Saving Case Report";
                return $this->returnOutput($status,$data);
            }
        }
    }

    public function viewHandledCases(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $client_id = $UserDetails['client_id'];

        $caseInfo = $this->helper->getAllHandledCases($client_id);
       
        $data['Cases'] = $caseInfo;
        //dd($data['Cases']);
        $URI= '/'.$role.'/handledcases';
        return view($URI)->with($data);
        
    }

    public function switchStatus(Request $request){
        $params = $request->all();
     
        $validator =  Validator::make($request->all(), RequestRules::getRule('STATUS_SWITCH'));

        if($validator->fails()) {
            //if validation error return error messages
            if(isset($formparams['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }
        
        $is_valid_clientId_role_doctor = User::where('client_id', $params['doctor_id'])->where('role','doctor')->first(); // Validate doctor's id

        if($is_valid_clientId_role_doctor) {
            $userDetails = $this->arraylize($is_valid_clientId_role_doctor);
            $userDataContent = $this->jsonToArray($userDetails['content']);
            $userDataContent['status'] = $params['new_status'];
            $userDataContent['client_id'] = $params['doctor_id'];
            $userDataContent['user'] = $userDetails['email'];
            // set some unavailable variables
            $params['doc_email'] = $userDetails['email'];
     
            $check_for_doc = Doctor::where('doctor_id',$params['doctor_id'])->first();
            if(!$check_for_doc){
                $sQ = new Doctors;
                $saveStatusData = $sQ->addStatus($params);
            } else{
                // Update Doctor Status
                $sQ = new Doctors;
                $saveStatusData = $sQ->updateStatus($params);
            }
            
            // Update Users Table with Subscription Details
            $userQuery = new Users; profile.
            $userUpdate = $userQuery->updateUserContent($userDataContent);

            if($saveStatusData and $userUpdate){
                if(isset($params['view'])){
                    $status = "success";
                    $data = "You are now". ucfirst($params['new_status']);
                    return $this->returnOutput($status,$data);
                   
                } else {
                    $msg = "Status Switch Successful";
                    $data = $params;
                    return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                }
            }

        } else {
             //if validation error return error messages
             if(isset($params['view'])){
                $errorResponse = $this->validationError('Authentication Handshake Failed!');
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError('Authentication Handshake Failed!', HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }

    }

    public function viewDoctors(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $data['Doctor'] =  $this->helper->getAllUsersByRole("doctor");
          
        $URI= '/'.$role.'/doctors';
        return view($URI)->with($data);
    }

    public function requestProfile(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $userEmail = $_GET['user'];
        $role = $_GET['type'];
        $data['UserDetails'] =  $this->helper->getUserDetails($userEmail);
    
        $URI= '/'.$role.'/view-profile';
        return view($URI)->with($data);
    }

    public function requestProfileEdit(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $userEmail = $_GET['user'];
        $role = $_GET['type'];
        $data['UserDetails'] =  $this->helper->getUserDetails($userEmail);
    
        $URI= '/'.$role.'/edit-profile';
        return view($URI)->with($data);
    }

}
