<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单列表页
    public function index()
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
}
