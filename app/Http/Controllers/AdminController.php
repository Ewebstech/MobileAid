<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

class AdminController extends Controller
{
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth');
       $this->helper = new HelperController;
    }

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

    public function viewMessages(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $data['ContactMessages'] = $this->helper->getContactMessages();

        //dd($data['ContactMessages']);
        $URI= '/'.$role.'/inbox';

       return view($URI)->with($data);
    }
}
