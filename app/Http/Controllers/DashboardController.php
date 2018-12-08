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
       
       $URI= '/'.$role.'/dashboard';

       return view($URI)->with($data);
    }

    private function getPatientsNum(){
        $data =  $this->helper->getAllUsersByRole("patient");
        $count = count($data);
        return ($count) ? $count : 0;
    }

    private function getDoctorsNum(){
        $data =  $this->helper->getAllUsersByRole("doctor");
        $count = count($data);
        return ($count) ? $count : 0;
    }

    private function getContactMessageCount(){
        $data = $this->helper->getContactMessages();
        if($data){
            $data = $data->toArray();
            //dd($data);
        }
      
        $count = count($data);
        return ($count) ? $count : 0;
    }
    
}