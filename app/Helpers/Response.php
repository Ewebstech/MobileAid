<?php

namespace App\Helpers;

use App\Helpers\customCode;

Trait Response {
    
    public function exceptionError($msg, $httpCode) {
        return response()->json([
            'status' => false,
            'message' => $msg
        ], $httpCode);
    }

    public function error($msg, $httpCode) {
        return response()->json([
            'status' => false,
            'message' => $msg
        ], $httpCode);
    }

    public static function validationError($msg, $httpCode) {
        return response()->json([
            'status' => false,
            'message' => $msg
        ], $httpCode);
    }

    public static function registerationSuccess($msg, $data, $httpCode) {
        return response()->json([
            'status' => true,
            'message' => $msg,
            'data' => $data
        ], $httpCode);
    }

    public static function success($msg, $httpCode) {
        return response()->json([
            'status' => true,
            'message' => $msg
        ], $httpCode);
    }

    public function issueUserToken($token, $msg, $httpCode, $data) {
        return response()->json([
            'status' => true,
            'message' => $msg,
            'token' => $token,
            'data' => $data
        ], $httpCode);
    }

    public function tokenError($msg, $httpCode) {
        return response()->json([
            'status' => false,
            'error' =>  $msg
        ], $httpCode);   
    }

    public function companyUploadSuccess($msg, $data, $httpCode) {
        return response()->json([
            'status' => false,
            'successmessage' =>  $msg,  
            'data' => $data
        ], $httpCode);   
    }

    public function sendCompanyDetails($msg, $data, $httpCode) {
        return response()->json([
            'status' => true,
            'successmessage' =>  $msg,  
            'data' => $data
        ], $httpCode);   
    }

}