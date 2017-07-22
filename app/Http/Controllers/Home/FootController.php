<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FootController extends Controller
{
    //加载底部链接页面
    public function index()
    {
    	return view('home.foot.index',['title'=>'链接页面']);
    }
}
