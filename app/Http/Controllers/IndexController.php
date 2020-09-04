<?php
/**
 * 前台
 */

namespace App\Http\Controllers;


use App\Models\ArticleModel;
use Illuminate\Support\Facades\DB;
use QL\QueryList;


class IndexController extends Controller
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){
        $artilceList = ArticleModel::query()->leftJoin('article_cate','article_cate.id','=','article.article_cate_id')->select(['article.*','article_cate.cate_name'])->limit(20)->get();
        return view('front.index',['result'=>$artilceList->toArray()]);
    }
    //
    public function newsList(){
        $objArr = DB::table('article_tags')->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->pluck('tag')->toArray();
        $keyword = request()->get('search',implode(" ",$objArr));
        $artilceList = ArticleModel::query()->leftJoin('article_tags','article_tags.article_id','=','article.id')
            ->distinct('article.id')->whereIn('tag',explode(" ",$keyword))->select(['article.id','article_title','article_desc','created_at'])->limit(20)->get();
        return view('front.search',['article_list'=>$artilceList]);
    }

    /**
     * 年度热词展示
     * 每天定时从百度更新热搜榜
     * 每天汇总累计出现频率最高的热搜词
     */
    public function page(){
        $date = date('Ymd',time());
        $dateY = date('Y',time());
        $dateM = date('n',time());
        $dateQ = ceil((date('n',time()))/3);
        $dateW = date('W',time());
//        echo $date.'**'.$dateY.'**'.$dateM.'**'.$dateQ.'**'.$dateW;die;
        //年榜词
        $tagListY = DB::table('hot_tags')->leftJoin('hot_rank','hot_rank.id','=','hot_tags.hot_id')->where(['date_y'=>$dateY])
            ->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->get();
        //季度榜词
        $tagListQ = DB::table('hot_tags')->leftJoin('hot_rank','hot_rank.id','=','hot_tags.hot_id')->where(['date_y'=>$dateY,'date_quarter'=>$dateQ])
            ->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->get();
        //月榜词
        $tagListM = DB::table('hot_tags')->leftJoin('hot_rank','hot_rank.id','=','hot_tags.hot_id')->where(['date_y'=>$dateY,'date_m'=>$dateM])
            ->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->get();
        //周榜词
        $tagListW = DB::table('hot_tags')->leftJoin('hot_rank','hot_rank.id','=','hot_tags.hot_id')->where(['date_y'=>$dateY,'date_week'=>$dateW])
            ->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->get();
        //当天热榜词
        $tagListT = DB::table('hot_tags')->leftJoin('hot_rank','hot_rank.id','=','hot_tags.hot_id')->where(['date'=>$date])
            ->select(DB::raw('count(tag) as tag_num,tag'))->groupBy('tag')->orderBy('tag_num','DESC')->limit(5)->get();

        $today = DB::table('hot_rank')->where(['date'=>date('Ymd',time())])->get();
        $response = [
            'tagY'=>$tagListY->isEmpty()?[]:$tagListY->toArray(),
            'tagQ'=>$tagListQ->isEmpty()?[]:$tagListQ->toArray(),
            'tagM'=>$tagListM->isEmpty()?[]:$tagListM->toArray(),
            'tagW'=>$tagListW->isEmpty()?[]:$tagListW->toArray(),
            'tagT'=>$tagListT->isEmpty()?[]:$tagListT->toArray(),
            'hot_words_list'=>$today->isEmpty()?[]:$today->toArray()//每日百度更新热搜榜
        ];
        return view('front.page',$response);
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

    //每天获取百度热搜一次
    public function fetchBaidu()
    {
        $ql = QueryList::getInstance();
        $html = $ql->get('http://top.baidu.com/buzz?b=341&c=513&fr=topbuzz_b1_c513');
        $data = $html->rules([
            'title'=>['.keyword .list-title','text'],
            'hot'=>['.last>span','text'],
        ])->encoding('UTF-8','GB2312')->removeHead()->range('.list-table tr:gt(0)')->queryData();
        $date = date('Ymd',time());
        $dateY = date('Y',time());
        $dateM = date('n',time());
        $dateQ = ceil((date('n',time()))/3);
        $dateW = date('W',time());
        foreach ($data as &$val){
            $val['date'] = $date;
            $val['date_y'] = $dateY;
            $val['date_m'] = $dateM;
            $val['date_quarter'] = $dateQ;
            $val['date_week'] = $dateW;
        }
        DB::table('hot_rank')->insertOrIgnore($data);//存在则忽略，不存在则插入（存在数据不插入时，也会消耗id，这是一个缺点）
        //如果乱码  调用removeHead
        //如果是列表需要切片 调用range 找到列表的html标签，同时rule规则的选择器设置应该从range里面开始
        return ['status'=>1,'code'=>200,'msg'=>'save successfully'];
    }
    //每天待热搜方法结束后5分钟执行一次
    public function participle(){
        DB::table('hot_rank')->where(['date'=>date('Ymd',time())])->chunkById(20,function ($list){
            $tag_arr = [];
            foreach($list as $val){
                $tagArr = returnWords($val->title);
                foreach(array_keys($tagArr) as $tag){
                    $tmp_tag = [];
                    $tmp_tag['hot_id'] = $val->id;
                    $tmp_tag['tag'] = $tag;
                    $tag_arr[] = $tmp_tag;
                }
            }
            DB::table('hot_tags')->insertOrIgnore($tag_arr);
        });
        return ['status'=>1,'code'=>200,'msg'=>'save successfully'];
    }
}