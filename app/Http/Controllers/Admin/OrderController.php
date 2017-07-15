<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单列表页
    public function index(Request $request,$status)
    {   

    	//获取每页显示的数据条数
        $num = $request->input('num',10);

        if(!$status || $status==0)
        {   
            $data=\DB::table('orders')->paginate($num);
        }else
        {
            $data=\DB::table('orders')->where('status',$status)->paginate($num);
        }

        // dd($res[0]);
        foreach($data as $key=>$value)
        {   

            //查询商品表
            $data[$key]->goodsname = \DB::table('goods')->where('id',$value->gids)->value('title');

        }
        // dd($data);
  
        //加载评论显示模板
        return view('admin.order.index',['title'=>'订单列表','request'=>$request->all(),'data'=>$data,'status'=>$status]);
    }
}
