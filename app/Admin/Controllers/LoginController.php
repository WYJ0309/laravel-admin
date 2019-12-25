<?php


namespace App\Admin\Controllers;


use App\Models\AdminUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class LoginController extends AdminController
{

    use AuthenticatesUsers;
    //登录页面
    public function index(){

        dd(Auth::guard('admin')->user());
    }

    public function loginOpt(Request $request)
    {
        $data = Request::all();
//        username=admin123&password=123456
//        print_r($data);
//        $data['password'] = Hash::make($data['password']);
//        $res = AdminUser::create($data);
//        var_dump($res);
        if ($this->authAdmin->attempt(['username' => $data['username'], 'password' => $data['password']],true)) {
            //认证通过
            $rt = array('status' => 200, 'msg' => '登陆成功', 'data' => array('isLogin' => true));
        } else {
            $rt = array('status' => 400, 'msg' => '登陆失败', 'data' => array('isLogin' => false));
        }

        return response()->json($rt);
    }

}