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


// Twitter認証関連
Route::get('auth/twitter', 'Auth\AuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/', function () {
    return view('index');
});

Route::get('manage', 'ManageController@index');
Route::resource('user', 'UserController');

Route::get('diaries', 'DiariesController@index');
Route::patch('diaries', 'DiariesController@update');


