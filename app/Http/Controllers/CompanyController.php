<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    
    public function __construct() {
        //applies the jwt middleware to all the methods
        $this->middleware('jwt-auth');
    }



//Regsiters the user's company
  //POST /register-company  


  
    public function store(Request $request) {

       //validate incoming request
       $validator = $this->validateRequest($request);

       //if validation fails
       if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BADREQUEST);
       }

       //upload company logo
       $logo = $this->Uploadimage($request);

       //store the request
       try{
            //creates the company
            $company = Company::create([
                
                'user_id' => $request->auth->id,
                'name' => $request->input('name'),
                'logo' => $logo[0],
                'imagepublic_id' => $logo[1],
                'rc' => $request->input('rc'),
                'category' => $request->input('category'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'description' => $request->input('description')

            ]);

       } catch(\Exception $e) {
            //something wemt wrong finding the user
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::UNPROCESSABLEENTITY);
       }
       
       //everything went well.
       return $this->companyUploadSuccess('Company registered successfully', $company, HttpStatusCodes::OK);

    }

    //validate incoming request
    public function validateRequest(Request $request) {
        return $val = Validator::make($request->all(), [
            //validation rules
            'name' => 'required|unique:companies',
            'logo' => 'required|mimes:jpeg,jpg,png',
            'rc' => 'required|min:8|max:8|unique:companies',
            'category' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'address' => 'required',
            'description'=> 'required'
        ]);
    }




    
//Send the user's company details
  //POST /send-company-details 
  
  
    public function uploadedCompanyDetails(Request $request) {

        $companyDetails = Company::where('user_id', '=', $request->auth->id)->get();
        $categories = array_pluck($companyDetails, ['category']);
        $emails = array_pluck($companyDetails, ['email']);
        $phonenumbers = array_pluck($companyDetails, ['phone']);
        $details = [
            "categories" => $categories,
            "phonenumbers" => $phonenumbers,
            "emails" => $emails
        ];

        return $this->sendCompanyDetails('Company details successfully retrieved', $details, HttpStatusCodes::OK);

    }

    
}

