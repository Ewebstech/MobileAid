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

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt-auth', ['only' => [
            'changeDefaultPassword', 'changeMainPassword', 'me'
        ]]);
    }


 //REGISTER USER'S  METHOD
  //POST /register
    public function registerUser(Request $request) {
        //validate incoming user input request
        $validator =  $this->validateRegisterRequest($request);

        if($validator->fails()) {
            //if validation error return error messages
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNAUTHORIZED);
        }
        
        try{
            $defaultPassword = $this->generateDefaultStaticPassword(10);
            //creates a new user in database
            $user = User::create([
                
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phonenumber' => $request->phonenumber,
                'password' => hash::make($defaultPassword),

            ]);

        } catch(\Exception $e) {
            //something went wrong during registeration
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::BAD_REQUEST);

        }
            $this->sendWelcomeEmail($user, $defaultPassword);
            //registeration successful
            return $this->registerationSuccess('Registeration successful, a default password as been sent to your email', $user, HttpStatusCodes::OK);
    }

    private function validateRegisterRequest(Request $request) {

        return Validator::make($request->all(), [
            //validation rules
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|digits:11'
        ]);

    }

    public function sendWelcomeEmail(User $user, $defaultPassword) {
        Mail::to($user)->send(new welcomeMail($user, $defaultPassword));
    }




//LOGIN USER METHOD
  //POST /login


    public function loginUser(Request $request) {
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
        return $this->issueUserToken($token, 'Login successful', HttpStatusCodes::OK, $userDetails);

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
            return false;
              
        }   return false;
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




//DISPLAYS THE USER'S PROFILE DETAILS/INFORMATION
 //GET /me


    public function me(Request $request) {
        return $request->auth;
    }




//CHANGES THE DEFAULT USER PASSWORD
 //POST /change-default-password



    public function changeDefaultPassword(Request $request) {
        //validate request
        $validator = $this->validateDefaultChangePasswordRequest($request);
        if($validator->fails()) {
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
        }

        //verify default password
        $verifyDefaultPassword = $this->verifyDefaultPassword($request);
        if(!$verifyDefaultPassword) {
            return $this->validationError('Default password is incorrect', HttpStatusCodes::BAD_REQUEST);
        }

        //update password
        $updatePassword = $this->updateDefaultPassword($request);
        if(!$updatePassword) {
            return $this->error('Something went wrong', HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }
        
        return $this->success('Password updated succesfully', HttpStatusCodes::OK);
    }

    public function validateDefaultChangePasswordRequest($request) {
        $customMessage = [
            'password.confirmed' => 'Password and Confirmpassword must match',
        ];
        return Validator::make($request->all(), [
            'default_password' => 'required',
            'password' =>'required|confirmed',
            'password_confirmation' => 'required',
        ], $customMessage);
    }


    public function updateDefaultPassword(Request $request) {
        return User::where('email', '=', $request->auth->email)
            ->update([
                'password' => Hash::make($request->input('password'))
            ]);
    }




//CHANGES THE USER'S OLD PASSWORD   
 //POST /change-password



    public function changeMainPassword(Request $request) {

        //validate request
        $validator = $this->validateMainChangePasswordRequest($request);
        if($validator->fails()){
            return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
        }

        //verify old password
        if(!$this->verifyOldPassword($request)) {
            return $this->validationError('Old password is incorrect', HttpStatusCodes::BAD_REQUEST);
        }

        //update user's password
        if(!$this->updateMainPassword($request)) {
            return $this->validationError('something went wrong', HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }

        //successful
        return $this->success('Password updated succesfully', HttpStatusCodes::OK);
       
    }

    public function validateMainChangePasswordRequest(Request $request) {
        //custom validation error message
        $customMessage = [
            'password.confirmed' => 'Password and Confirm password must match',
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



//RESETS THE USER PASSWORD  
 //POST /reset-pasword/{token}


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
