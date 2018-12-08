<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Helpers\HttpStatusCodes;

class SubscriptionController extends Controller
{
    protected $helper;

    public function __construct()
    {   
        if(!isset($_SESSION)) session_start();
        $this->middleware('redirectauth',['except' => [
            'getPackages'
        ]]);
        $this->helper = new HelperController;
    }

    public function getPackages(){
        $Packages = $this->definePackages();
        $data = $Packages;
        $msg = "Request Successful";
        return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
        //dd($Packages);
    }

    private function definePackages(){
        $package = [
            "Silver" => "2000",
            "Gold" => "5000",
            "Titanium" => "25,000",
            "Diamond" => "65,000"
        ];

        return $package;
    }
}
