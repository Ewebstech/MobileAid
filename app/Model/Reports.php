<?php
namespace App\Model;

use App\Report;

class Reports
{
    protected $model;
    
    public function __construct(){
        $this->model = new Report;
    }

    public function saveCallInfo($params){
        $content = json_encode($params);
        
        $data = [
            'case_id' => $params['case_id'],
            'client_email' => $params['client_email'],
            'case_status' => $params['case_status'],
            'content' => $content
        ];

        $saveData = $this->model->create($data);
       
        return ($saveData) ? true : false;
    }

    public function saveReport($params){
        $content = json_encode($params);
        
        $data = [
            'case_id' => $params['case_id'],
            'client_email' => $params['client_email'],
            'content' => $content
        ];
        $update = $this->model->where('case_id', $params['case_id'])
            ->where('client_email', $params['client_email'])
            ->update($data);
       
        return ($update) ? true : false;
    }

    public function getCaseReport($case_id){
        $sub = $this->model->where('case_id',$case_id)->first();
        return ($sub) ? $sub : false;
    }
    
}