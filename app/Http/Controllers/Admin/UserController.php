<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return '用户列表';
    }

    public function add(){
        return view('admin.user.add',['title'=>'用户添加']);
    }

    public function insert(Request $request){

        //表单验证
//        $this->validate($request, [
//            'name' => 'required|unique:users|min:3|max:20',
//            'password' => 'required',
//            'email' => 'email'
//        ],[
//            'name.required' => '用户名不能为空'
//            'name.unique' => '用户名已经存在'
//            'name.min' => '用户名最少3个字符',
//            'name.max' => '用户名最多个20个字符',
//            'email.email' => '请输入正确的邮箱格式'
//        ]);
         $this->validate($request, [
             'name' => 'required|min:3|max:20',
             'password' => 'required',
             're_password' => 'same:password',
             'pic' => 'required|image'
         ],[
            'name.required' => '用户名不能为空',
            'name.min' => '用户名最少3个字符',
            'name.max' => '用户名最多个20个字符',
            'password.required' => '密码不能为空',
            're_password.same' => '确认密码不一致',
             'pic.image' => '您上传的不是一张图片'
        ]);

        $data=$request->except('_token','re_password');

        //密码加密
//        $data['password']=encrypt($data['password']);
        $data['password']=\Hash::make($data['password']);
        //解密
//        if(\Hash::check('123',$data['password'])){
//            echo '密码正确';
//        }


        //处理图片
        if($request->hasFile('pic')){
            if($request->file('pic')->isValid()){
                //获取扩展名
                $ext=$request->file('pic')->extension();
                //随机文件名
                $filename=time().mt_rand(10000000,99999999).'.'.$ext;
                //移动
                $request->file('pic')->move('./uploads/adminUser',$filename);
                //添加data数据
                $data['pic']=$filename;
            }
        }

        //处理token
//        $data['remember_token']=str_random(50);
        //处理时间
//        $data['created_at']=$time;
//        $data['updated_at']=$time;

//        dd($data);

        //执行添加  (查询构造器)
        $res=\DB::table('users')->insert($data);

        if($res){
            return redirect('/admin/user/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);  //存到session中
        }
    }
}
