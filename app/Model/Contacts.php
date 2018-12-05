<?php
namespace App\Model;

use App\Contact;

class Contacts
{
    protected $model;
    
    public function __construct(){
        $this->model = new Contact;
    }

    public function saveContactDetails($params){
        $data = [
            'name' => ucfirst(strtolower($params['name'])),
            'email' => $params['email'],
            'phonenumber' => $params['phone'],
            'subject' => $params['subject'],
            'message' => $params['message'],
        ];

        $saveData = $this->model->create($data);
        return ($saveData) ? true : false;
    }

    
}