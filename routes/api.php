<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    return "API for Mobile Aid Application";
});


//User Routes

Route::post('/wtf/register', 'AuthController@registerUser')->name('register');

Route::post('/wtf/registerdoc', 'AuthController@registerDoctor')->name('registerdoc');
//Login users
Route::post('/wtf/login', 'AuthController@loginUser')->name('login');  

//Get Refreshed Data from DB
Route::post('/wtf/getfreshdata', 'UserController@getRefreshedDetails')->name('getUserData');  

//change password
Route::post('/wtf/change-password', 'AuthController@changeMainPassword');
//reset password link
Route::post('/reset-password', 'AuthController@resetPassword');
//Gets the authenticated user details/profile via token provided
Route::get('wtf/me', 'AuthController@me');


//Members Routes
Route::post('/wtf/editkyc', 'UserController@saveUser')->name('saveUser'); 
Route::post('/wtf/editprofile', 'UserController@editProfile')->name('editProfile'); 
Route::post('/wtf/call_init', 'CaseController@initiateCall'); 
Route::post('/wtf/search2ma', 'UserController@search2MA');
Route::post('/wtf/terminate_call', 'CaseController@terminatedCallHandle');
//Doctors Routes
Route::post('/wtf/editkyc_doc', 'UserController@saveUser')->name('saveUserDoc'); 
Route::post('/wtf/caller_info', 'CaseController@getCallerInfo'); 
Route::post('/wtf/call_completed', 'CaseController@completeCallLog');
Route::post('/wtf/switch_status', 'DoctorController@switchStatus');

//Subscription Routes
Route::get('/wtf/getpackages', 'SubscriptionController@getPackages')->name('getPackages'); 
Route::post('/wtf/selectpackage', 'SubscriptionController@selectPackage')->name('selectPackage'); 


// USSD Routes
Route::post('/wtf/ussd_register', 'UssdController@ussd_registerUser');
Route::post('/wtf/ussd_querysubscription', 'UssdController@ussd_getUserSubscription');

Route::post('/wtf/ussd_user_validation', 'UssdController@ussd_GetUserName');
Route::post('/wtf/ussd_payment_notification', 'UssdController@UssdPaymentValidation');

//Payment Route
Route::post('/wtf/make-payment', 'PaystackController@redirectToProvider');