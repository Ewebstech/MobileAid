<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Model\Contacts;

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

    public function viewUnreadMessages(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $cM = $this->helper->getUnreadContactMessages();

        $i = 0;
        foreach($cM as $msgs){
            $msgStamp = strtotime($msgs['created_at']);
            $msgs['sendTime'] = $this->time_ago($msgStamp);
            $cM[$i] = $msgs;
            $i++;
        }
        // dd($cM);

        $data['ContactMessages'] = $cM;
        $URI= '/'.$role.'/inbox';

       return view($URI)->with($data);
    }

    public function viewReadMessages(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $cM = $this->helper->getReadContactMessages();

        $i = 0;
        foreach($cM as $msgs){
            $msgStamp = strtotime($msgs['created_at']);
            $msgs['sendTime'] = $this->time_ago($msgStamp);
            $cM[$i] = $msgs;
            $i++;
        }
       //dd($cM);

        $data['ContactMessages'] = $cM;
        $URI= '/'.$role.'/inbox';

       return view($URI)->with($data);
    }

    public function ReadMessages(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $id = $_GET['id'];
        $Query = new Contacts;
        $contactResult = $Query->getContactMessagesById($id)->toArray();
       //dd($contactResult);
        $data['Messages'] = $contactResult;
        $URI= '/'.$role.'/read';

       return view($URI)->with($data);

    }

}
