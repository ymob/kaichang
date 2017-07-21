<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //加载评论页面
    public function index()
    {	
    	//查询
    	return view('home.comment.index',['title'=>'评论页面']);
    }
}
