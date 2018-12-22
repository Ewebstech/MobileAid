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
    
}