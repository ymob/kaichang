<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //index
    public function index(){
    	$arr = [];
    	$arr['users'] = \DB::table('users')->count();
    	$arr['shopkeepers'] = \DB::table('shopkeepers')->count();
    	$arr['places'] = \DB::table('places')->count();
    	$arr['sales'] = \DB::table('orders')->where('status', 4)->count();
    	// dd($shopkeepers);
        return view('admin.index.index',['title'=>'Ê×Ò³ÁĞ±í', 'data' => $arr]);
    }
}
