<?php

namespace App\Http\Middleware;

use Closure;

class HomeShoperMiddleware
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
        if(!session('shopkeeper'))
        {
            return redirect('/shopcenter/login')->with(['info' => '未登录!']);
        }

        $shopkeeper = session('shopkeeper');
        

        if($shopkeeper->status == 2)
        {
            return redirect('/shopcenter/regist/detail/'.$shopkeeper->remember_token);
        }

        if($shopkeeper->status == 3)
        {
            return redirect('/shopcenter/regist/status/'.$shopkeeper->remember_token);
        }

        return $next($request);
    }
}
