<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Model\Users;


class TrashController extends Controller
{
    protected $helper;

    public function __construct()
    {   
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth');
        $this->helper = new HelperController;
    }

    public function delete(Request $request){
        $table = $_GET['table'];
        $userId = $_GET['cid'];
       //  dd($table);
        switch($table){
            case ($table == "users"):
                $del = new Users;
                $output = $del->deleteRow($userId);
            break;
            default:
            //
            break;

        }
        return $output;
    }

}
