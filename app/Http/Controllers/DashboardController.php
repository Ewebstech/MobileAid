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
       
       $URI= '/'.$role.'/dashboard';
       $data['data'] = 'patient';
       return view($URI)->with($data);
    }

}