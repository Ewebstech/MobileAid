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

    //Register's Users
Route::post('/wtf/register', 'AuthController@registerUser')->name('register');
//Login users
Route::post('/wtf/login', 'AuthController@loginUser');
//change default password
// Route::post('/change-default-password', 'AuthController@changeDefaultPassword');
//change password
Route::post('/wtf/change-password', 'AuthController@changeMainPassword');
//reset password link
Route::post('/reset-password', 'AuthController@resetPassword');
//Gets the authenticated user details/profile via token provided
Route::get('wtf/me', 'AuthController@me');