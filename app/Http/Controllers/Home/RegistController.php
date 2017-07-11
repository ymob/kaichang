<?php

namespace App\Http\Controllers\Home;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    //执行注册
    public function regist(Request $request)
    {
        //表单验证
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|min:3|max:50',
            'password' => 'required',
            're_password' => 'same:password',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
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
            'phonecode.required' => '输入手机验证码'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with(['code'=>'2'])
                ->withInput();
        }

        //比对手机验证码
        $cookiePhonecode = \Cookie::get('phonecode');
        $inputPhonecode = $request->input('phonecode');
        
        if($cookiePhonecode != $inputPhonecode)
        {
            return back()->with(['code'=>'2','info'=>'手机验证码错误'])->withInput();
        }

        $data=$request->except('_token','re_password','phonecode');

        $data['password'] = \Hash::make($data['password']);

        //生成不重复的 remember_token
        do
        {
            $data['remember_token'] = str_random(50);
        }while($users = \DB::table('users')->where('remember_token', $data['remember_token'])->first());

        $time = time();
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        $res=\DB::table('users')->insert($data);

        if($res){
            return redirect('/')->with(['code' => '1', 'name' => $data['name']]);
        }else{
            return back()->with(['code'=>'2','info'=>'注册失败']);
        }

    }

    //获取手机验证码存入cookie中
    public function storePhoneCode(Request $request)
    {
        $phone = $request->input('phone');
        $code = mt_rand(100000,999999);
        \Cookie::queue('phonecode', $code, 5); //5分钟

        //使用阿里云市场 三网短信: https://market.aliyun.com/products/57126001/cmapi017136.html?spm=5176.730005.0.0.l8VBA9#sku=yuncode1113600000
        //此 appcode 目前可发送注册短信 200条
        $host = "http://ali-sms.showapi.com";
        $path = "/sendSms";
        $method = "GET";
        $appcode = "b9eb42adea7d49f986cca6c59475c061";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = 'content={"code":"'.$code.'","minute":5,"comName":"开场网"}&mobile='.$phone.'&tNum=T150606060601';
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $res = curl_exec($curl);

        return response()->json($res);

    }
}
