<?php
/**
 * 菜单管理
 */

namespace App\Admin\Controllers;


use App\Models\MenusModel;
use Illuminate\Support\Facades\URL;

class MenuController extends AdminController
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){
        $data = request()->all();
        $page = empty($data['page'])?1:$data['page'];
        $pageSize = empty($data['page_size'])?10:$data['page_size'];
        $where = [];

        $list = MenusModel::query()->where($where)->limit($pageSize)->offset($page)->get();
        $count = MenusModel::query()->where($where)->count();
        URL::to();

        return view('admin.menu.index',['count'=>$count,'data'=>$list]);
    }
    //菜单添加
    public function menuAdd(){

        return view('admin.menu.menu_add');
    }
    //菜单编辑
    public function menuEdit(){

        return view('admin.menu.menu_edit');
    }
    //菜单保存
    public function menuSave(){
        $data = request()->all();
        $data['back_front'] = empty($data['back_front'])?1:2;//1后台菜单 2前台菜单
        $res = MenusModel::create($data);
        if($res->id){
            return response()->json(['data'=>[],'msg'=>'添加成功','status'=>true]);
        }else{
            return response()->json(['data'=>[],'msg'=>'添加失败','status'=>false]);
        }
    }
    //菜单删除
    public function menuDelete(){

    }

    //-------------------------前台菜单控制---------------------------------
    //前台菜单列表
    public function showList(){

    }
    //菜单添加
    public function showAdd(){

    }
    //菜单编辑
    public function showEdit(){

    }
    //菜单保存
    public function showSave(){

    }
    //菜单删除
    public function showDelete(){

    }
    //菜单显示 隐藏
    public function showOpt(){

    }

}