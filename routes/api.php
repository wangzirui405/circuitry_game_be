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

Route::get('/user/{user_id?}', 'UserController@getUserInfo')->where(['user_id' => '[0-9]*']);
Route::post('/user/change/info', 'UserController@updateUserInfo');

Route::get('/friend/list', 'FriendController@getMyFriendList');
Route::post('/friend/add/{friend_id}', 'FriendController@addNewFriend')->where(['friend_id' => '[0-9]+']);
Route::post('/friend/remove/{friend_id}', 'FriendController@removeFriend')->where(['friend_id' => '[0-9]+']);