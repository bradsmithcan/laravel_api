<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return 'home';
});

Route::get('test', function () {
    return 'test';
});

// Authentication
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// JWT Auth
Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('authenticate', 'AuthenticateController@authenticate');

// Reputation lookup
Route::any('reputation', 'ReputationController@detectRequestType');

//// User management
//Route::group(['middleware' => 'auth'], function () {
//    Route::group(['middleware' => 'admin'], function () {
//        Route::get('admin', 'Admin\AdminController@dashboard');
//        Route::resource('admin/user', 'Admin\AdminController');
//    });
//});
