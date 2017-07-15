<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    //加载搜索结果详情页
    public function index()
    {
        return view('home.index.details',['title'=>'详情页']);
    }
    public function indexs()
    {
        return view('home.index.detail',['title'=>'详情页']);
    }
}
