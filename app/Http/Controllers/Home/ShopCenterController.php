<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCenterController extends Controller
{
    // index
    public function index()
    {
    	$shopkeeper = session('shopkeeper');
    	
    	return view('home.shopercenter.index', ['title' => '商户中心']);
    }

    // login
}
