<?php
namespace App\Model;

use App\Transaction;
use Illuminate\Database\QueryException;

class Transactions
{
    protected $model;
    protected $errorMsg;
    
    public function __construct(){
        $this->model = new Transaction();
    }

    public function addTransaction($params){
        $content = json_encode($params);
        $data = [
            'client_id' => $params['client_id'],
            'email' => $params['email'],
            'status' => $params['status'],
            'transref' => $params['reference'],
            'package' => $params['package'],
            'amount' => $params['amount']/100,
            'currency' => $params['currency'],
            'content' => $content,
        ];
        try{
            $saveData = $this->model->create($data);
            return ($saveData) ? true : false;
        } catch (QueryException $e){
            if($e->errorInfo[0] == "23000"){ 
                $this->errorMsg = $params["gateway_response"]." Transaction Details Already Captured!";
                return $this->errorMsg;
            } 
          
        }
        
    }

    public function addTransactionUssd($params){
        $content = json_encode($params);
        $data = [
            'client_id' => $params['client_id'],
            'email' => $params['email'],
            'status' => $params['status'],
            'transref' => $params['reference'],
            'package' => $params['package'],
            'amount' => $params['amount']/100,
            'currency' => $params['currency'],
            'content' => $content,
        ];
        try{
            $saveData = $this->model->create($data);
            return ($saveData) ? true : false;
        } catch (\Exception $e){
            return $e->getMessage();      
        }
        
    }

    public function getUserTransactions($client_id){
        $trans = $this->model->where('client_id',$client_id)->get();
        return ($trans) ? $trans : false;
    }

    // public function updateSubscription($params){
    //     $content = json_encode($params);
    //     $data = [
    //         'user' => $params['user'],
    //         'status' => $params['status'],
    //         'calls' => $params['calls'],
    //         'package' => $params['package'],
    //         'content' => $content,
    //     ];
    //     $update = $this->model->where('user', $params['user'])
    //         ->update($data);

    //     return ($update) ? true : false;
    // }

    
}