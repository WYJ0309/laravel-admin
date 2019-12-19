<?php


namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    //登录页面
    public function index(){

        echo 'this is a login form page!!!';
        die;
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    //后台管理员退出跳转到后台登录页面
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }
    protected function attemptLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // 验证用户名登录方式
        $usernameLogin = $this->guard()->attempt(
            ['name' => $username, 'password' => $password], $request->has('remember')
        );
        if ($usernameLogin) {
            return true;
        }
        // 验证手机号登录方式
        $mobileLogin = $this->guard()->attempt(
            ['mobile' => $username, 'password' => $password], $request->has('remember')
        );
        if ($mobileLogin) {
            return true;
        }

        // 验证邮箱登录方式
        $emailLogin = $this->guard()->attempt(
            ['email' => $username, 'password' => $password], $request->has('remember')
        );
        if ($emailLogin) {
            return true;
        }
        return false;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'username';
    }


}