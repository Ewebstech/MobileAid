<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contacts;
use App\Http\Controllers\HelperController;

class PagesController extends Controller
{
    protected $helper;

    public function __construct()
    {   
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

    /**
     * Method to handle contact page logic
     */
    public function contactPage(Request $request){
        $params = $request->all();
        $contactQuery = new Contacts;
        $Data = $contactQuery->saveContactDetails($params);
        if($Data){
            // Send Email to Sender
             // Send Email to User
             $mailParams = [
                'Name' => ucfirst(strtolower($params['name'])),
                'Email' => $params['email'],
                'Subject' => 'Thank you for contacting Mobile Medical Aid',
                'template' => 'default',
                'Body' => 'Hello '. ucwords(strtolower($params['name'])). ', thank you for contacting us. Our support team will get back to you very soon. Cheers!',
            ];
            
            $sendMail = $this->helper->sendMail($mailParams);

            $status = "success";
            $data = "Thanks ". ucwords(strtolower($params['name'])) .", your message has been sent. Check your Email Address for subsequent communications.";
            return $this->returnOutput($status,$data);
     
        } else {
            $status = "failure";
            $data = "Sorry, we cannot deliver your message at this time, please do try again later. Thank you.";
            return $this->returnOutput($status,$data);
            
        }
    } 

    public function getContactMessages(){
        $contactQuery = new Contacts;
        $Data = $contactQuery->getContactMessages();
        return ($Data) ? $Data->toArray() : false;
    }

    

}