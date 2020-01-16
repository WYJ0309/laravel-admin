<?php
/**
 * 配置管理
 */

namespace App\Admin\Controllers;


use App\Models\SysConfigModel;

class ConfigController extends AdminController
{
    
    //配置展示
    public function index(){
        $json = SysConfigModel::query()->where(['type'=>1])->value('sys_val');
        $responseArr = json_decode($json,true);
        return view('admin.config.index',$responseArr);
    }
    //配置保存
    public function saveConfig(){
        $data = request()->all();
        $id = SysConfigModel::query()->where(['type'=>1])->value('id');
        if(empty($id)){
            SysConfigModel::create(['type'=>1,'type_name'=>'系统配置','sys_val'=>json_encode($data)]);
        }else{
            SysConfigModel::query()->where(['id'=>$id])->update(['sys_val'=>json_encode($data)]);
        }
        return response()->json(['data'=>[],'msg'=>'操作成功','status'=>true]);
    }
}