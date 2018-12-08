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

    
}