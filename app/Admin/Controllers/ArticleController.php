<?php
/**
 * 文章管理
 */

namespace App\Admin\Controllers;


use App\Models\ArticleCateModel;
use App\Models\ArticleModel;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\JiebaAnalyse;
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
        $cateList = ArticleCateModel::query()->get()->toArray();
        $responseArr = ['cateList'=>$cateList];
        return view('admin.article.article_add',$responseArr);
    }
    //文章编辑
    public function articleEdit(){

    }
    //文章保存
    public function articleSave(){
        ini_set('memory_limit', '600M');
        $params = request()->all();
        Jieba::init();
        Finalseg::init();
        JiebaAnalyse::init();
        $params['article_keyword'] = implode(" ",array_keys(JiebaAnalyse::extractTags($params['content'], 10)));
        $insertArr = [
            'article_cate_id'=>$params['article_cate_id'],
            'article_title'=>$params['article_title'],
            'article_keyword'=>$params['article_keyword'],
            'article_desc'=>$params['article_desc'],
            'article_state'=>$params['article_state'],
            'article_href'=>$params['article_href'],
            'article_sort'=>$params['article_sort'],
            'thumb_url'=>$params['thumb_url'],
            'content'=>$params['content'],
        ];
        ArticleModel::query()->insert($insertArr);
        return ['status'=>1,'code'=>200,'msg'=>'保存成功'];
    }
    //文章删除
    public function articleDelete(){

    }
    //文章操作 显示 隐藏
    public function articleOpt(){

    }
}