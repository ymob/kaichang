<?php

namespace App\Http\Middleware;

use Closure;

class HomeUserMiddleware
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
        if(!session('user'))
        {
            return redirect('/')->with(['code' => '1', 'info'=>'未登录!']);
        }
        return $next($request);
    }
}
