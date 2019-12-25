<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::any('index','HomeController@index');
//Route::any('test','HomeController@test')->middleware('test');
Route::get('/', 'LoginController@index');//后台登陆页面
Route::group(['middleware'=>'admin_auth'], function() {
    Route::get('login/login', 'LoginController@loginOpt');//后台登陆操作
    Route::get('home/index', 'AdminController@index');//后台主页

});
