<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdverController extends Controller
{
    //
    //查询场地表中所有信息
    public function index()
    {
    	 $adver = \DB::table('places')->where('isads',1)->get();
    	  // dd($adver);
    	 return view('home.index.list',['title'=>'广告','adver'=>$adver]);
    }
}
