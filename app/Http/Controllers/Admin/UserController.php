<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    // 管理员列表页
    public function index(Request $request)
    {
        $num=$request->input('num',10);

        $keywords=$request->input('keywords','');

        $data=\DB::table('admins')->where('name','like','%'.$keywords.'%')->paginate($num);

        return view('admin.user.index',['title'=>'管理员列表','request'=>$request->all(),'data'=>$data]);
    }

    // 管理员添加页
    public function add()
    {

        return view('admin.user.add',['title'=>'管理员添加']);
    }

    // 管理员添加
    public function insert(Request $request)
    {
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

        $data['password']=encrypt($data['password']);

        if($request->hasFile('pic')){
            if($request->file('pic')->isValid()){
                //获取扩展名
                $ext = $request->file('pic')->extension();
                //随机文件名
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
                //移动
                $request->file('pic')->move('./uploads/adminUser',$filename);
                //添加data数据
                $data['pic'] = $filename;
            }
        }

        do
        {
            $data['remember_token'] = str_random(50);
        }while($admins = \DB::table('admins')->where('remember_token', $data['remember_token'])->first());

        $time = time();

        $data['created_at'] = $time;

        $data['updated_at'] = $time;

        $res=\DB::table('users')->insert($data);

        if($res){
            return redirect('/admin/user/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);  //存到session中
        }
    }

    // ajax 修改管理员名称
    public function ajaxRename(Request $request)
    {
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

    // 管理员信息修改页
    public function edit($id)
    {
        $data=\DB::table('admins')->where('id',$id)->first();
        return view('admin.user.edit',['title'=>'管理员编辑','data'=>$data]);
    }

    // 管理员信息修改
    public function update(Request $request)
    {
        $data=$request->except('_token','id');

        $oldDate = \DB::table('users')->where('id', $request->id)->first();

        $oldPic = $oldDate->pic;

        $valid = [
            'name' => 'required|min:6|max:18',
            'email' => 'email',
        ];

        $validInfo = [
            'name.required' => '用户名不能为空。',
            'name.min' => '用户名最少 6 个字符。',
            'name.max' => '用户名最多 18 个字符。',
            'email.email' => '请输入正确的邮箱，推荐您使用新浪邮箱。',
        ];

        if($oldDate->name != $data['name'])
        {
            $valid['name'] = $valid['name'].'|unique:users';
            $validInfo['name.unique'] = '用户名已存在。';
        }

        if($oldDate->email != $data['email'])
        {
            $valid['email'] = $valid['email'].'|unique:users';
            $validInfo['email.unique'] = '邮箱已存在。';
        }

        $this->validate($request, $valid, $validInfo);

        // 处理图片
        if($request->hasFile('pic')){

            if($request->file('pic')->isValid())
            {
                $ext=$request->file('pic')->extension();
                
                $filename=time().mt_rand(10000000,99999999).'.'.$ext;

                $request->file('pic')->move('./uploads/adminUser',$filename);

                if(file_exists('./uploads/adminUser/'.$oldPic) && $oldPic!='default.jpg')
                {
                    unlink('./uploads/adminUser/'.$oldPic);
                }

                $data['pic']=$filename;
            }
        }

        $data['password'] = encrypt($data['password']);

        $res=\DB::table('admins')->where('id',$request->id)->update($data);

        if($res)
        {
            return redirect('/admin/user/index')->with(['info'=>'更新成功']);
        }else
        {
            return back()->with(['info'=>'更新失败']);
        }
    }

    // 管理员删除
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

    // 加盟商列表
    public function sindex(Request $request)
    {
        $num=$request->input('num',10);

        $keywords=$request->input('keywords','');

        $data=\DB::table('shopkeepers')->where('name','like','%'.$keywords.'%')->paginate($num);

        return view('admin.user.sindex',['title'=>'加盟商列表','request'=>$request->all(),'data'=>$data]);
    }

    // 用户列表
    public function hindex(Request $request)
    {
        $num=$request->input('num',10);

        $keywords=$request->input('keywords','');

        $data=\DB::table('users')->where('name','like','%'.$keywords.'%')->paginate($num);

        return view('admin.user.hindex',['title'=>'用户列表','request'=>$request->all(),'data'=>$data]);
    }

}
