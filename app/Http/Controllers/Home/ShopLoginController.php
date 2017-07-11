<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopLoginController extends Controller
{
    // index
    public function index()
    {
    	return view('home.shopercenter.login', ['title' => '商户登录']);
    }

    public function dologin(Request $request)
    {
    	$data = $request->except('_token');

    	//是否记住我
        $remember_token=\Cookie::get('remember_me');
        if($remember_token)
        {
            $request->session()->forget('user');
            $shopkeeper=\DB::table('shopkeepers')->where('remember_token', $remember_token)->first();
            session('shopkeeper',$shopkeeper);
            return redirect('/')->with(['info'=>'登录成功']);
        }

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

        if(!\Hash::check($data['password'], $shopkeeper->password))
        {
            return back()->with(['info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        //将用户的所有数据存入session
        session(['shopkeeper' => $shopkeeper]);
        
        $request->session()->forget('user');

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_token', $shopkeeper->remember_token, 10); //10分钟
        }

        return redirect('/')->with(['info' => '登录成功']);
    }

    // 执行退出
    public function logout(Request $request)
    {
        $request->session()->forget('shopkeeper');
        return redirect('/')->with(['info' => '退出成功']);
    }
}
