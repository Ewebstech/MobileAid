<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

session_start();

class DashboardController extends Controller
{
    protected $helper;

    public function __construct()
    {
       $this->middleware('redirectauth');
       $this->helper = new HelperController;
    }

    public function index(Request $request){
       $UserDetails = $_SESSION['UserDetails'];
       $data['sessiondata'] = $UserDetails;
       $role = $UserDetails['role'];
        
       $userContent = $this->jsonToArray($UserDetails['content']);

       // Check if user has updated their profiles
       if(isset($userContent['Kyc'])){
           $data['EditProfile'] = "set";
           
       } else {
        $data['EditProfile'] = "";
      
       }
       $data['MsgCount'] = $this->getContactMessageCount();
       $data['PatientNum'] = $this->getPatientsNum();
       $data['DoctorNum'] = $this->getDoctorsNum();
       $data['regToday'] = $this->registrationsToday();
      // dd($data['regToday']);
       $data['PatientsDashboard'] = $this->getPatientsDashboardData();
       $URI= '/'.$role.'/dashboard';

       return view($URI)->with($data);
    }

    private function getPatientsNum(){
        $data =  $this->helper->getAllUsersByRole("patient");
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }

    private function getPatientsDashboardData(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
            
        $userContent = $this->jsonToArray($UserDetails['content']);

        $Sdata["Package"] = (isset($userContent['package'])) ? $userContent['package'] : "None" ;
        $Sdata['Calls'] = (isset($userContent['calls'])) ? $userContent['calls'] : "0";
        $Sdata['Status'] = (isset($userContent['Status'])) ? $userContent['Status'] : "InActive";
        $Sdata['UserId'] = (isset($userContent['client_id'])) ? $userContent['client_id'] : $UserDetails['client_id'];
        $Sdata['OpenCases'] = (isset($openCases)) ? $openCases : 0;
        $Sdata['ClosedCases'] = (isset($closedCases)) ? $closedCases : 0;
        
        return $Sdata;
    }

    private function getDoctorsNum(){
        $data =  $this->helper->getAllUsersByRole("doctor");
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }

    private function getContactMessageCount(){
        $data = $this->helper->getUnreadContactMessages();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }

    private function registrationsToday(){
        $data = $this->helper->getTodayRegs();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
       // dd($data);
    }
    
}