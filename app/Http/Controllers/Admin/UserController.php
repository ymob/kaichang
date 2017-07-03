<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index(Request $request)
    {
        //获取get传参
        $num=$request->input('num',10);
        $keywords=$request->input('keywords','');

        //查询数据库
        $data=\DB::table('admins')->where('name','like','%'.$keywords.'%')->paginate($num);


        return view('admin.user.index',['title'=>'用户列表','request'=>$request->all(),'data'=>$data]);

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
        $data['password']=encrypt($data['password']);
//        $data['password']=\Hash::make($data['password']);
        //解密
//        if(\Hash::check('123',$data['password'])){
//            echo '密码正确';
//        }
//        password=decrypt($admin->password);



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
        $data['remember_token']=str_random(50);
        //处理时间
        $time=time();
        $data['created_at']=$time;
        $data['updated_at']=$time;

//        dd($data);

        //执行添加  (查询构造器)
        $res=\DB::table('users')->insert($data);

        if($res){
            return redirect('/admin/user/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);  //存到session中
        }
    }

    public function ajaxRename(Request $request)
    {
//        dd($request->all());
        $res=\DB::table('admins')->where('name',$request->input('name'))->first();

        if($res)
        {
            return response()->json(0);
        }else
        {
            $res=\DB::table('admins')->where('id',$request->input('id'))->update(['name'=>$request->input('name')]);
            if($res)
            {
                return response()->json(1);
            }else{
                return response()->json(2);
            }
        }
    }

    public function edit($id)
    {
        $data=\DB::table('admins')->where('id',$id)->first();
        return view('admin.user.edit',['title'=>'用户编辑','data'=>$data]);
    }

    public function update(Request $request)
    {
        $data=$request->except('_token','id');

        //查询原图片
        $oldPic=\DB::table('admins')->where('id',$request->id)->first()->pic;

        if($request->hasFile('pic')){
            if($request->file('pic')->isValid())
            {
                //获取扩展名
                $ext=$request->file('pic')->extension();
                //随机文件名
                $filename=time().mt_rand(10000000,99999999).'.'.$ext;
                //移动
                $request->file('pic')->move('./uploads/adminUser',$filename);

                //删除原图片
                if(file_exists('./uploads/adminUser/'.$oldPic) && $oldPic!='default.jpg')
                {
                    unlink('./uploads/adminUser/'.$oldPic);
                }

                //添加data数据
                $data['pic']=$filename;
            }
        }

        $res=\DB::table('admins')->where('id',$request->id)->update($data);
        if($res)
        {
            return redirect('/admin/user/index')->with(['info'=>'更新成功']);
        }else
        {
            return back()->with(['info'=>'更新失败']);
        }
    }

    public function delete($id)
    {
        $res=\DB::table('admins')->delete($id);
        if($res)
        {
            return redirect('/admin/user/index')->with(['info'=>'删除成功']);
        }else
        {
            return back()->with(['info'=>'删除失败']);
        }
    }

}
