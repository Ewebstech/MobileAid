<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

class DoctorController extends Controller
{
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth');
        $this->helper = new HelperController;
    }

    public function index(Request $request){
       
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
