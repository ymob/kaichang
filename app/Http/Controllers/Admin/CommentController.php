<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //评论管理首页
    public function index(Request $request)
    {	
    	//获取每页显示的数据条数
    	$num=$request->input('num',10);

    	//获取搜索关键字
        $keywords=$request->input('keywords','');

        //查询分页搜索数据
        $data=\DB::table('comments')->where('content','like','%'.$keywords.'%')->paginate($num);
        // dd($data);

       	// dd($res[0]);
       	foreach($data as $key=>$value)
       	{	

       		//查询用户表
       		$data[$key]->username =  \DB::table('users')->where('id',$value->uid)->value('name');


       		//查询商品表
       		$data[$key]->goodname = \DB::table('goods')->where('id',$value->mid)->value('title');

       	}

  
        //加载评论显示模板
        return view('admin.comment.index',['title'=>'评论列表','request'=>$request->all(),'data'=>$data]);
    }


    //编辑评论
    public function edit($id)
    {
        //查出要编辑的一条数据
        $data = \DB::table('comments')->where('id',$id)->first();

<<<<<<< HEAD
        //关联查询前台用户表中的用户名
        $data->username = \DB::table('users')->where('id',$data->uid)->value('name');

        //关联查询商品表中的商品名称
        $data->title = \DB::table('goods')->where('id',$data->gid)->value('title');

        //加载编辑页面
        return view('admin.comment.edit',['data'=>$data,'title'=>'评论编辑']);
=======
      //关联查询前台用户表中的用户名
      $data->username = \DB::table('users')->where('id',$data->uid)->value('name');
     
      //关联查询商品表中的商品名称
      $data->title = \DB::table('goods')->where('id',$data->mid)->value('title');
      
      //加载编辑页面
      return view('admin.comment.edit',['data'=>$data,'title'=>'评论编辑']);
>>>>>>> 07caf7a4af0cba52a4121523db043e73dc8356bd

    }

    //执行修改动作
    public function update(Request $request)
    {
      //获取修改后的数据
      $id = $request->only('id');
     
      $data = $request->except('_token','id');
      
      //修改表中数据
      $res = \DB::table('comments')->where('id',$id['id'])->update($data);
      
      //修改提示
      if($res)
      {
        return redirect('admin/comment/index')->with(['info'=>'修改成功']);
      }else
      {
        return redirect('admin/comment/index')->with(['info'=>'修改失败']  );
      }

    }

    //放入回收站
    public function recycle($id)
    {
      //修改评论表中该条数据状态为0 不在列表中显示
      $res = \DB::table('comments')->where('id',$id)->update(['status'=>'0']);
     
      //提示用户加入回收站成功
      if($res){
      return redirect('admin/comment/index')->with(['info'=>'加入回收站成功']);
      }else{
      return back()->with(['info'=>'加入回收站失败']);
      }     
    }

    //加载回收站评论列表
    public function recover(Request $request)
    { 
      //获取每页显示的数据条数
      $num=$request->input('num',10);

      //获取搜索关键字
        $keywords=$request->input('keywords','');

      //查询分页搜索数据
      $data=\DB::table('comments')->where('content','like','%'.$keywords.'%')->paginate($num);
      
      foreach($data as $key=>$value)
      { 

        //查询用户表
        $data[$key]->username =  \DB::table('users')->where('id',$value->uid)->value('name');


        //查询商品表
        $data[$key]->goodname = \DB::table('goods')->where('id',$value->mid)->value('title');

      }

        //加载评论显示模板
        return view('admin.comment.recycle',['title'=>'评论回收站列表','request'=>$request->all(),'data'=>$data]);

      }

    //恢复评论
    public function reback($id)
    {
      //修改评论表中该条数据状态为1 显示在列表中
        $res = \DB::table('comments')->where('id',$id)->update(['status'=>'1']);

      //提示用户恢复成功
      if($res){
      return redirect('admin/comment/recover')->with(['info'=>'恢复成功']);
      }else{
      return back()->with(['info'=>'恢复失败']);
      }

     
     
    }

   

}
