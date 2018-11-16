<?php
namespace App\Model;

use App\User;

class Users
{
    public function updateUserDetails($params){
        $user = [
            'remember_token' => str_random(rand(0,9)),
            'content' => $params['content'],
        ];
        $update = User::where('phonenumber', $params['phonenumber'])
            ->where('email', $params['email'])
            ->update($user);

        return ($update) ? true : false;
    }
}