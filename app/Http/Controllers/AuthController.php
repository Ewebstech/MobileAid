<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\welcomeMail;
use App\Mail\resetPassword;
use App\ResetPasswordToken;
use Illuminate\Http\Request;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\HelperController;

class AuthController extends Controller
{
    protected $faker;
    protected $helper;

    public function __construct()
    {
        $this->middleware('jwt-auth', ['only' => [
            'changeDefaultPassword', 'changeMainPassword', 'me'
        ]]);
        $this->faker = \Faker\Factory::create();
        $this->helper = new HelperController;
    }
    /**
     * Validate Users
     */
    private function validateRegisterRequest(Request $request) {

        return Validator::make($request->all(), [
            //validation rules
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'bail|required|email|unique:users',
            'phonenumber' => 'bail|required|digits:11|unique:users',
            'password' => 'bail|required|alpha_dash'
        ]);
 
    }

    public function registerUser(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  $this->validateRegisterRequest($request);

        if($validator->fails()) {
            //if validation error return error messages
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }
        
        try{
            $clientID = strtoupper($this->generateDefaultStaticPassword(5));
            $contentParams = $params;
            unset($contentParams['password']);
            $content = json_encode($contentParams);
            //creates a new user in database
            $user = [
                'firstname' => $params['firstname'],
                'lastname' => $params['lastname'],
                'email' => $params['email'],
                'phonenumber' => $params['phonenumber'],
                'password' => hash::make($params['password']),
                'avatar' => $this->faker->imageUrl,
                'role' => 'member',
                'remember_token' => str_random(rand(0,9)),
                'content' => $content,
                'client_id' => $clientID,
            ];

            $saveUserData = User::create($user);
            if($saveUserData){
                // Send Email to User
                $mailParams = [
                    'Name' => $params['firstname']. " ". $params['lastname'],
                    'Email' => $params['email'],
                    'Subject' => 'Welcome Email - '. $params['firstname']. ' '. $params['lastname'],
                    'Username' => $params['email'],
                    'template' => 'emails.register'
                ];

                $sendMail = $this->helper->sendMail($mailParams);
            }

        } catch(\Exception $e) {
            //something went wrong during registration
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);

        }
        
        $msg = 'Hello '. $user['firstname']. ' '. $user['lastname']. ', Your Registration Was Successful!';
        $data = $user;
        
