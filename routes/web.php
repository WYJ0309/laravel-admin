<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');//网站首页
Route::get('/search','IndexController@search');
Route::get('/page','IndexController@page');
Route::get('/image','IndexController@image');
Route::get('news/detail/{id}', 'IndexController@detail');

Route::post('file/store', 'FileController@store');//文件上传
Route::get("storage/{file_name}","FileController@accessFile");//文件访问地址