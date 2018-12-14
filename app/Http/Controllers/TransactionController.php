<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Validator;
use App\Utils\Packages;
use App\Model\Transactions;


class TransactionController extends Controller
{
    protected $helper;

    public function __construct()
    {   
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth');
        $this->helper = new HelperController;
    }

    public function getUserTransactions($client_id){
        $transaction = new Transactions();
        $userTrans = $transaction->getUserTransactions($client_id);
        if($userTrans){
            return $userTrans->toArray();
        } else {
            return null;
        }
    }

}