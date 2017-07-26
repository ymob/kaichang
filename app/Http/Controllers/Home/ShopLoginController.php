<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopLoginController extends Controller
{
    // index
    public function index(Request $request)
    {

        //是否记住我
        $remember_token=\Cookie::get('remember_shopkeeper');
        if($remember_token)
        {
            $request->session()->forget('user');    // 商户登录，用户退出
            $shopkeeper=\DB::table('shopkeepers')->where('remember_token', $remember_token)->first();
        }else
        {
            $shopkeeper = null;
        }

    	return view('home.shopercenter.login', ['title' => '商户登录', 'data' => $shopkeeper]);
    }

    public function dologin(Request $request)
    {
    	$data = $request->except('_token');


        //验证码是否正确
        $code = session('code');
        if($code != $data['code'])
        {
            return back()->with(['info'=>'验证码错误!', 'name' => $data['name']]);
        }

        //查询用户是否已注册·
        $shopkeeper = \DB::table('shopkeepers')->where('name', $data['name'])->first();
        if(!$shopkeeper)
        {
            return back()->with(['info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }
        if(!\Hash::check($data['password'], $shopkeeper->password) && $shopkeeper->password != $data['password'])
        {
            return back()->with(['info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        //将用户的所有数据存入session
        session(['shopkeeper' => $shopkeeper]);
        
        $request->session()->forget('user');    // 商户登录，用户退出

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_shopkeeper', $shopkeeper->remember_token, 15); //10分钟
        }

        return redirect('/shopcenter/index')->with(['info' => '登录成功']);
    }

    // 执行退出
    public function logout(Request $request)
    {
        $request->session()->forget('shopkeeper');
        return redirect('/')->with(['info' => '退出成功']);
    }
}
