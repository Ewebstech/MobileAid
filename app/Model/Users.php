<?php
namespace App\Model;

use App\User;

class Users
{
    public function updateUserDetails($params){
        $user = [
            'firstname' => $params['firstname'],
            'lastname' => $params['lastname'],
            'email' => $params['email'],
            'phonenumber' => $params['phonenumber'],
            'password' => $params['hashed_password'],
            'avatar' => isset($params['avatar']) ? $params['avatar'] : $params['content']['avatar'],
            'remember_token' => str_random(rand(0,9)),
            'content' => $params['content'],
        ];
        if($params['hashed_password'] == null){
            unset($user['password']);
        }
        $update = User::where('phonenumber', $params['phonenumber'])
            ->update($user);

        return ($update) ? true : false;
    }

    public function updateUserContent($params){
        $user = [
            'remember_token' => str_random(rand(0,9)),
            'content' => json_encode($params),
        ];
        $update = User::where('client_id', $params['client_id'])
            ->where('email', $params['user'])
            ->update($user);

        return ($update) ? true : false;
    }

    public function getUser($param){
        $user = User::where('email', $param)->first();
        return ($user) ? $user : false;
    }

    public function getUserById($param){
        $user = User::where('client_id', $param)->first();
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

    public function getUserRegToday(){
        $user = User::where('created_at', '>=', date('Y-m-d').' 00:00:00')->get();
        return ($user) ? $user : false;
    }

}