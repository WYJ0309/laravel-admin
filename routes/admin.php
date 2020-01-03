<?php


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
Route::get('/captcha/{name?}', 'LoginController@captcha');//验证码图片
Route::get('/login/index', 'LoginController@index');//后台登陆页面
Route::any('/login/login', 'LoginController@loginOpt');//后台登陆操作
Route::group(['middleware'=>'admin_auth'], function() {
    Route::any('login/out', 'LoginController@loginOut');//后台退出操作
    Route::get('home/index', 'AdminController@index');//后台主页



    Route::get('menu/index', 'MenuController@index');//菜单列表-页面
    Route::get('menu/add', 'MenuController@menuAdd');//菜单添加页面
    Route::get('menu/edit', 'MenuController@menuEdit');//菜单编辑页面
    Route::post('menu/save', 'MenuController@menuSave');//菜单保存
    Route::post('menu/del', 'MenuController@menuDelete');//菜单删除
});
