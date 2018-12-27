<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MailController as MailController;


class HelperController extends Controller
{
    public function getUsersByStatus($status){
        $sub = new SubscriptionController;
        return $sub->getUsersByStatus($status);
    }

    public function getUsersBySubscription($package){
        $sub = new SubscriptionController;
        return $sub->getUsersBySubscription($package);
    }

    public function getOpenCasesByClientId($client_id){
        $case = new CaseController;
        return $case->getOpenCasesByClientId($client_id);
    }

    public function getClosedCasesByClientId($client_id){
        $case = new CaseController;
        return $case->getClosedCasesByClientId($client_id);
    }

    public function getAllOpenCases(){
        $case = new CaseController;
        return $case->getAllOpenCases();
    }

    public function getAllClosedCases(){
        $case = new CaseController;
        return $case->getAllClosedCases();
    }

    public function getUserCaseDetails($client_id){
        $case = new CaseController;
        return $case->getUserCaseDetails($client_id);
    }

    public function setSession($userDetails){
        $sess = new AuthController;
        return $sess->setSession($userDetails);
    }
    
    public function getUserTransactions($client_id){
        $trans = new TransactionController;
        return $trans->getUserTransactions($client_id);
    }

   
    public function getUserSubscriptionDataViaMobile($phonenumber){
        $sub = new SubscriptionController;
        return $sub->getUserSubscriptionDataViaMobile($phonenumber);
    }

    public function getUserSubscriptionData($user_email){
        $sub = new SubscriptionController;
        return $sub->getUserSubscriptionData($user_email);
    }

    public function getpackageDetails($package_name){
        $sub = new SubscriptionController;
        return $sub->getpackageDetails($package_name);
    }
    public function getCalls($client_id){
        $sub = new SubscriptionController;
        return $sub->getCalls($client_id);
    }

    public function sendMail($params){
        $mail = new MailController;
        return $mail->sendMail($params);
    }

    public function getTodayRegs(){
        $users = new UserController;
        return $users->getTodayRegs();
    }

    public function getAllUsersByRole($role){
        $users = new UserController;
        return $users->getAllUsersByRole($role);
    }

    public function getUserDetails($username){
        $users = new UserController;
        return $users->getUserDetails($username);
    }

    public function getUserDetailsById($userId){
        $users = new UserController;
        return $users->getUserDetailsById($userId);
    }

    public function getContactMessages(){
        $contact = new PagesController;
        return $contact->getContactMessages();
    }

    public function getUnreadContactMessages(){
        $contact = new PagesController;
        return $contact->getUnreadContactMessages();
    }

    public function getReadContactMessages(){
        $contact = new PagesController;
        return $contact->getReadContactMessages();
    }


}
