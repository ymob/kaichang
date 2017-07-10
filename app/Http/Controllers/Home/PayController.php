<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    //加载订单详情页面
    public function index()
    {
    	return view('home.pay.pay',['title'=>'支付详情']);
    }
}
