<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //加载搜索结果列表页
    public function index()
    {
        return view('home.index.list',['title'=>'列表页']);
    }
}
