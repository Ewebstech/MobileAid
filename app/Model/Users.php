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

    public function getUser($param){
        $user = User::where('email', $param)->first();
        return ($user) ? $user : false;
    }

    public function getAllUsers(){
        $user = User::all();
        return ($user) ? $user : false;
    }

    public function getUsersByRole($role){
        $user = User::where('role', $role)->orderBy('created_at', 'DESC')->get();
        return ($user) ? $user : false;
    }

    public function deleteRow($param){
        $user = User::where('client_id', $param)->delete();
        return ($user) ? true : false;
    }


}