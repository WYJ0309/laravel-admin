<?php
use Illuminate\Support\Facades\Route;

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

    Route::get('config/index','ConfigController@index');//配置页面
    Route::post('config/save','ConfigController@saveConfig');//配置保存操作

    Route::get('auth/index','RoleController@authList');//权限页面
    Route::post('auth/save','AuthController@saveConfig');//权限保存操作

    Route::get('article/index', 'ArticleController@index');//文章列表-页面
    Route::get('article/add', 'ArticleController@articleAdd');//文章添加页面
    Route::get('article/edit', 'ArticleController@articleEdit');//文章编辑页面
    Route::post('article/save', 'ArticleController@articleSave');//文章保存
    Route::post('article/del', 'ArticleController@articleDelete');//文章删除
    Route::post('article/opt', 'ArticleController@articleOpt');//文章显示、隐藏
});
