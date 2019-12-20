<?php


namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    //登录页面
    public function index(){

        echo 'this is a login form page!!!';
        die;
    }

    //登陆操作
    public function loginOpt(Request $request){
        print_r(Request::all());
    }

    //后台管理员退出跳转到后台登录页面
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }

}