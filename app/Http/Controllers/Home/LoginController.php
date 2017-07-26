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


        //验证码是否正确
        $code=session('code');
        if($code != $data['code'])
        {
            return back()->with(['code' => '1', 'info'=>'验证码错误!', 'name' => $data['name']]);
        }

        //查询用户是否已注册·
        $user=\DB::table('users')->where('name', $data['name'])->first();
        if(!$user)
        {
            return back()->with(['code' => '1', 'info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        if(!\Hash::check($data['password'], $user->password) && $data['password'] != $user->password)
        {
            return back()->with(['code' => '1', 'info'=>'用户名或者密码错误', 'name' => $data['name']]);
        }

        //将用户的所有数据存入session
        session(['user' => $user]);

        $request->session()->forget('shopkeeper');

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_user', $user->remember_token, 10); //10分钟
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
        return back()->with(['info'=>'登录成功']);
    }

    // 执行退出
    public function doLogout(Request $request)
    {
    	$request->session()->forget('user');
        return back()->with(['info'=>'退出成功']);
    }
}
