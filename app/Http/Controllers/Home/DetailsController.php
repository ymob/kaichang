<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    //加载搜索结果详情页
    public function index($pid)
    {
        $placesId = $pid;
        // 场地信息 //
        $data = \DB::table('places')->where('id',$pid)->first();
        // 地址
        $address = explode(',',$data->address);
        $arr = [];
        foreach($address as $key=>$value)
        {
            $arr[$key] = \DB::table('district')->where('id',$value)->value('name');
        }
        $data->address = implode(' ',$arr).' '.$address[3];

        // 场地类型
        $type = array('','酒店','会议中心','体育馆','展览馆','酒吧/餐厅/会所','艺术中心/剧院','咖啡厅/茶室');
        $data->type = $type[$data->typeId];

        // 会场数
        $data->meetNum = \DB::table('meetplaces')->where('pid',$pid)->count();

        // 图片
        $pics = explode(',',$data->pic);
        $data->pic = $pics;

        // 当前场地下的会场信息 //
        $meetData = \DB::table('meetplaces')->where('pid',$pid)->get();

        $freeValues = array('','暖气','地毯','音响','无线话筒','固定投影','固定幕布','移动投影','电视屏','白板','移动舞台','茶/水','纸笔','桌卡','指引牌','签到台','鲜花','茶歇','有线话筒','台式话筒','小蜜蜂','移动幕布','LED屏','移动讲台','宽带接口','代客泊车','停车场');
        $mid = [];

        foreach($meetData as $k=>$v)
        {
            $mid[$k] = $v->id;
            if($v->freeService)
            {

                $free = explode(',',$v->freeService);
                $arr = [];
                foreach($free as $key=>$val)
                {
                    $arr[$key] = $freeValues[$val];
                }
                $meetData[$k]->free = implode(' ',$arr);
            }else{
                $meetData[$k]->free = '';
            }
        }

        // 会场下的配套服务信息
        $supportType = array('','客房','茶歇','AV设备');
        $type = ['',['','单人间','标准间(双床)','双人间','套间客房','公寓式客房','总统套房','特色客房'],['','中式','西式'],['','音响设备','麦克风','投影仪']];
        $facilities = [];
        foreach($mid as $key=>$value)
        {
            $facilities[$key] = \DB::table('facilities')->where('mid',$value)->get();
            foreach($facilities[$key] as $k=>$v)
            {
                $facilities[$key][$k]->support = $supportType[$facilities[$key][$k]->supportType];
                $facilities[$key][$k]->type = $type[$facilities[$key][$k]->supportType][$facilities[$key][$k]->type];
            }
        }


//        dd(session('shopcart'));
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
        if($shopcart)
        {
            foreach($shopcart as $k=>$v)
            {
                if (is_object($v)) {
                    $shopcart[$k] = (array)$v;
                }
            }

            foreach($shopcart as $key=>$val)
            {
                $val = (array)$val;
                $pid = \DB::table('meetplaces')->where('id', $val['mid'])->value('pid');
                $val['pid'] = $pid;
                $val['pname'] = \DB::table('places')->where('id',$pid)->value('title');
                $val['mname'] = \DB::table('meetplaces')->where('id',$val['mid'])->value('title');
                $fids = explode(',',$val['fids']);
                $count = array_count_values( $fids);
                $fids = array_unique($fids);
                $arr = [];
                foreach($fids as $k=>$v)
                {
                    $sid = \DB::table('facilities')->where('id',$v)->value('supportType');
                    if($sid)
                    {
                        $arr[] = $support[$sid].' ✖ '.$count[$v];
                    }
                }

                $val['fname'] = $arr;
                $val['pic'] = \DB::table('meetplaces')->where('id',$val['mid'])->value('pic');
                $shopcart[$key] = $val;
            }
        }


        $user = session('user');
        if($user)
        {
            $coll = \DB::table('collection')->where([['uid', $user->id], ['pid', $placesId]])->first();
            if($coll)
            {
                if($coll->status == 1)
                {
                    $data->coll = 1;
                }else
                {
                    $data->coll = 0;
                }
            }else
            {
                $data->coll = 0;
            }
        }else
        {
            $data->coll = 0;
        }


        $count = \DB::table('places')->where('isads',1)->count()-4;
        // dd($count);
        $num = rand(1,$count);
        $adver  = \DB::table('places')->where('isads',1)->skip($num)->take(4)->get();
        foreach ($adver as $key => $value) {
            $adver[$key]->pic = explode(',',$value->pic)[0];
            $address = explode(',',$value->address);
            $province = \DB::table('district')->where('id',$address[0])->value('name');
            $city = \DB::table('district')->where('id',$address[1])->value('name');
            $county = \DB::table('district')->where('id',$address[2])->value('name');
            $finaladdress = implode("",[$province,$city,$county,$address[3]]);
            $adver[$key]->address = $finaladdress;
            // var_dump($finaladdress);
        }

        return view('home.index.detail',['title'=>'搜索结果详情页', 'data'=>$data ,'meetData'=>$meetData, 'facilities'=>$facilities, 'shopcart'=>$shopcart,'adver'=>$adver]);
    }

    public function morecomment(Request $request)
    {   
        $pid = $request->input('pid');
        $meet = \DB::table('meetplaces')->where('pid',$pid)->get();
        if($meet)
        {
            $mids = [];
            foreach($meet as $k2=>$v2)
            {
                $mids[] = $v2->id;
            }
            $coms = [];
            foreach($mids as $k3=>$v3)
            {
                $com = \DB::table('comments')->where('mid',$v3)->get();
                if($com){
                    foreach($com as $k4=>$v4)
                    {
                        $coms[] = $v4;
                    }
                }
            }
//            dd($coms);
//             var_dump($coms);
        }else{
            $coms = null;
        }
       return response()->json($coms); 
    }

}
