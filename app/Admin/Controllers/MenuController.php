<?php
/**
 * 菜单管理
 */

namespace App\Admin\Controllers;


use App\Models\MenusModel;


class MenuController extends AdminController
{
    //-------------------------后台菜单展示---------------------------------
    //菜单列表--页面接口
    public function index(){
        $where = [];
        $where['back_front'] = 1;


        $list = MenusModel::query()->where($where)->get();
        $count = MenusModel::query()->where($where)->count();
        $result = [];
        foreach ($list->toArray() as $value){
            if(empty($value['route_pid'])){
                $result[$value['id']] = $value;
            }else{
                $result[$value['route_pid']]['son'][] = $value;
            }
        }
        $responseArr = ['count'=>$count,'data'=>$result];
        return view('admin.menu.index',$responseArr);
    }
    //菜单添加
    public function menuAdd(){
        $cateObj = MenusModel::query()->where(['back_front'=>1,'route_pid'=>0])->get();
        return view('admin.menu.menu_add',['cateList'=>$cateObj->isEmpty()?[]:$cateObj->toArray()]);
    }
    //菜单编辑
    public function menuEdit(){
        $data = request()->all();
        $cateObj = MenusModel::query()->where(['back_front'=>1,'route_pid'=>0])->get();
        $info = MenusModel::query()->where(['id'=>$data['id']])->first();
        return view('admin.menu.menu_edit',['cateList'=>$cateObj->isEmpty()?[]:$cateObj->toArray(),'result'=>$info]);
    }
    //菜单保存
    public function menuSave(){
        $data = request()->all();
        $data['back_front'] = empty($data['back_front'])?1:2;//1后台菜单 2前台菜单
        try{
            if(empty($data['id'])){
                $res = MenusModel::create($data);
                if($res->id){
                    return response()->json(['data'=>[],'msg'=>'添加成功','status'=>true]);
                }else{
                    return response()->json(['data'=>[],'msg'=>'添加失败','status'=>false]);
                }
            }else{
                $res = MenusModel::query()->where(['id'=>$data['id']])->update($data);
                if($res){
                    return response()->json(['data'=>[],'msg'=>'修改成功','status'=>true]);
                }else{
                    return response()->json(['data'=>[],'msg'=>'修改失败','status'=>false]);
                }
            }
        }catch (\Exception $e){
            return response()->json(['data'=>[],'msg'=>'操作异常','status'=>false]);
        }
    }
    //菜单删除
    public function menuDelete(){
        $data = request()->all();
        MenusModel::query()->where(['id'=>$data['id']])->delete();
        return response()->json(['data'=>[],'msg'=>'删除成功','status'=>true]);
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