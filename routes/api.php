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

//Get Refreshed Data from API

Route::post('/wtf/getfreshdata', 'UserController@getRefreshedDetails')->name('getUserData');  
//change default password
// Route::post('/change-default-password', 'AuthController@changeDefaultPassword');
//change password
Route::post('/wtf/change-password', 'AuthController@changeMainPassword');
//reset password link
Route::post('/reset-password', 'AuthController@resetPassword');
//Gets the authenticated user details/profile via token provided
Route::get('wtf/me', 'AuthController@me');


//Members Routes
Route::post('/wtf/editkyc', 'UserController@saveUser')->name('saveUser'); 
Route::post('/wtf/editprofile', 'UserController@editProfile')->name('editProfile'); 

//Doctors Routes
Route::post('/wtf/editkyc_doc', 'UserController@saveUser')->name('saveUserDoc'); 

//Subscription Routes
Route::get('/wtf/getpackages', 'SubscriptionController@getPackages')->name('getPackages'); 
Route::post('/wtf/selectpackage', 'SubscriptionController@selectPackage')->name('selectPackage'); 