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

    // 加载购物车页面
    public function index()
    {
        // 判断用户是否登录
        if(!session('user'))
        {
            return back()->with(['code' => '1', 'info'=>'请先登录']);
        }

        // 通用,查询购物车信息
        if(session('user'))
        {
            $uid = session('user')->id;
            $res = \DB::table('shopcart')->where('uid',$uid)->get()->toArray();
            if($res)
            {
                $shopcart = $res;
            }else{
                $shopcart = [];
            }
        }else
        {
            if(session('shopcart'))
            {
                $shopcart = session('shopcart');
            }else{
                $shopcart = [];
            }
        }
        $support = array('','客房','茶歇','AV设备');
        if($shopcart) {
            foreach ($shopcart as $k => $v) {
                if (is_object($v)) {
                    $shopcart[$k] = (array)$v;
                }
            }

            foreach ($shopcart as $key => $val) {
                $pid = \DB::table('meetplaces')->where('id', $val['mid'])->value('pid');
                $shopcart[$key]['pid'] = $pid;
                $shopcart[$key]['pname'] = \DB::table('places')->where('id', $pid)->value('title');
                $shopcart[$key]['mname'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('title');
                $fids = explode(',', $val['fids']);
                $count = array_count_values($fids);
                $fids = array_unique($fids);
                $arr = [];
                foreach ($fids as $k => $v) {
                    $sid = \DB::table('facilities')->where('id', $v)->value('supportType');
                    if ($sid) {
                        $arr[] = $support[$sid] . ' ✖ ' . $count[$v];
                    }
                }
                $shopcart[$key]['fname'] = $arr;
                $shopcart[$key]['pic'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('pic');
            }
        }
//        var_dump($shopcart);
        return view('home.shopcart.index',['title'=>'购物车', 'shopcart'=>$shopcart]);
    }

    public function delete($ctime)
    {
        if(session('user'))
        {
            $res= \DB::table('shopcart')->where('started_at',$ctime)->delete();
            if($res)
            {
                return back();
            }
        }else
        {
            $arr = session('shopcart');
            $shopcart = [];
            foreach($arr as $k=>$v)
            {
                if($v['started_at'] == $ctime)
                {
                    continue;
                }
                $shopcart[$k] = $v;
            }
            session(['shopcart'=>$shopcart]);
            return back();
        }

    }
}
