<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

class PatientsController extends Controller
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

    public function viewPatients(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        //$data['Patient'] =  $this->helper->getAllUsersByRole("patient");
          
        $URI= '/'.$role.'/patients';
        return view($URI)->with($data);
    }


    
}
