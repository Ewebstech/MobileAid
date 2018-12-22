<?php
namespace App\Model;

use App\Doctor;

class Doctors
{
    protected $model;
    
    public function __construct(){
        $this->model = new Doctor;
    }

    public function addStatus($params){
    
        $data = [
            'doctor_id' => $params['doctor_id'],
            'doc_email' => $params['doc_email'],
            'status' => $params['new_status']
        ];

        $saveData = $this->model->create($data);
       
        return ($saveData) ? true : false;
    }


    public function updateStatus($params){
        $user = [
            'status' => $params['new_status']
        ];
        $update = $this->model->where('doctor_id', $params['doctor_id'])
            ->where('doc_email', $params['doc_email'])
            ->update($user);

        return ($update) ? true : false;
    }
    
}