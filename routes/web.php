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

Route::get('/auth/mock_login/{user_id?}', 'Auth\LoginController@mock')->where(['user_id' => '[0-9]*']);

Route::get('/check/phone/{phone}', 'UserController@checkPhoneExist')->where(['phone' => '[0-9]{11}']);
Route::get('/check/name/{name}', 'UserController@checkNameExist');

Route::post('/register', 'Auth\LoginController@register');
Route::post('/auth/login', 'Auth\LoginController@authenticate');
Route::get('/auth/logout', 'Auth\LoginController@logout');