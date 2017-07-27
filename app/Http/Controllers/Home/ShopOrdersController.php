<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopOrdersController extends Controller
{
    // 加载商户订单页
    public function orderList()
    {

        $shopkeeperId = session('shopkeeper')->id;
        $places = \DB::table('places')->where('sid',$shopkeeperId)->get();
        if($places)
        {
            $pids = [];
            foreach ($places as $k=>$v)
            {
                $pids[] = $v->id;
            }
            $ordersObj = [];
            foreach($pids as $k=>$v)
            {
                $ordersObj[] = \DB::table('orders')->where('pid',$v)->get();
            }
            $orders = [];
            foreach($ordersObj as $k1=>$v1)
            {
                foreach($v1 as $k2=>$v2)
                {
                    $orders[] = $v2;
                }
            }
        }

        foreach($orders as $key => $val)
        {
            if (is_object($val)) {
                $orders[$key] = (array)$val;
            }
        }

        $support = array('','客房','茶歇','AV设备');
        $numberArr = [];
        foreach ($orders as $key => $val) {
            if(!in_array($val['number'],$numberArr))
            {
                array_push($numberArr,$val['number']);
            }else
            {
                $data2[$key]['number'] = '';
            }
            $orders[$key]['pname'] = \DB::table('places')->where('id', $val['pid'])->value('title');
            $orders[$key]['mname'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('title');
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
            $orders[$key]['fname'] = $arr;
            $orders[$key]['pic'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('pic');
        }

        return view('home.shopercenter.orders',['title'=>'我的订单', 'data'=>$orders]);

    }

    public function takeOrder($oid)
    {
        $res = \DB::table('orders')->where('id',$oid)->update(['status'=>'2']);
        if($res)
        {
            return back();
        }else{
            return back();
        }
    }
}
