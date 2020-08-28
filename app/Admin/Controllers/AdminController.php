<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        //$this->adminUserInfo = Auth::guard('admin')->user();
        //Auth::guard('admin');
        if(empty(Cache::get('admin_menu_arr'))){
            $where = [];
            $where['back_front'] = 1;
            $where['route_pid'] = 0;
            $list = MenuModel::query()->where($where)->orderBy('route_sort')->get();
            $result = [];
            foreach ($list->toArray() as $value){
                $sonMenu = MenuModel::query()->where(['route_pid'=>$value['id']])->get();
                if($sonMenu->isEmpty()){
                    $result[] = $value;
                }else{
                    $value['son'] = $sonMenu->toArray();
                    $result[] = $value;
                }
            }
            Cache::put('admin_menu_arr',$result);
        }
    }

    public function index(){

        return view('admin.index');
    }
}
