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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    protected $faker;
    protected $helper;

    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
        $this->middleware('jwt-auth', ['only' => [
            'changeDefaultPassword', 'changeMainPassword', 'me'
        ]]);
        $this->helper = new HelperController;
    }

    public function loginPage(Request $request){
        if(!isset($_SESSION['UserDetails'])){
            return view('login');
        } else{
            return redirect()->route('Dashboard');
        }
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
            'gender' => 'required',
            'phonenumber' => 'bail|required|unique:users',
            'password' => 'required|alpha_dash',
            'role' => 'required'
        ]);
    }

    public function registerUser(Request $request) {
        $params = $request->all();
        //validate incoming user input request
        $validator =  $this->validateRegisterRequest($request);

        if($validator->fails()) {
            //if validation error return error messages
            if(isset($params['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
            }
        }

        $gender = $params['gender'];

        if($gender == "male"){
           $avatar_img = "/images/male_avatar.png";
        } elseif($gender == "female") {
            $avatar_img = "/images/female_avatar.png";
        } else {
            $avatar_img = "/images/male_avatar.png";
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
                'avatar' => $avatar_img,
                'role' => $params['role'],
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
                $status = "success";
                $data = "Your Signup Was Successful. <br> Your <b>Username</b> has been sent to your Email Address.";
                return $this->returnOutput($status,$data);
            } else {
                $status = "failure";
                $data = "Registration Error. Please Try again!";
                return $this->returnOutput($status,$data);
                
            }
        } else {
            return $this->regSuccess($msg, $user, HttpStatusCodes::OK);
        }
    }

    public function validateLoginRequest(Request $request) {
        return Validator::make($request->all(), [
            'loginparam' => 'required',
            'password' => 'required',
        ]);
    }

    public function loginUser(Request $request) {
        $params = $request->all();
        //validate request
        $validator = $this->validateLoginRequest($request);
        if($validator->fails()) {
            if(isset($params['view'])){
                $errorResponse = $this->validationError($validator->getMessageBag()->all());
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError($validator->getMessageBag()->all(), HttpStatusCodes::BAD_REQUEST);
            }
        }

        //check if password matches
        $verifyPasswordObj = $this->verifyPassword($request);
        if($verifyPasswordObj){
            $verifyPassword = $verifyPasswordObj->toArray();
        }

        if(!$verifyPassword) {
            //User's email or password is incorrect
            if(isset($params['view'])){
                $errorResponse = $this->validationError('Invalid Login Credentials');
                return $this->displayValidationError($errorResponse);
            } else {
                return $this->validationError('Invalid Login Credentials', HttpStatusCodes::BAD_REQUEST);
            }
        }  

        //return the user details back except from password, created and updated_at and remember_token

        //$userDetails = array_except($verifyPassword, ['password', 'created_at', 'updated_at', 'remember_token']);
       // dd($verifyPassword);

        unset($verifyPassword['password']);
        unset($verifyPassword['created_at']);
        unset($verifyPassword['updated_at']);
        unset($verifyPassword['remember_token']);

        
        $userDetails  =$verifyPassword;

        //User is valid, send token and details
        $token =  $this->JwtIssuer($verifyPasswordObj);  
        
        if(isset($params['view'])){
            if($userDetails){
                // set user details in session
                $allDetails = $userDetails->toArray();
                $sessionUserDetails = $this->setSession($allDetails);

                $status = "success";
                $data = "Login Successful";
                return $this->returnOutput($status,$data);
            } else {
                $status = "failure";
                $data = "Login Failure !";
                return $this->returnOutput($status,$data);
            }
        } else {
            $msg = 'Login Successful';
            $data = $userDetails;
            return $this->issueUserToken($token, $msg, HttpStatusCodes::OK, $data);
        }
    }

    private function setSession($userDetails){
        foreach ($userDetails as $field => $value) {
            # code...
            $_SESSION['UserDetails'][$field] = $value;
        }
        return $_SESSION['UserDetails'];
    }

    public function processUserLogin($user){
        

    }

    public function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strpos($email, '.');
        return ($find1 !== false && $find2 !== false && $find2 > $find1 ? true : false);
     }

    public function verifyPassword(Request $request) {
        $loginParam = $request->input('loginparam');
        // Check if Login Param is Email
        $check = $this->checkEmail($loginParam);
        if($check){
            $type = "email";
        } else {
            $type = "phonenumber";
        }
        //check if user exists
        try{
            if($type == "email"){
                $userDetails = User::where('email', '=', $request->input('loginparam'))->first();
            } elseif ($type == "phonenumber") {
                $userDetails = User::where('phonenumber', '=', $request->input('loginparam'))->first();
            }
            
        }catch(\Exception $e) {
            //something wemt wrong finding the user
            return $this->exceptionError($e->getMessage(), HttpStatusCodes::UNPROCESSABLE_ENTITY);
        }
        
        if($userDetails) {
            //check if password matches
            if(Hash::check($request->input('password'), $userDetails->password)) {
                return $userDetails;
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
            'password.confirmed' => 'Password and Confirm Password Must Match!',
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

    public function logout(){
        unset($_SESSION['UserDetails']);
        session_destroy();
        return Redirect::to('/login');;
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