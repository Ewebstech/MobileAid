<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/subscription', function () {
    return view('pricing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/test', function () {
    return view('Shell');
});



//Web Hook
Route::get('/webhook', 'TrashController@webhook');

Route::get('/login', 'AuthController@loginPage')->name('loginPage');
Route::post('/contactform', 'PagesController@contactPage')->name('contactPage');

Route::group(['prefix' => '/', 'middleware' => ['redirectauth']], function(){
    Route::get('dashboard','DashboardController@index')->name('Dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');
    
    // General User Routes
    Route::get('edit-user', 'UserController@editUser')->name('editUser');
    Route::get('view-user', 'UserController@viewUser')->name('viewUser');
    Route::get('choose-subscriptions', 'SubscriptionController@selectSubscription')->name('selectSub');
    Route::get('renewal', 'SubscriptionController@getRenewable')->name('getRenewable');
    Route::get('transaction', 'PatientsController@viewTransactions')->name('viewTransactions');
    Route::get('my-cases', 'PatientsController@viewCases')->name('viewCases');
    Route::get('my-cases', 'PatientsController@viewCases')->name('viewCases');
    // Doctor Routes
    Route::get('handled-cases', 'DoctorController@viewHandledCases')->name('handledCases');
    Route::post('save-report', 'DoctorController@saveReport')->name('saveReport');
    //Admin Routes
    Route::get('clients', 'PatientsController@viewPatients')->name('viewPatients');
    Route::get('doctors', 'DoctorController@viewDoctors')->name('viewDoctors');
    Route::get('get-profile', 'PatientsController@requestProfile')->name('requestProfile');
    Route::get('get-edit-profile', 'PatientsController@requestProfileEdit')->name('requestProfileEdit');
    Route::get('inbox', 'AdminController@viewUnreadMessages')->name('inbox');
    Route::get('archive', 'AdminController@viewReadMessages')->name('archive');
    Route::get('read', 'AdminController@ReadMessages')->name('read');
    Route::get('errors', 'AdminController@DisplayErrors')->name('errors');
    Route::get('open-cases', 'AdminController@viewOpenCases')->name('openCases');
    Route::get('closed-cases', 'AdminController@viewClosedCases')->name('closedCases');
    Route::get('view-subs', 'AdminController@viewSubscribers')->name('viewSubscribers');
    Route::get('active-users', 'AdminController@viewActiveUsers')->name('viewActiveUsers');
    Route::get('in-active-users', 'AdminController@viewInActiveUsers')->name('viewInActiveUsers');
    //paymentcontroller routes
    Route::post('/makepayment', 'PaystackController@redirectToProvider');
    
    // Delete Route
    Route::get('trash', 'TrashController@delete')->name('trashIt');
});

Route::get('/payment/callback', 'PaystackController@handleGatewayCallback');



