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

Route::put('change_password', 'ProfileController@updatePassword');
Route::get('change_password', 'ProfileController@changePassword');

Route::put('profile', 'ProfileController@updateProfile');
Route::get('profile', 'ProfileController@index');

Route::get('/', 'WelcomeController@index');

Route::get('profile', 'ProfileController@index');

Route::get('home', 'HomeController@index');

Route::get('profile', 'ProfileController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
