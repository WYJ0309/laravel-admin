<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(!Auth::guard('admin')->check()){
            return redirect()->guest('login');
        }
        return $next($request);
    }
}
