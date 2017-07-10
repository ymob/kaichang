<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //加载订单详情页面
    public function index()
    {
    	return view('home.order.order',['title'=>'订单详情']);
    }
}
