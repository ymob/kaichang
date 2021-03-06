<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //加载登录页面
    public function index()
    {
        //是否记住我
        $remember_token=\Cookie::get('remember_master');
        if($remember_token)
        {
            $admin=\DB::table('admins')->where('remember_token',$remember_token)->first();
        }else
        {
            $admin = null;
        }

        return view('admin.login.login',['title'=>'后台登录', 'master' => $admin]);
    }

    //执行登录
    public function doLogin(Request $request)
    {
        $data=$request->except('_token');

        //验证码是否正确
        $code=session('code');
        if($code != $data['code'])
        {
            return back()->with(['info'=>'验证码错误!'])->withInput();
        }

        //查询管理员是否已注册
        $admin=\DB::table('admins')->where('name',$data['name'])->first();
        if(!$admin)
        {
            return back()->with(['info'=>'用户名或者密码错误'])->withInput();
        }
        //对密码解密
        
        if(!\Hash::check($data['password'], $admin->password) && $data['password'] != $admin->password)
        {
            return back()->with(['info'=>'用户名或者密码错误'])->withInput();
        }
        //将管理员用户的所有数据存入session
        session(['master'=>$admin]);

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_master', $admin->remember_token, 10); //10分钟
        }

        //跳转后台主页
        return redirect('/admin/index')->with(['info'=>'登录成功']);

    }

    //退出登录
    public function logout(Request $request)
    {

        $request->session()->forget('master');

        return redirect('/admin/login')->with(['info'=>'退出成功']);
    }
}
