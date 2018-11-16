<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Helpers\JwtIssuer;
use App\Helper\Uploadimage;
use App\Helpers\UploadMultipleImages;
use App\Helpers\generateDefaultPassword;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Response, generateDefaultPassword, Uploadimage, JwtIssuer, UploadMultipleImages;

     protected function returnOutput($status,$data){
        if($status == "success"){
            $output['status'] = 'success';
            $output['data'] = '<p class="alert alert-success text-center"> <i class="fa fa-check fa-fw"> </i> '.$data.' </p>';
        } else {
            $output['status'] = 'error';
            $output['data'] = '<p class="alert alert-danger text-center"> <i class="fa fa-ban fa-fw"> </i> '.$data.' </p>';
        }
        return json_encode($output);
    }

    protected function jsonToArray($data) {
        $Content = json_decode($data, true);
        return $Content;
    }

    protected function displayValidationError($errorResponse){
        if(is_object($errorResponse)){
        $errordata = $errorResponse->original;
        $errorMessageArray = $errordata['message'];
            if(is_array($errorMessageArray)){
                $errorMessage = implode(',<br>',$errorMessageArray);
            } else {
                $errorMessage = $errorMessageArray;
            }
        }
        $output['data'] = '<p class="alert alert-danger text-center" style="padding-top: 6px; font-size: 12px; font-weight: 700"> <i class="fa fa-times fa-fw"> </i> '.$errorMessage.' </p>';
        $ouput['status'] = "failure";
        return json_encode($output);
    }
}
