<?php
/**
 * 前台
 */

namespace App\Http\Controllers;


use App\Models\ArticleModel;

class IndexController extends Controller
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){
        $artilceList = ArticleModel::query()->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->get();
        return view('front.index',['result'=>$artilceList->toArray()]);
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

    public function detail($id){
        $article = ArticleModel::query()->where(['article.id'=>$id])->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->first();

        return view('front.detail',$article);
    }

}