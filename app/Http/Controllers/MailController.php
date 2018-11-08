<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Contract\Mailer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    protected $mailer;
    public $company_name = "Mobile Medical Aid";

    public function __construct()
    {   
        $this->mailer = new Mail;
    }

    public function sendMail($params)
    {
        //Grab uploaded file
        //$attach = $request->file('file');
        Mail::send($params['template'], $params, 
            function ($message) use($params)
            {
                $subject = $params['Subject'];
                $toAddress = trim($params['Email']);
                $FullName = $params["Name"];
                
                $fromAddress = "noreply@mobilemedicalaid.com";
                $replyTo = "info@mobilemedicalaid.com";
       
                //Attach file
                //$message->attach($attach);

                //Add a subject
                $message->subject($subject);

                $message->from($fromAddress, $this->company_name);

                $message->sender($fromAddress, $this->company_name);

                $message->to($toAddress, $name = $FullName);

                $message->replyTo($replyTo, $this->company_name);

                //$message->priority($level);
                //$message->attach($pathToFile, array $options = []);
            });
    }

}