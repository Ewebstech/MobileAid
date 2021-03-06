<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


class MailController extends Controller
{
    
    private function mailTemplate($template,$data)
    {
        $contents = view('emails.'.$template, $data)->render();
        return $contents;
    }

    public function sendMail($params){
        $mail = new PHPMailer(true);

        $subject = $params['Subject'];
        $toAddress = trim($params['Email']);
        $FullName = $params["Name"];

        $mailTemplate = $this->mailTemplate($params["template"],$params);

        $fromAddress = "support@mobilemedicalaid.com";
        $replyTo = "info@mobilemedicalaid.com";
       
        try{
            $mail->isSMTP();
            $mail->SMTPDebug = 0;       // Enable verbose debug output | Production Server = 0
            $mail->CharSet = 'utf-8';
            //$mail->SMTPAuth = true;
            //$mail->SMTPSecure = "tls";
            if($_SERVER['REMOTE_ADDR'] == "127.0.0.1"){
                $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                $mail->Port = "587"; //gmail has port > 587 . without double quotes
                $mail->Username = "ewebstech@gmail.com"; //your username. actually your email
                $mail->Password = "chinonye247"; // your password. your mail password
            } else {
                $mail->Host = "localhost"; //gmail has host > smtp.gmail.com
                $mail->Port = "25"; //gmail has port > 587 . without double quotes
                $mail->Username = "mn79gomyi4s2"; //your username. actually your email
                $mail->Password = "Chinonye247@"; // your password. your mail password
            }
           
            
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($fromAddress, "Mobile Medical Aid"); 
            $mail->Subject = $subject;
            $mail->MsgHTML($mailTemplate);
            $mail->addAddress($toAddress , $FullName); 
            $mail->addReplyTo($replyTo, "Mobile Medical Aid");
            if ($mail->send()) {
                return 'Message has been sent';
            } else {
                return 'Message not sent';
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    // public function sendMail($params)
    // {
    //     //Grab uploaded file
    //     //$attach = $request->file('file');
    //     Mail::send($params['template'], $params, 
    //         function ($message) use($params)
    //         {
    //             $subject = $params['Subject'];
    //             $toAddress = trim($params['Email']);
    //             $FullName = $params["Name"];
                
    //             $fromAddress = "noreply@mobilemedicalaid.com";
    //             $replyTo = "info@mobilemedicalaid.com";
       
    //             //Attach file
    //             //$message->attach($attach);

    //             //Add a subject
    //             $message->subject($subject);

    //             $message->from($fromAddress, $this->company_name);

    //             $message->sender($fromAddress, $this->company_name);

    //             $message->to($toAddress, $name = $FullName);

    //             $message->replyTo($replyTo, $this->company_name);

    //             //$message->priority($level);
    //             //$message->attach($pathToFile, array $options = []);
    //         });
    // }
}