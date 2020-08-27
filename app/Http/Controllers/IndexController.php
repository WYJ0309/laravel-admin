<?php
/**
 * 前台
 */

namespace App\Http\Controllers;


class IndexController extends Controller
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){

        return view('front.index',[]);
    }
    //菜单添加
    public function search(){

        return view('front.search',[]);
    }
    //菜单编辑
    public function page(){

        return view('front.page',[]);
    }
    //菜单保存
    public function image(){

        return view('front.image',[]);
    }


}