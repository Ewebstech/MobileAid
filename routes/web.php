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

Route::get('/pricing', function () {
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

Route::get('/login', 'AuthController@loginPage')->name('loginPage');
Route::post('/contactform', 'PagesController@contactPage')->name('contactPage');

Route::group(['prefix' => '/', 'middleware' => ['redirectauth']], function(){
    Route::get('dashboard','DashboardController@index')->name('Dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');
    
    //User Routes
    Route::get('edit-user', 'UserController@editUser')->name('editUser');
    Route::get('view-user', 'UserController@viewUser')->name('viewUser');

    //Admin Routes
    Route::get('patients', 'PatientsController@viewPatients')->name('viewPatients');
    Route::get('doctors', 'DoctorController@viewDoctors')->name('viewDoctors');
    Route::get('get-profile', 'PatientsController@requestProfile')->name('requestProfile');
    Route::get('get-edit-profile', 'PatientsController@requestProfileEdit')->name('requestProfileEdit');

    // Delete Route
    Route::get('trash', 'TrashController@delete')->name('trashIt');
});



