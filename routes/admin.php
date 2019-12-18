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


Route::group(['prefix' => 'login','middleware'=>'admin_auth'], function() {
    Route::get('index', 'HomeController@index');
    Route::get('/infos', function() {
        return 'your route is ready';
    });
});