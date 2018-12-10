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
            'status' => 'unread',
            'phonenumber' => $params['phone'],
            'subject' => $params['subject'],
            'message' => $params['message'],
        ];

        $saveData = $this->model->create($data);
        return ($saveData) ? true : false;
    }

    public function getContactMessages(){
        $contacts = $this->model->all();
        return ($contacts) ? $contacts : false;
    }

    public function getUnreadContactMessages(){
        $contacts = $this->model->where('status','unread');
        return ($contacts) ? $contacts : false;
    }


    
}