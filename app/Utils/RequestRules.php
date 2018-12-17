<?php 

namespace App\Utils;


class RequestRules
{
    private static $rules = [
        'MERCHANT_REQUEST' => [
            'store_name' => 'required|',
            'phone' => 'required|unique:merchant_requests',
            'email' => 'required|unique:merchant_requests',
            'address' => 'required',
            'purpose' => 'required'
        ],
        'UPDATE_PROFILE' => [
            //validation rules
            'firstname' => 'nullable',
            'lastname' => 'nullable',  
            'email' => 'email|required',
            'phonenumber' => 'required',
            'avatar' => 'nullable',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'nullable'
        ],
        'PATIENT_KYC' => [
            //validation rules
            'treatment_status' => '',
            'email' => 'email|required',  
            'phonenumber' => 'required',
            'emergency_contact_name_1' => '',
            'emergency_contact_num_1' => '',
            'emergency_contact_name_2' => '',
            'emergency_contact_num_2' => '',
            'hmo_reg_status' => '',
            'hmo_information' => '',
            'medical_condition' => '',
            'medical_condition_details' => '',
            'contact_address' => '',
            'city' => '',
            'postal_code' => '',
            'country' => '',
            'role' => 'required'
        ],
        'OTHER_KYC' => [
            //validation rules
            'email' => 'email|required',  
            'phonenumber' => 'required',
            'contact_address' => '',
            'city' => '',
            'postal_code' => '',
            'country' => '',
            
        ],
        'GET_USER_DETAILS' => [
            'client_id' => 'required'
        ],
        'USSD_REGISTER' => [
            'firstname' => 'required|string',
            'lastname' => 'required|string',  
            'gender' => 'required',
            'phonenumber' => 'required|unique:users',
        ],
        'USSD_QUERY_SUBSCRPTION_DATA' => [
            'client_id' => 'required'
        ],
        'CLIENT_CASES' => [
            'client_id' => 'required',
            'phonenumber' => 'required',

        ]
        
    ];


    public static function getRule($name)
    {
        return self::$rules[$name];
    }

}