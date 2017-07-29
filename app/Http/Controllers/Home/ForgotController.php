<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotController extends Controller
{
    // 
	public function index(Request $request)
	{
		$t = $request->input('t', 1);
	    return view('home.forgot.forgot', ['title' => '忘记密码', 't' => $t]);
	}

	public function email(Request $request)
	{
		$data = $request->except('_token');

		if($data['t'] == 1)
		{
			$table = 'users';
		}else if($data['t'] == 2)
		{
			$table = 'shopkeepers';
		}else
		{
			return redirect('/404');
		}

		$res = \DB::table($table)->where('email', $data['email'])->first();

		if(!$res)
		{
			$request->flash();
    		return back()->with(['info' => '您的邮箱地址不存在']);
		}

		// 发送邮件
		\Mail::send('home.mail.forgot', ['data' => $res, 't' => $data['t']], function($message) use($data) {
			$message->to($data['email']);
			$message->subject('找回密码');
		});

		$email = ltrim(strstr($data['email'], '@'), '@');

		return view('home.forgot.success', ['title' => '验证邮件发送成功', 'email' => $email]);
	}

	public function resetpass($token, Request $request)
	{

        $t = $request->input('t', 1);
		if($t == 1)
		{
			$table = 'users';
		}else if($t == 2)
		{
			$table = 'shopkeepers';
		}else
		{
			return redirect('/404');
		}

		$res = \DB::table($table)->where('remember_token', $token)->first();

		if($res)
		{
			return view('home.forgot.resetpass', ['title' => '忘记密码', 't' => $t, 'data' => $res]);
		}else
		{
			return redirect('/404');
		}
	}

	public function update($token, Request $request)
	{
		$t = $request->input('t', 1);

		if($t == 1)
		{
			$table = 'users';
		}else if($t == 2)
		{
			$table = 'shopkeepers';
		}else
		{
			return redirect('/404');
		}

		$data = $request->except('_token');

		$valid = [
            'password' => 'required|min:6|max:18',
            'surepass' => 'same:password'
        ];

        $validInfo = [
            'password.required' => '输入新密码。',
            'password.min' => '密码最少6位。',
            'password.max' => '密码最多18位。',
            'surepass.same' => '两次密码不一致。'
        ];

        // 表单验证
        $this->validate($request, $valid, $validInfo);

        $password = \Hash::make($data['password']);

        $res = \DB::table($table)->where('remember_token', $token)->update(['password' => $password]);

        if($res)
        {
        	if($t == 1)
        	{
        		return redirect('/')->with(['code' => 1, 'info' => '密码修改成功，请登录！']);
        	}else
        	{
        		return redirect('/shopcenter/login')->with(['info' => '密码修改成功，请登录！']);
        	}
        }else
        {
        	return back()->with(['info' => '修改失败']);
        }
	}
}