<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');//网站首页
Route::get('/search','IndexController@search');
Route::get('/page','IndexController@page');
Route::get('/image','IndexController@image');
