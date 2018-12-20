<?php
namespace App\Model;

use App\ClientCase;

class ClientCases
{
    protected $model;
    
    public function __construct(){
        $this->model = new ClientCase;
    }

    public function addCase($params){
        $content = json_encode($params);
        
        $data = [
            'case_id' => $params['case_id'],
            'client_name' => $params['client_name'],
            'client_id' => $params['client_id'],
            'client_email' => $params['client_email'],
            'client_phonenumber' => $params['client_phonenumber'],
            'client_package' => $params['client_package'],
            'case_status' => $params['case_status'],
            'sub_status' => $params['sub_status'],
            'content' => $content
        ];

        $saveData = $this->model->create($data);
        return ($saveData) ? true : false;
    }

    public function getUserByClientId($id){
        $case = $this->model->where('client_id',$id)->get();
        return ($case) ? $case : false;
    }

    public function getUserCases($param){
        $sub = $this->model->where('client_id',$param)->get();
        return ($sub) ? $sub : false;
    }

    public function getUserOpenCases($param){
        $sub = $this->model->where('client_id',$param)->where('case_status', 'open')->get();
        return ($sub) ? $sub : false;
    }

    public function getUserClosedCases($param){
        $sub = $this->model->where('client_id',$param)->where('case_status', 'closed')->get();
        return ($sub) ? $sub : false;
    }

    public function getAllOpenCases(){
        $sub = $this->model->where('case_status', 'open')->get();
        return ($sub) ? $sub : false;
    }

    public function getAllClosedCases(){
        $sub = $this->model->where('case_status', 'closed')->get();
        return ($sub) ? $sub : false;
    }

    // public function updateSubscription($params){
    //     $content = json_encode($params);
    //     $data = [
    //         'user' => $params['user'],
    //         'status' => $params['status'],
    //         'phonenumber' => $params['phonenumber'],
    //         'calls' => $params['calls'],
    //         'package' => $params['package'],
    //         'content' => $content,
    //     ];
    //     $update = $this->model->where('user', $params['user'])
    //         ->update($data);

    //     return ($update) ? true : false;
    // }
   
}