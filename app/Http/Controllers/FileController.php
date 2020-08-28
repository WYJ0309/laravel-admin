<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $allow_types = ['png', 'jpeg', 'gif','jpg'];
            $file = $request->file('image');
            if (!in_array($file->extension(), $allow_types)) {
                return ['status' => 0, 'msg' => '图片类型不正确！'];
            }
            if ($file->getSize() > 1024 * 1024 * 5) {
                return ['status' => 0, 'msg' => '图片大小不能超过 3M！'];
            }
            $extension = $file->extension();
            $filename = time().'.'.$extension;
            $save_dir = '/upload/images/'.date('Ym').'/';
            $real_dir = storage_path().'/upload/images/'.date('Ym').'/';
            $this->mkdir($real_dir);
            $file->move($real_dir,$filename);
            $insertArr = [
                'file_name'=>$filename,
                'file_dir'=>$save_dir,
                'file_type'=>1,
                'unique_key'=>uniqid()
            ];
            DB::table('files_store')->insert($insertArr);
            return ['status' => 1, 'msg' => '/storage/'.$insertArr['unique_key'],'code'=>200];
        }
    }

    public function mkdir($dir){
        if (!file_exists($dir)){
            mkdir ($dir,0777,true);
        }
    }

    public function accessFile($unique_key){
        $file = DB::table('files_store')->where(['unique_key'=>$unique_key])->first();
        return response()->file(storage_path().$file->file_dir.$file->file_name);
    }

    public static function removeHtml($string){
        $string = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/", " ", strip_tags($string));
        $string = str_replace("&emsp","",$string);
        return trim($string);
    }
}
