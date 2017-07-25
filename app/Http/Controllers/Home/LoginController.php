<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // 执行登录
    public function doLogin(Request $request)
    {
        $data=$request->except('_token');

        //是否记住我
        $remember_token=\Cookie::get('remember_me');
        if($remember_token)
        {
            $admin=\DB::table('users')->where('remember_token', $remember_token)->first();
            session('master',$admin);
            $request->session()->forget('shopkeeper');
            return redirect('/')->with(['info'=>'登录成功']);
        }

        //验证码是否正确
        $code=session('code');
        if($code != $data['code'])
        {
            return back()->with(['code' => '1', 'info'=>'验证码错误!', 'name' => $data['name']]);
        }

        //查询用户是否已注册·
        $admin=\DB::table('users')->where('name', $data['name'])->first();
        if(!$admin)
        {
            return back()->with(['code' => '1', 'info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        if(!\Hash::check($data['password'], $admin->password))
        {
            return back()->with(['code' => '1', 'info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        //将用户的所有数据存入session
        session(['user' => $admin]);
        $request->session()->forget('shopkeeper');

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_token', $admin->remember_token, 10); //10分钟
        }

        // 将session中购物车数据存储到数据库shopcart表
        if(session('shopcart'))
        {
            $arr = session('shopcart');
            foreach($arr as $k=>$v)
            {
                $v['uid'] = session('user')->id;
                \DB::table('shopcart')->insert($v);
            }

            // 清购物车session
            Session::forget('shopcart');
        }
//        return redirect('/')->with(['info'=>'登录成功']);
        return back()->with(['info'=>'登录成功']);
    }

    // 执行退出
    public function doLogout(Request $request)
    {
    	$request->session()->forget('user');
        return back()->with(['info'=>'退出成功']);
    }
}
