<?php


namespace App\Admin\Controllers;



use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
class LoginController extends AdminController
{

    use AuthenticatesUsers;
    //登录页面
    public function index(){



        return view('login');
    }
    public function captcha(){

        $phraseBuilder = new PhraseBuilder(4);
        $builder = new CaptchaBuilder(null,$phraseBuilder);//生成验证码图片的Builder对象，配置相应属性
        $builder->build($width = 120, $height = 36, $font = null);//可以设置图片宽高及字体
        $phrase = $builder->getPhrase();//获取验证码的内容
        Cache::put('captcha',$phrase,15);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    public function loginOpt(Request $request)
    {
        $data = Request::all();
//        username=admin123&password=123456
//        print_r($data);
//        $data['password'] = Hash::make($data['password']);
//        $res = AdminUser::create($data);
//        var_dump($res);
        if (Cache::get('captcha') != $data['captcha']){
            return response()->json(array('status' => 200, 'msg' => '验证码错误', 'data' => []));
        }
        Cache::forget('captcha');
        $loginArr = ['username' => $data['login_name'], 'password' => $data['login_pass']];

        if (Auth::guard('admin')->attempt($loginArr,true)) {
            //认证通过
            $rt = array('status' => 200, 'msg' => '登陆成功!', 'data' => []);
        } else {
            $rt = array('status' => 400, 'msg' => '登陆失败', 'data' => []);
        }
        return response()->json($rt);
    }

    public function loginOut(){
        Auth::guard('admin')->logout();
    }

}