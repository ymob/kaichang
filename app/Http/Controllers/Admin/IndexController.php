<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //index
    public function index(){
        return view('admin.index.index',['title'=>'后台主页']);
    }
}
