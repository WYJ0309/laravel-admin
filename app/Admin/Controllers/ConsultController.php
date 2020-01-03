<?php
/**
 * 咨询管理
 */

namespace App\Admin\Controllers;


class ConsultController extends AdminController
{
    
    //咨询列表
    public function index(){
        $data = request()->all();
        $page = empty($data['page'])?1:$data['page'];
        $pageSize = empty($data['page_size'])?15:$data['page_size'];
        $route_name = empty($data['route_name'])?'':$data['route_name'];
        $where = [];
        $where['back_front'] = 1;
        if(!empty($route_name)){
            $where[] = ['route_name','like',"%".$route_name."%"];
        }
        $offset = ($page-1)*$pageSize;
        $list = MenusModel::query()->where($where)->limit($pageSize)->offset($offset)->get();
        $count = MenusModel::query()->where($where)->count();


        $responseArr = ['count'=>$count,'data'=>$list,'cur_page'=>$page,'route_name'=>$route_name];
        return view('admin.menu.index',$responseArr);
    }
    //咨询删除
    public function delete(){

    }
}