<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单列表页
    public function index(Request $request)
    {   

    	//获取每页显示的数据条数
        $num=$request->input('num',10);

        //获取搜索关键字
        $keywords=$request->input('keywords','');

        //查询分页搜索数据
        $data=\DB::table('orders')->where('number','like','%'.$keywords.'%')->paginate($num);
        // dd($data);

        // dd($res[0]);
        foreach($data as $key=>$value)
        {   

            //查询用户表
            $data[$key]->keepername =  \DB::table('shopkeepers')->where('id',$value->sid)->value('name');


            //查询商品表
            $data[$key]->goodsname = \DB::table('goods')->where('id',$value->gid)->value('title');

        }

  
        //加载评论显示模板
        return view('admin.comment.index',['title'=>'评论列表','request'=>$request->all(),'data'=>$data]);
    }
}
