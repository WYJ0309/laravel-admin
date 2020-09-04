<?php
/**
 * 文章管理
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\FileController;
use App\Models\ArticleCateModel;
use App\Models\ArticleModel;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\JiebaAnalyse;
use Illuminate\Support\Facades\DB;

class ArticleController extends AdminController
{
    //-------------------------后台文章展示---------------------------------
    //文章列表
    public function index(){
        $result = ArticleModel::query()->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->get()->toArray();
        return view('admin.article.index',['result'=>$result]);
    }
    //文章添加
    public function articleAdd(){
        $cateList = ArticleCateModel::query()->get()->toArray();
        $responseArr = ['cateList'=>$cateList];
        return view('admin.article.article_add',$responseArr);
    }
    //文章编辑
    public function articleEdit(){
        $id = request()->post('id');
        $cateList = ArticleCateModel::query()->get()->toArray();
        $info = ArticleModel::query()->where('id','=',$id)->first();
        $responseArr = ['cateList'=>$cateList,'result'=>$info];
        return view('admin.article.article_edit',$responseArr);
    }

    //文章保存
    public function articleSave(){
        ini_set('memory_limit', '600M');
        $params = request()->all();
        Jieba::init();
        Finalseg::init();
        JiebaAnalyse::init();
        $insertArr = [
            'article_cate_id'=>$params['article_cate_id'],
            'article_title'=>$params['article_title'],
            'article_desc'=>$params['article_desc'],
            'article_state'=>$params['article_state'],
            'article_href'=>$params['article_href'],
            'article_sort'=>$params['article_sort'],
            'thumb_url'=>$params['thumb_url'],
            'content'=>$params['content'],
        ];
        if(empty($params['id'])){
            $content = FileController::removeHtml($params['content']);
            $tagArr = array_keys(returnWords($content,10));
            $insertArr['article_keyword'] = implode(" ",$tagArr);
            $insertArr['created_at'] = $insertArr['updated_at'] = date('Y-m-d H:i:s',time());
            $id = ArticleModel::query()->insertGetId($insertArr);
            $tagTmp = [];
            foreach ($tagArr as $val){
                $tmp = [];
                $tmp['article_id'] = $id;
                $tmp['tag'] = $val;
                $tagTmp[] = $tmp;
            }
            DB::table('article_tags')->insert($tagTmp);
        }else{
            $insertArr['updated_at'] = date('Y-m-d H:i:s',time());
            ArticleModel::query()->where('id','=',$params['id'])->update($insertArr);
        }
        return ['status'=>1,'code'=>200,'msg'=>'保存成功'];
    }
    //文章删除
    public function articleDelete(){
        $id = request()->post('id');
        ArticleModel::query()->where('id','=',$id)->delete();
        return ['status'=>1,'msg'=>'删除成功','code'=>200];
    }
    //文章操作 显示 隐藏
    public function articleOpt(){
        $id = request()->post('id');
        $state = request()->post('state');
        ArticleModel::query()->where('id','=',$id)->update(['article_state'=>$state]);
        return ['status'=>1,'msg'=>'设置成功','code'=>200];
    }

}