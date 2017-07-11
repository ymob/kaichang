<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopRegistController extends Controller
{
    // index
    public function index()
    {
    	return view('home.shopercenter.regist', ['title' => '商户注册']);
    }

    public function regist(Request $request)
    {
    	//表单验证
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:shopkeepers|min:3|max:50',
            'password' => 'required',
            're_password' => 'same:password',
            'email' => 'required|email|unique:shopkeepers',
            'phone' => 'required|numeric|unique:shopkeepers|digits:11',
            'phonecode' => 'required'
        ],[
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经被注册',
            'name.min' => '用户名最少3个字符',
            'name.max' => '用户名最多个50个字符',
            'password.required' => '密码不能为空',
            're_password.same' => '确认密码不一致',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '该邮箱已注册',
            'phone.required' => '手机号不能为空',
            'phone.numeric' => '手机号格式错误',
            'phone.digits' => '手机号格式错误',
            'phone.unique' => '该手机号已注册',
            'phonecode.required' => '输入手机验证码'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //比对手机验证码
        $cookiePhonecode = \Cookie::get('phonecode');
        $inputPhonecode = $request->input('phonecode');
        
        if($cookiePhonecode != $inputPhonecode)
        {
            return back()->with(['code'=>'2','info'=>'手机验证码错误'])->withInput();
        }

        $data = $request->except('_token','re_password','phonecode');

        $data['password'] = \Hash::make($data['password']);

        //生成不重复的 remember_token
        do
        {
            $data['remember_token'] = str_random(50);
        }while($shopkeeper = \DB::table('shopkeepers')->where('remember_token', $data['remember_token'])->first());

        $time = time();
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        $res=\DB::table('shopkeepers')->insert($data);

        if($res){
            return redirect('/shopcenter/regist/detail/'.$data['remember_token'])->with(['info' => '注册成功，完善企业信息。']);
        }else{
            return back()->with(['code'=>'2','info'=>'注册失败']);
        }
    }

    public function detail($token)
    {
        // dd($token);
        $res = \DB::table('shopkeepers')->where('remember_token', $token)->first();

        if(!$res)
        {
            return redirect('/404');
        }

        return view('home.shopercenter.detail', ['title' => '商户详情', 'token' => $res->remember_token]);
    }


    public function addDetail($token, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'postcode' => 'required',
            'address' => 'required',
            'license' => 'required|image'
        ],[
            'name.required' => '用户名不能为空',
            'phone.required' => '联系电话不能为空',
            'postcode.required' => '邮编不能为空',
            'address.required' => '联系地址不能为空',
            'license.required' => '必须上传营业执照',
            'license.image' => '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $sid = \DB::table('shopkeepers')->where('remember_token', $token)->first()->id;

        if(!$sid)
        {
            return redirect('404');
        }

        $data = $request->except('_token');

        $data['sid'] = $sid;

        if($request->file('license')->isValid())
        {

            $ext=$request->file('license')->extension();
            
            do
            {
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
            }while(file_exists('./uploads/shoper/license/'.$filename));

            $request->file('license')->move('./uploads/shoper/license',$filename);

            $data['license'] = $filename;
        }

        $time = time();
        $data['created_at'] = $time;
        $data['updated_at'] = $time;
        // dd($data);
        $res=\DB::table('shopdetails')->insert($data);

        if($res){
            \DB::table('shopkeepers')->where('id', $sid)->update(['status' => 1]);
            return redirect('/shopcenter/regist/status/')->with(['info' => '提交成功！']);
        }else{
            return back()->withInput()->with(['info' => '提交失败！']);
        }
    }


    public function status($token)
    {
        $res = \DB::table('shopkeepers')->where('remember_token', $token)->first();

        if(!$res)
        {
            return redirect('/404');
        }
        
        return view('home.shopercenter.status', ['title' => '等待审核']);
    }
}
