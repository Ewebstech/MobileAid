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


    public function updateCase($params){
        $user = [
            'case_status' => $params['case_status'],
            'doctor_id' => $params['doctor_id'],
            'content' => json_encode($params),
        ];
        $update = $this->model->where('case_id', $params['case_id'])
            ->where('client_email', $params['client_email'])
            ->update($user);

        return ($update) ? true : false;
    }

    public function getUserCasesByPhonenumber($param){
        $sub = $this->model->where('client_phonenumber',$param)->where('case_status','open')->orderBy('created_at', 'DESC')->first();
        return ($sub) ? $sub : false;
    }

    public function getUserByClientId($id){
        $case = $this->model->where('client_id',$id)->get();
        return ($case) ? $case : false;
    }

    public function getUserCases($param){
        $sub = $this->model->where('client_id',$param)->get();
        return ($sub) ? $sub : false;
    }

    public function getCaseById($param){
        $sub = $this->model->where('case_id',$param)->first();
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

    public function getAllHandledCases($handler){
        $sub = $this->model->where('case_status', 'closed')->where('doctor_id', $handler)->get();
        return ($sub) ? $sub : false;
    }

 
   
}