        if(isset($params['view'])){
            if($saveUserData){
               
                $output['status'] = "success";
                $output['data'] = "<center style='font-size: 13px;'><div class='col-md-12 alert alert-success text-center'>Signup Successful. <br> Your <b>Username</b> has been sent to your Email Address.</div></center>";
                return json_encode($output);
            } else {
                $output['failure'] = "<center style='font-size: 13px;'><div class='col-md-6 alert alert-danger text-center'>Registration Center Error. Please Try again!</div></center>";
                return $output['failure'];
            }
        } else {
            return $this->regSuccess($msg, $user, HttpStatusCodes::OK);
        }
    }

    public function loginUser(Request $request) {
        $params = $request->all();
        //dd($params);
        //validate request
        $validator = $this->validateLoginRequest($request);
        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
        }

        //check if password matches
        $verifyPassword = $this->verifyPassword($request);

        if(!$verifyPassword) {
            //User's email or password is incorrect
            return $this->validationError('Invalid login credentials', HttpStatusCodes::BAD_REQUEST);
        }  

        //return the user details back except from password, created and updated_at and remember_token
        $userDetails = array_except($verifyPassword, ['password', 'created_at', 'updated_at', 'remember_token']);
        
        //User is valid, send token and details
        $token =  $this->JwtIssuer($verifyPassword);  

        if(isset($params['view'])){
            if($saveUserData){
               
                $output['status'] = "success";
                $output['data'] = "<center style='font-size: 13px;'><div class='col-md-12 alert alert-success text-center'>Signup Successful. <br> Your <b>Username</b> has been sent to your Email Address.</div></center>";
                return json_encode($output);
            } else {
                $output['failure'] = "<center style='font-size: 13px;'><div class='col-md-6 alert alert-danger text-center'>Registration Center Error. Please Try again!</div></center>";
                return $output['failure'];
            }
        } else {
            $msg = 'Login Successful';
            $data = $userDetails;
            return $this->issueUserToken($token, $msg, HttpStatusCodes::OK, $data);
        }
    }

    public function validateLoginRequest(Request $request) {
        return Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function verifyPassword(Request $request) {
        //check if user exists
        try{
            $userEmail = User::where('email', '=', $request->input('email'))->first();
        }catch(\Exception $e) {
            //something wemt wrong finding the user
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }
        
        if($userEmail) {
            //check if password matches
            if(Hash::check($request->input('password'), $userEmail->password)) {
                return $userEmail;
            }
        }
        
        return false;
    }

    public function verifyDefaultPassword(Request $request) {
        //check if user exists
        try{
            $userEmail = User::where('email', '=', $request->auth->email)->first();
        }catch(\Exception $e) {
            //something wemt wrong finding the user
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        
        if($userEmail) {
            //check if password matches
            if(Hash::check($request->input('default_password'), $userEmail->password)) {
            return $userEmail;
        }
            return false;
              
        }   return false;
    }

    /**
     * DISPLAYS THE USER'S PROFILE DETAILS/INFORMATION USING JWT TOKEN
     */
    public function me(Request $request) {
        return $request->auth;
    }


    public function changeMainPassword(Request $request) {
        //verify old password
        if(!$this->verifyOldPassword($request)) {
            return $this->validationError('Old Password is Incorrect', HttpStatusCodes::BAD_REQUEST);
        }

        //validate request
        $validator = $this->validateMainChangePasswordRequest($request);
        if($validator->fails()){
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
        }

        
        //update user's password
        if(!$this->updateMainPassword($request)) {
            return $this->validationError('Could not update password', HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        //successful
        return $this->success('Password Update Successful', HttpStatusCodes::OK);
       
    }

    public function validateMainChangePasswordRequest(Request $request) {
        //custom validation error message
        $customMessage = [
            'password.confirmed' => 'Password and Confirm Password must match',
        ];
        return Validator::make($request->all(), [
            'old_password' => 'required',
            'password' =>'required|confirmed',
            'password_confirmation' => 'required',
        ], $customMessage);
    }

    public function verifyOldPassword(Request $request) {
        if(Hash::check($request->input('old_password'), $request->auth->password)) {
            return true;
        }
    }

    public function updateMainPassword(Request $request) {
        return User::where('email', '=',  $request->auth->email)
            ->update([
                'password' => hash::make($request->input('password'))
           ]);
    }
    
    
    public function showResetUserPasswordForm(Request $request, $resetToken) {
        //return resetpassword form
        return view('resetpassword', compact('resetToken'));
    }    


    //RESETS THE USER PASSWORD    
    //POST /reset-pasword


    public function resetPassword(Request $request) {
        //validates the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        //validation fails
        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST); 
        }

        //checks if the user with the given email exists
        $user = User::where('email', '=', $request->email)->first();
        if(!$user) {
            return $this->validationError('Email provided is not registered on this platform', HttpStatusCodes::BAD_REQUEST);
        }
        
        $resetToken = $this->generateDefaultStaticPassword(20);
        $resetPasswordUrl = url("/reset-password/{$resetToken}");
        try{
            Mail::to($user)->send(new resetPassword($resetPasswordUrl));
        }catch(ErrorException $e) {
            //something went wrong
        }

         //store token in resetpasswordtoken table
         ResetPasswordToken::create([
            'user_id' => $user->id,
            'token' => $resetToken   
         ]);
         
         return $this->success('Reset password link has been sent to your email', HttpStatusCodes::OK);
    }



    // RESETS THE USER PASSWORD  
    // POST /reset-pasword/{token}


    public function resetUserPassword(Request $request, $resetToken) {
        //custom validation error messages
        $customMessage = [
            'password.confirmed' => 'New password and Confirm password must match.',
            'password_confirmation.required' => 'Confirm new password field is required.'
        ];

        //validates the request
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

        ], $customMessage)->validate();;

        $token = ResetPasswordToken::where('token', '=', $resetToken)->first();
        if(!$token) {
            return back()->with('error', 'Invalid password reset token');
        }

        try{
            //reset password
            User::where('id', '=', $token->user_id)
                ->update([
                    'password' => bcrypt($request->input('password'))
                ]); 
        }catch(Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
            
            //everything was successfully
            //delete the token
            ResetPasswordToken::destroy($token->id);
            //send flash session message
            return back()->with('success', 'Your password has successfully been reset.');
    }

}



//     //CHANGES THE DEFAULT USER PASSWORD
//     //POST /change-default-password

//     public function changeDefaultPassword(Request $request) {
//         //validate request
//         $validator = $this->validateDefaultChangePasswordRequest($request);
//         if($validator->fails()) {
//             return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
//         }

//         //verify default password
//         $verifyDefaultPassword = $this->verifyDefaultPassword($request);
//         if(!$verifyDefaultPassword) {
//             return $this->validationError('Default password is incorrect', HttpStatusCodes::BAD_REQUEST);
//         }

//         //update password
//         $updatePassword = $this->updateDefaultPassword($request);
//         if(!$updatePassword) {
//             return $this->error('Something went wrong', HttpStatusCodes::UNPROCESSABLE_ENTITY);
//         }
        
//         return $this->success('Password updated succesfully', HttpStatusCodes::OK);
//     }

//     public function validateDefaultChangePasswordRequest($request) {
//         $customMessage = [
//             'password.confirmed' => 'Password and Confirmpassword must match',
//         ];
//         return Validator::make($request->all(), [
//             'default_password' => 'required',
//             'password' =>'required|confirmed',
//             'password_confirmation' => 'required',
//         ], $customMessage);
//     }


//     public function updateDefaultPassword(Request $request) {
//         return User::where('email', '=', $request->auth->email)
//             ->update([
//                 'password' => Hash::make($request->input('password'))
//             ]);
//     }




// //CHANGES THE USER'S OLD PASSWORD   
//  //POST /change-password