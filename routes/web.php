<?php

use Illuminate\Support\Facades\Route;

Route::get('fetch/hot', 'IndexController@fetchBaidu');




Route::get('/', 'IndexController@index');//网站首页
Route::get('news','IndexController@newsList');
Route::get('page','IndexController@page');
Route::get('image','IndexController@image');
Route::get('news/detail/{id}', 'IndexController@detail');
Route::get('news/incr/{id}', 'IndexController@viewIncr');


Route::post('file/store', 'FileController@store');//文件上传
Route::get("storage/{file_name}","FileController@accessFile");//文件访问地址