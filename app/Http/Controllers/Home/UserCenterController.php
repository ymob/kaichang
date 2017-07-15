<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{
    // index
	public function index(Request $request)
	{
		$code = ($request->status)?$request->status:1;

		$data = \DB::table('orders')->where([
				['uid', session('user')->id],
				['status', $code]
			])->get();

		foreach ($data as $key => $val) {
			$arr = explode(',', $val->sids);
			$res = \DB::table('shopdetails')->whereIn('sid', $arr)->get();
			$val->snames = $res;
		}

		return view('home.usercenter.index', ['title'=>'用户中心首页','code' => $code, 'data' => $data]);
	}


	// detail
	public function detail()
	{
		return view('home.usercenter.detail', ['title'=>'我的信息','user' => session('user')]);
	}


	// updetail
	public function updetail(Request $request)
	{
		$data = $request->except('_token');

		$id = session('user')->id;

		$oldDate = \DB::table('users')->where('id', $id)->first();

        $valid = [
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11'
        ];

        $validInfo = [
            'email.required' => '请填写邮箱。',
            'email.email' => '邮箱格式不正确。',
            'phone.required' => '请填写手机号',
            'phone.numeric' => '手机号个格式不正确。',
            'phone.digits' => '手机号个格式不正确。'
        ];

        if($oldDate->email != $data['email'])
        {
            $valid['email'] = $valid['email'].'|unique:users';
            $validInfo['name.unique'] = '用户名已存在。';
        }

        if($oldDate->phone != $data['phone'])
        {
        	$valid['phone'] = $valid['phone'].'|unique:users';
            $validInfo['phone.unique'] = '手机号已存在已存在。';
        }

        // 处理图片
        if($request->hasFile('pic')){

        	$valid['pic'] = 'image';
            $validInfo['pic.image'] = '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。';

            $this->validate($request, $valid, $validInfo);

            if($request->file('pic')->isValid())
            {

                $oldPic = $oldDate->pic;

                $ext=$request->file('pic')->extension();
                
                do
	            {
	                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
	            }while(file_exists('./uploads/user/'.$filename));

                $request->file('pic')->move('./uploads/user',$filename);

                if(file_exists('./uploads/user/'.$oldPic) && $oldPic!='default.jpg')
                {
                    unlink('./uploads/user/'.$oldPic);
                }

                $data['pic']=$filename;
            }
        }else
        {
        	$this->validate($request, $valid, $validInfo);
        }

        $res=\DB::table('users')->where('id', $id)->update($data);

        if($res)
        {
        	$user = \DB::table('users')->where('id', $id)->first();
        	session(['user' => $user]);
            return back()->with(['info'=>'更新成功']);
        }else
        {
            return back()->with(['info'=>'更新失败']);
        }	
	}


	// uppassword
	public function uppassword(Request $request)
	{
		$data = $request->except('_token');
		$valid = [
            'oldpass' => 'required',
            'password' => 'required|min:6|max:18',
            'surepass' => 'same:password'
        ];

        $validInfo = [
            'oldpass.required' => '输入原密码。',
            'password.required' => '输入新密码。',
            'password.min' => '密码最少6位。',
            'password.max' => '密码最多18位。',
            'surepass.same' => '两次密码不一致。'
        ];

        $this->validate($request, $valid, $validInfo);

		if(!\Hash::check($data['oldpass'], session('user')->password))
		{
			return back()->with(['info'=>'原密码不正确']);
		}

		$password = \Hash::make($data['password']);

		$res = \DB::table('users')->where('id', session('user')->id)->update(['password' => $password]);

		if($res)
		{
			session('user')->password = $password;
			return back()->with(['info'=>'修改成功']);
		}else{
			return back()->with(['info'=>'更新失败']);
		}
	}

	// orders
	public function orders(Request $request)
	{
		$num = $request->input('num',10);
		$status = $request->input('status', false);
		
		if($status)
		{
			$data = \DB::table('orders')->where('uid', session('user')->id)->where('status', $status)->orderBy('created_at', 'desc')->paginate($num);
		}else
		{
			$data = \DB::table('orders')->where('uid', session('user')->id)->orderBy('created_at', 'desc')->paginate($num);
		}
		// dd($data);
		foreach ($data as $key => $val) {
			$arr = explode(',', $val->sids);
			$res = \DB::table('shopdetails')->whereIn('sid', $arr)->get();
			$val->snames = $res;
		}
		return view('home.usercenter.orders', ['title'=>'我的订单', 'data' => $data, 'request' => $request->all()]);
	}
}
