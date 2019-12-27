<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Auth::guard('admin')->user()，不加'admin '默认取'web'中的
        //print_r(Auth::guard($guard)->user());
        //未登录的直接进入登录页面
        //Auth::guard($guard)->guest();判断用户是否来宾，可用于中间件，判断用户是否登录，返回false，则已经登录，反之，跳转会登录页面
        //var_dump(Auth::guard('admin')->user());die;//获取已经登录的用户信息，注意在__construct()中无法获取，可以在中间件里面获取
        //dd(Auth::guard('admin'));die;


        if(!Auth::guard('admin')->check()){
//            if(!in_array(Request::route()->getActionName(),['App\Admin\Controllers\LoginController@index','App\Admin\Controllers\LoginController@loginOpt','App\Admin\Controllers\LoginController@captcha'])){
//                return redirect()->guest('admin/login/index');
//            }
            return redirect()->guest('admin/login/index');
        }
        return $next($request);
    }
}
