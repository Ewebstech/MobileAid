<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Model\Contacts;
use App\Error;

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
        //dd($cM);
        $data['UnreadMsgCount'] = $this->getUnreadContactMessageCount();
        $data['ReadMsgCount'] = $this->getReadContactMessageCount();

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
     
        $data['UnreadMsgCount'] = $this->getUnreadContactMessageCount();
        $data['ReadMsgCount'] = $this->getReadContactMessageCount();

        $data['ContactMessages'] = $cM;
        $URI= '/'.$role.'/archive';

       return view($URI)->with($data);
    }

    public function ReadMessages(Request $request){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $id = $_GET['id'];
        $Query = new Contacts;
        $contactResult = $Query->getContactMessagesById($id)->toArray();
        $updateStatus = $Query->updateContactStatus($id);
       //dd($contactResult);
        if($updateStatus){
            $data['Messages'] = $contactResult;
            $URI= '/'.$role.'/read';
            return view($URI)->with($data);
        }
    }

    private function getUnreadContactMessageCount(){
        $data = $this->helper->getUnreadContactMessages();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }

    private function getReadContactMessageCount(){
        $data = $this->helper->getReadContactMessages();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }

    public function DisplayErrors(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
         
        $errorModel = Error::orderBy('created_at','desc')->get();

        $errors = $errorModel->toArray();
        $i = 0;
        foreach($errors as $error){
            $errorContent = $this->jsonToArray($error['content']);
            $rdata[$i]['error']['error_code'] = $errorContent['error_code'];
            $rdata[$i]['error']['error_line'] = $errorContent['error_line']; 
            $rdata[$i]['error']['error_message'] = $errorContent['error_message'];
            $rdata[$i]['error']['ip_address'] = $errorContent['ip_address'];
            $rdata[$i]['error']['request_type'] = $errorContent['request_type'];
            $rdata[$i]['error']['date'] = $error['created_at'];
            $i++;
       
        }
        $data['Errors'] = isset($rdata) ? $rdata : null;
        $URI= '/'.$role.'/errors';
        
        return view($URI)->with($data);
    }
}
