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
        $jsonObj = SysConfigModel::query()->where(['type'=>1])->first();
        $responseArr = json_decode($jsonObj['sys_val'],true);
        return view('admin.config.index',$responseArr);
    }
    //配置保存
    public function saveConfig(){
        $data = request()->all();
        $id = SysConfigModel::query()->where(['type'=>1])->value('id');
        if(empty($id)){
            SysConfigModel::create(['type'=>1,'type_name'=>'系统配置','sys_val'=>json_encode($data)]);
        }else{
            SysConfigModel::query()->where(['id'=>$id])->update(['sys_val'=>json_encode($data,JSON_UNESCAPED_UNICODE)]);
        }
        return response()->json(['data'=>[],'msg'=>'操作成功','status'=>true]);
    }
}