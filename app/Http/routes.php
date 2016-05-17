<?php

//Route::group(['middleware' => ['web']], function () {
    
//});

//Route::get('/', function () {
//    return view('welcome');
//});

// frontend routing
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


// backend routing
Route::get('/admin/',function () {
    return 'test';
});

Route::get('/admin/login','Adminauth\AuthController@showLoginForm');
Route::post('/admin/login','Adminauth\AuthController@login');
Route::get('/admin/password/reset','Adminauth\PasswordController@resetPassword');

Route::group(['middleware' => ['admin']], function () {
    //Login Routes...
    Route::get('/admin/logout','Adminauth\AuthController@logout');
	
    // Registration Routes...
    Route::get('admin/register', 'Adminauth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Adminauth\AuthController@register');

    Route::get('/admin', 'Admin\Employee@index');
    Route::get('/admin/dashboard','Admin\Employee@test123');
});




