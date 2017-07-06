<?php

namespace App\Http\Middleware;

use Closure;

class adminauthMiddleware
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
        if(session('master')->auth != 0)
        {
            return back()->with(['info'=>'抱歉,您的权限不足']);
        }
        return $next($request);
    }
}
