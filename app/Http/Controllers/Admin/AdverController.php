<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdverController extends Controller
{
    //加载广告列表
    public function index(Request $request)
    {
    	//获取每页显示的数据条数
    	$num=$request->input('num',10);

    	//获取搜索关键字
        $keywords=$request->input('keywords','');

        //查询分页搜索数据
        $data=\DB::table('ads')->where('content','like','%'.$keywords.'%')->paginate($num);

        //加载广告列表页
        return view('admin.adver.index',['title'=>'广告列表','request'=>$request->all(),'data'=>$data]);
    }

    //编辑广告
    public function edit($id)
    {
    	//从广告列表中查询数据
    	$data = \DB::table('ads')->where('id',$id)->get();
    	
    	return view('admin.adver.edit',['title'=>'广告列表','data'=>$data]);
    }

    //执行广告修改动作
    public function update(Request $request)
    {
    	//获取修改数据的id号
    	$id = $request->only('id');

        //获取要修改数据中的图片名字
        $pic = \DB::table('ads')->where('id',$id)->value('pic');

    	//获取其它数据
    	$data = $request->except('_token','id');
    	
    	//处理图片
        if($request->hasFile('pic')){
            if($request->file('pic')->isValid()){
                //获取扩展名
                $ext=$request->file('pic')->extension();
                //随机文件名
                $filename=time().mt_rand(10000000,99999999).'.'.$ext;
                //移动
                $request->file('pic')->move('./uploads/adver',$filename);
                //添加data数据
                $data['pic']=$filename;

                if($pic!='default.jpg')
                {
                    //删除之前的图片
                    unlink("./uploads/adver/{$pic}");
                }

            }
        }

      	//将数据插入表中
      	$res = \DB::table('ads')->where('id',$id['id'])->update($data);


      	//告诉用户是否修改成功
      	if($res)
      	{  
      		return redirect('admin/adver/index')->with(['info'=>'修改成功']);
      	}else
      	{
      		return redirect('admin/adver/index')->with(['info'=>'修改失败']);
      	}

    }

    public function delete($id)
    {
    	//从表中删除数据
    	$res = \DB::table('ads')->where('id',$id)->delete();

    	//提示用户是否删除成功
    	if($res)
    	{
    		return redirect('admin/adver/index')->with(['info'=>'删除成功']);
    	}else
    	{
    		return redirect('admin/adver/index')->with(['info'=>'删除失败']);
    	}

    }

    //加载添加广告页面
    public function add()
    {	
    	return view('admin.adver.add',['title'=>'广告添加']);
    }

    //执行添加广告动作
    public function insert(Request $request)
    {
    	//获取添加的具体内容
    	$data = $request->except('_token');
        dd($data);

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
    	

    	//将获取的内容插入表中
    	$res = \DB::table('ads')->insert($data);

    	//提示用户是否添加成功
    	if($res)
    	{
    		return redirect('admin/adver/index')->with(['info'=>'添加成功']);
    	}else
    	{
    		return redirect('admin/adver/index')->with(['info'=>'添加失败']);
    	}
    }
}
