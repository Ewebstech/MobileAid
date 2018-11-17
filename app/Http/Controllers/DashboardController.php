<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

session_start();

class DashboardController extends Controller
{

    public function __construct()
    {
       $this->middleware('redirectauth');
    }

    //
    public function index(Request $request){
       $UserDetails = $_SESSION['UserDetails'];
       $data['sessiondata'] = $UserDetails;
       $role = $UserDetails['role'];
        
       $userContent = $this->jsonToArray($UserDetails['content']);
       if(isset($userContent['Kyc'])){
           $data['EditProfile'] = "set";
       } else {
        $data['EditProfile'] = "";
       }
       
       $URI= '/'.$role.'/dashboard';

       return view($URI)->with($data);
    }

}