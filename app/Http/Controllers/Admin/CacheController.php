<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CacheController extends Controller
{
    //cache
    public function cache()
    {	
    	$minutes = 10;
    	\Cache::put('key', 'value', $minutes);
    }
}
