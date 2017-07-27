<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionCenterController extends Controller
{
    //
    public function update(Request $request)
    {
    	$pid = $request->pid;
    	$uid = session('user')->id;
    	$data = \DB::table('collection')->where([['pid', $pid], ['uid', $uid]])->first();
        $time = time();
    	if($data)
    	{
    		if($data->status == 1)
    		{
    			$status = 0;
    		}else
    		{
    			$status = 1;
    		}
    		$res = \DB::table('collection')->where('id', $data->id)->update(['status' => $status, 'updated' => $time]);
    		if($res)
    		{
    			return response()->json(['code' => 1, 'status' => $status]);
    		}else
    		{
    			return response()->json(['code' => 0]);
    		}
    	}else
    	{
    		$res = \DB::table('collection')->insert(['uid' => $uid, 'pid' => $pid, 'status' => 1, 'updated' => $time]);
    		if($res)
    		{
    			return response()->json(['code' => 1, 'status' => 1]);
    		}else
    		{
    			return response()->json(['code' => 0]);
    		}
    	}
    }
}
