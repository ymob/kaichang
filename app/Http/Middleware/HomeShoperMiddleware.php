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
        
        $res = \DB::table('shopdetails')->where('sid', $shopkeeper->id)->first();

        if(!$res)
        {
            return redirect('/shopcenter/regist/detail/'.$shopkeeper->remember_token);
        }

        if($res->status != 1)
        {
            return redirect('/shopcenter/regist/status/'.$shopkeeper->remember_token);
        }

        return $next($request);
    }
}
