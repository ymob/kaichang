<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopcartController extends Controller
{
    // 添加购物车
    public function add(Request $request)
    {
        $data = $request->all();
        $data['stime'] = time($data['stime']);
        $data['started_at'] = time();
        $data['updated_at'] = time();

        if(isset($data['fids']))
        {
            $data['fids'] = implode(',',$data['fids']);
        }else
        {
            $data['fids'] = '';
        }

        // 判断用户是否登录
        if(session('user'))
        {
            // 用户登录,存shopcart表
            $data['uid'] = session('user')->id;
            $res = \DB::table('shopcart')->insert($data);
            if($res)
            {
                return response()->json('用户已登录,存数据库');
            }

        }else{

            // 用户未登陆,存session
            $arr = [];
            if(session('shopcart'))
            {
                $arr = session('shopcart');
                $arr[] = $data;
                session(['shopcart'=>$arr]);
            }else{
                $arr[] = $data;
                session(['shopcart'=>$arr]);
            }

            return response()->json('用户未登录,存session');
        }


    }
}
