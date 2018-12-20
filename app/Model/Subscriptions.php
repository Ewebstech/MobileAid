<?php
namespace App\Model;

use App\Subscription;

class Subscriptions
{
    protected $model;
    
    public function __construct(){
        $this->model = new Subscription;
    }

    public function addSubscription($params){
        $content = json_encode($params);
        
        $data = [
            'user' => $params['user'],
            'status' => $params['status'],
            'calls' => $params['calls'],
            'phonenumber' => $params['phonenumber'],
            'package' => $params['package'],
            'content' => $content,
        ];

        $saveData = $this->model->create($data);
        return ($saveData) ? true : false;
    }

    public function getUserSubscription($user){
        $sub = $this->model->where('user',$user)->get();
        return ($sub) ? $sub : false;
    }

    public function getUserSubscriptionViaMobile($param){
        $sub = $this->model->where('phonenumber',$param)->get();
        return ($sub) ? $sub : false;
    }

    public function getUsersByPackage($package){
        $sub = $this->model->where('package',$package)->get();
        return ($sub) ? $sub : false;
    }

    public function getUsersByStatus($status){
        $sub = $this->model->where('status',$status)->get();
        return ($sub) ? $sub : false;
    }

    public function updateSubscription($params){
        $content = json_encode($params);
        $data = [
            'user' => $params['user'],
            'status' => $params['status'],
            'phonenumber' => $params['phonenumber'],
            'calls' => $params['calls'],
            'package' => $params['package'],
            'content' => $content,
        ];
        $update = $this->model->where('user', $params['user'])
            ->update($data);

        return ($update) ? true : false;
    }
   
}