<?php
/**
 * 文章管理
 */

namespace App\Admin\Controllers;


use Illuminate\Support\Facades\Cache;

class ArticleController extends AdminController
{
    //-------------------------后台文章展示---------------------------------
    //文章列表
    public function index(){
        $result = Cache::get('admin_menu_arr');
        $responseArr = ['data'=>$result];
        return view('admin.article.index',$responseArr);
    }
    //文章添加
    public function articleAdd(){

    }
    //文章编辑
    public function articleEdit(){

    }
    //文章保存
    public function articleSave(){

    }
    //文章删除
    public function articleDelete(){

    }
    //文章操作 显示 隐藏
    public function articleOpt(){

    }
}