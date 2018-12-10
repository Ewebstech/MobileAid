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
        $contacts = $this->model->where('status','unread')->get();
        return ($contacts) ? $contacts : false;
    }

    public function getReadContactMessages(){
        $contacts = $this->model->where('status','read')->get();
        return ($contacts) ? $contacts : false;
    }

    public function getContactMessagesById($id){
        $contacts = $this->model->where('id',$id)->first();
        return ($contacts) ? $contacts : false;
    }

    public function updateContactStatus($id){
        $data = [
            'status' => 'read',
        ];
        $update = $this->model->where('id', $id)
            ->update($data);

        return ($update) ? true : false;
    }


    
}