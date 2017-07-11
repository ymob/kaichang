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

        if(session('shopkeeper')->status == 0)
        {
            return redirect('/shopcenter/login')->with(['info' => '账号已被禁用,请联系管理员!']);

        }

        $shopkeeper = session('shopkeeper');
        
        //注册未填详情
        if($shopkeeper->status == 2)
        {
            return redirect('/shopcenter/regist/detail/'.$shopkeeper->remember_token);
        }

        //未审核
        if($shopkeeper->status == 3)
        {
            return redirect('/shopcenter/regist/status/'.$shopkeeper->remember_token);
        }

        return $next($request);
    }
}
