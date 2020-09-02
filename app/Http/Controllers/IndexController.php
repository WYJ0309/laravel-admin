<?php
/**
 * 前台
 */

namespace App\Http\Controllers;


use App\Models\ArticleModel;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){
        $artilceList = ArticleModel::query()->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->get();
        return view('front.index',['result'=>$artilceList->toArray()]);
    }
    //
    public function newsList(){

        return view('front.search',[]);
    }
    //年度热词展示
    public function page(){

        return view('front.page',[]);
    }
    //图库展示
    public function image(){

        return view('front.image',[]);
    }

    public function detail($id){
        $article = ArticleModel::query()->where(['article.id'=>$id])->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->first();
        $pre = ArticleModel::query()->where('id','<',$id)->select(['id','article_title'])->first();
        $next = ArticleModel::query()->where('id','>',$id)->select(['id','article_title'])->first();
        $tagArr = explode(' ',$article['article_keyword']);
        $tagObj = DB::table('article_tags')->whereIn('tag',$tagArr)->get();
        if($tagObj->isEmpty()){
            $article['relative'] = [];
        }else{
            $idArr = array_column($tagObj->toArray(),'article_id');
            $idArr = array_unique($idArr);
            $article['relative'] = ArticleModel::query()->whereIn('id',$idArr)->select(['id','article_title'])->limit(9)->get();
        }
        $sideList = ArticleModel::query()->where('is_side','=',1)->select(['id','article_title','article_desc','thumb_url'])->get();
        $article['side_list'] = $sideList->isEmpty()?[]:$sideList->toArray();
        $viewList = ArticleModel::query()->orderBy('view_num','DESC')->limit(7)->select(['id','article_title','article_desc','thumb_url'])->get();
        $article['view_list'] = $viewList->isEmpty()?[]:$viewList->toArray();
        $article['pre'] = empty($pre)?[]:$pre;
        $article['next'] = empty($next)?[]:$next;
        return view('front.detail',$article);
    }

    public function viewIncr($id){
        ArticleModel::query()->where('id','=',$id)->increment('view_num');
        return ['status'=>1,'code'=>200,'msg'=>'保存成功'];
    }
}