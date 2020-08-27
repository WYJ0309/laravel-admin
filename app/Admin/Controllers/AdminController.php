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


    public function store(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $allow_types = ['image/png', 'image/jpeg', 'image/gif'];
            $file = $request->file('image');
            if (!in_array($file->extension(), $allow_types)) {
                return ['status' => 0, 'msg' => '图片类型不正确！'];
            }
            if ($file->getSize() > 1024 * 1024 * 5) {
                return ['status' => 0, 'msg' => '图片大小不能超过 3M！'];
            }
            $extension = $file->extension();//文件后缀名
            $localPath = $file->path();//文件服务端临时地址
            $filename = date('YmdHis') . mt_rand(1000, 9999);

            $path = $file->store('public/images');
            echo $path;
            //上传到本地
            return ['status' => 1, 'msg' => '/storage' . str_replace('public', '', $path)];
        }
    }
}
