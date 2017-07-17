<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{
    // index
    //用户个人中心首页
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

		return view('home.usercenter.index', ['title' => '用户中心首页', 'code' => $code, 'data' => $data]);

	}


	// detail
    //加载用户修改信息页面
	public function details()
	{
//		return view('home.usercenter.detail', ['title' => '我的信息', 'user' => session('user')]);
		return view('home.usercenter.details', ['user' => session('user'),'title'=>'用户个人中心']);

	}


	// updetail
    //执行个人用户信息修改
	public function updetails(Request $request)
	{
	    //获取修改后的数据
		$data = $request->except('_token');

		//从缓存中获取用户id
		$id = session('user')->id;

		//查询用户原始数据
		$oldDate = \DB::table('users')->where('id', $id)->first();

		//表单验证
        $valid = [
            'name'=>'required|',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11'
        ];

        //错误信息提示
        $validInfo = [
            'name.required'=>'用户名不能为空',
            'email.required' => '请填写邮箱。',
            'email.email' => '邮箱格式不正确。',
            'phone.required' => '请填写手机号',
            'phone.numeric' => '手机号格式不正确。',
            'phone.digits' => '手机号格式不正确。'
        ];

        //判断邮箱是否已经存在
        if($oldDate->email != $data['email'])
        {
            $valid['email'] = $valid['email'].'|unique:users';
            $validInfo['email.unique'] = '邮箱已存在。';
        }

        //判断电话是否已经存在
        if($oldDate->phone != $data['phone'])
        {
        	$valid['phone'] = $valid['phone'].'|unique:users';
            $validInfo['phone.unique'] = '手机号已存在。';
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
    //修改密码
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

// dd(session('user')->password);
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
    //个人用户订单
	public function order( Request $request,$status)
	{
        //获取每页显示的数据条数
        $num = 10;

        if(!$status || $status==0)
        {
            $data=\DB::table('orders')->paginate($num);
        }else
        {
            $data=\DB::table('orders')->where('status',$status)->paginate($num);
        }


	    //遍历
        foreach($data as $key=>$val){

            //查询商户表
            $name = \DB::table('shopkeepers')->where('id',$val->sids)->value('name');

            $data[$key]->keepername = $name;

        }


		return view('home.usercenter.order',['title'=>'我的订单','request'=>$request->all(),'data'=>$data,'status'=>$status]);
	}


    //个人中心购物车
    public function shopcart()
    {   

        //获取每页显示的数据条数
        $num = 10;

            //查询表中数据
            $data = \DB::table('shopcart')
            ->join('users', 'users.id', '=', 'shopcart.uid')
            ->join('goods', 'goods.id', '=', 'shopcart.gid')
            ->select('shopcart.*', 'users.name', 'goods.title')
            ->get();
            // dd($data);

       

        return view('home.usercenter.shopcart',['title'=>'购物车']);
    }

}
