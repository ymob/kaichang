<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    ////加载添加上传二维码的页面
    public function index()
    {	
    	$data = \DB::table('code')->get();

    	return view('admin.code.index',['title'=>'上传二维码页面','data'=>$data]);
    }

     //执行二维码修改动作
    public function update(Request $request)
    {
    	 //获取修改数据的id号
    	 // $pic = $request->only('id');
    	 // dd($pic);

        //获取要修改数据中的图片名字
         $pic = \DB::table('code')->where('id',1)->value('pic');
         // dd($pic);

    	// //获取其它数据
    	// $data = $request->except('_token','id');
    	
    	//处理图片
        if($request->hasFile('pic')){
            if($request->file('pic')->isValid()){
                //获取扩展名
                $ext=$request->file('pic')->extension();
                // dd($ext);
                //随机文件名
                $filename=time().mt_rand(10000000,99999999).'.'.$ext;
                // dd($filename);
                //移动
                $request->file('pic')->move('./uploads/code',$filename);
                //添加data数据
                $data['pic']=$filename;

                // if($pic!='default.jpg')
                // {
                //     //删除之前的图片
                //     unlink("/uploads/code/{$pic}");
                // }

            }
        }

      	//将数据插入表中
      	 $res = \DB::table('code')->where('id',1)->update($data);
      	 // dd($res);

      	//告诉用户是否修改成功
      	if($res)
      	{  
      		return redirect('admin/code')->with(['info'=>'修改成功']);
      	}else
      	{
      		return redirect('admin/code')->with(['info'=>'修改失败']);
      	}

    }
}
