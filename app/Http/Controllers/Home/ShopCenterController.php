<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCenterController extends Controller
{
    // index
    public function index()
    {
        $data = \DB::table('orders')->where('sids', 'like', '%'.session('shopkeeper')->id.'%')->get();

        // dd($data);
        foreach ($data as $key => $val) {
            $arr = explode(',', $val->sids);
            if(!in_array(51, $arr))
            {
                unset($data[$key]);
            }else
            {
                $res = explode(',', $val->gids);
            }
        }

    	return view('home.shopercenter.index', ['title' => '商户中心首页']);
    }

    // detail
    public function detail()
    {
        $shopdetail = \DB::table('shopdetails')->where('sid', session('shopkeeper')->id)->first();

    	return view('home.shopercenter.c_detail', ['title' => '商户信息','shopdetail' => $shopdetail, 'shoper' => session('shopkeeper')]);
    }

    // updetail
	public function updetail(Request $request)
	{
		$data = $request->except('_token');

		$id = session('shopkeeper')->id;

        $valid = [
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
        ];

        $validInfo = [
            'email.required' => '请填写邮箱。',
            'email.email' => '邮箱格式不正确。',
            'phone.required' => '请填写手机号',
            'phone.numeric' => '手机号个格式不正确。',
            'phone.digits' => '手机号个格式不正确。'
        ];

		$oldDate = \DB::table('shopkeepers')->where('id', $id)->first();

        if($oldDate->email != $data['email'])
        {
            $valid['email'] = $valid['email'].'|unique:shopkeepers';
            $validInfo['name.unique'] = '用户名已存在。';
        }

        if($oldDate->phone != $data['phone'])
        {
        	$valid['phone'] = $valid['phone'].'|unique:shopkeepers';
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
	            }while(file_exists('./uploads/shoper/pic/'.$filename));

                $request->file('pic')->move('./uploads/shoper/pic', $filename);

                if(file_exists('./uploads/shoper/pic/'.$oldPic) && $oldPic!='default.jpg')
                {
                    unlink('./uploads/shoper/pic/'.$oldPic);
                }

                $data['pic'] = $filename;
            }
        }else
        {
        	$this->validate($request, $valid, $validInfo);
        }

        $res=\DB::table('shopkeepers')->where('id', $id)->update($data);

        if($res)
        {
        	$shopkeeper = \DB::table('shopkeepers')->where('id', $id)->first();
        	session(['shopkeeper' => $shopkeeper]);
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

		if(!\Hash::check($data['oldpass'], session('shopkeeper')->password))
		{
			return back()->with(['info'=>'原密码不正确']);
		}
		
		$password = \Hash::make($data['password']);

		$res = \DB::table('shopkeepers')->where('id', session('shopkeeper')->id)->update(['password' => $password]);

		if($res)
		{
			session('shopkeeper')->password = $password;
			return back()->with(['info'=>'修改成功']);
		}else{
			return back()->with(['info'=>'更新失败']);
		}
	}

}
