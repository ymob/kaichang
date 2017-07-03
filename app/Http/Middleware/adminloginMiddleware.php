<?php

namespace App\Http\Middleware;

use Closure;

class adminloginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('master'))
        {
            return redirect('/admin/login')->with(['info'=>'您尚未登录,请先登录']);
        }
        return $next($request);
    }
}
