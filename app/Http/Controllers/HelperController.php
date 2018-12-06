<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController as MailController;


class HelperController extends Controller
{
         
    public function sendMail($params){
        $mail = new MailController;
        return $mail->sendMail($params);
    }

    public function getAllUsersByRole($role){
        $users = new UserController;
        return $users->getAllUsersByRole($role);
    }
}
