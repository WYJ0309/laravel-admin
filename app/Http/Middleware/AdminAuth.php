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
        //dd(Auth::guard('admin'));die;
        if(!Auth::guard('admin')->check()){
            if(!in_array(Request::route()->getActionName(),['App\Admin\Controllers\LoginController@index','App\Admin\Controllers\LoginController@loginOpt','App\Admin\Controllers\LoginController@captcha'])){
                return redirect()->guest('admin/login/index');
            }
        }
        return $next($request);
    }
}
