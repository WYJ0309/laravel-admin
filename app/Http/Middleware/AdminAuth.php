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
    public function handle($request, Closure $next, $guard = 'admin')
    {
        dd(Auth::user());
        var_dump(Auth::guard($guard)->check());
        if (Auth::guard($guard)->guest()) {
            redirect()->to('/admin/login/index');
        }
        return $next($request);
    }
}
