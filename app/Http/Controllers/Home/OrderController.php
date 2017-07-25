<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //加载订单详情页面
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

    	return view('home.order.order',['title'=>'订单详情', 'shopcart'=>$shopcart]);
    }

    // 提交订单
    public function submitOrder()
    {
        $uid = session('user')->id;

        // 将订单数据从购物车取出存数据库
        $shopcartData = \DB::table('shopcart')->where('uid',$uid)->get();
        do
        {
            $number = mt_rand(100000000,999999999);
        }while($numbers = \DB::table('orders')->where('number',$number)->first());

        foreach($shopcartData as $k=>$v)
        {

            $shopcartData[$k]->number = $number;
            $shopcartData[$k]->status = 1;
            $shopcartData[$k]->created_at = $shopcartData[$k]->started_at;
            $shopcartData[$k]->pid = \DB::table('meetplaces')->where('id',$shopcartData[$k]->mid)->value('pid');
            unset($shopcartData[$k]->started_at);
        }

        foreach($shopcartData as $key => $val)
        {
            if (is_object($val)) {
                $shopcartData[$key] = (array)$val;
            }
        }
        $shopcartData2 = [];
        foreach($shopcartData as $key2=>$val2)
        {
            $shopcartData2[$key2] = $val2;
        }

//        dd($shopcartData2);
        $res = \DB::table('orders')->insert($shopcartData2);

        // 清数据库中购物车记录
        \DB::table('shopcart')->where('uid',$uid)->delete();

        return view('home/pay/pay',['title'=>'支付页']);
    }
}
