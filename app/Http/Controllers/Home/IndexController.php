<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 加载网站首页
    public function index()
    {
    	return view('home.index.index',['title'=>'首页']);
    }

    // 执行首页搜索
    public function indexSearch(Request $request)
    {
        dd($request->except('_token'));
    }
}
