<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单列表页
    // 个人用户订单
    public function index(Request $request, $status)
    {
        //获取每页显示的数据条数
        $num = 10;

        if(!$status || $status==0)
        {
            $data=\DB::table('orders')->paginate($num);
            // dd($data);
        }else
        {
            $data=\DB::table('orders')->where('status',$status)->paginate($num);
            // dd($data);
        }

        foreach($data as $key => $val)
        {   
            // dd($val);
            if (is_object($val)) {
                $data[$key] = (array)$val;
                // dd($data[$key]);
            }
        }
        $data2 = [];
        foreach($data as $key2=>$val2)
        {
            $data2[$key2] = $val2;
            $data=\DB::table('orders')->where('status', $status)->paginate($num);
        }

        $support = array('','客房','茶歇','AV设备');
        // dd($support);
        $numberArr = [];
        foreach ($data2 as $key => $val) {
            if(!in_array($val['number'],$numberArr))
            {
                array_push($numberArr,$val['number']);
            }else
            {
                $data2[$key]['number'] = '';
            }
            $data2[$key]['pname'] = \DB::table('places')->where('id', $val['pid'])->value('title');
            $data2[$key]['mname'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('title');
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
            $data2[$key]['fname'] = $arr;
            $data2[$key]['pic'] = \DB::table('meetplaces')->where('id', $val['mid'])->value('pic');
        }

         return view('admin.order.index',['title'=>'我的订单','request'=>$request->all(),'data'=>$data2,'status'=>$status]);
    }
}
