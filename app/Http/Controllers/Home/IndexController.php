<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 加载网站首页
    public function index()
    {
    	return view('home.index.index',['title'=>'首页']);
    }

    // 执行首页搜索
    public function indexSearch(Request $request)
    {
        $num = 5;
        $keywords = $request->input('keywords','');
        $data = \DB::table('places')->where([['title','like','%'.$keywords.'%'],['status','=','1'],['updown','=','1']])->paginate($num);

        $hotelStar = array('','','三星以下','三星级','四星级','五星级','六星级','七星级');
        $freeValues = array('','暖气','地毯','音响','无线话筒','固定投影','固定幕布','移动投影','电视屏','白板','移动舞台','茶/水','纸笔','桌卡','指引牌','签到台','鲜花','茶歇','有线话筒','台式话筒','小蜜蜂','移动幕布','LED屏','移动讲台','宽带接口','代客泊车','停车场');
        $supportValues = array('','客房','茶歇','AV设备');

        foreach($data as $k=>$v)
        {
            // 地址
            $address = explode(',',$v->address);
            $arr = [];
            foreach($address as $key=>$value)
            {
                $arr[$key] = \DB::table('district')->where('id',$value)->value('name');
            }
            $data[$k]->address = implode(' ',$arr).' '.$address[3];

            // 会场数
            $data[$k]->meetNum = \DB::table('meetplaces')->where('pid',$v->id)->count();

            // 酒店星级
            if($v->hotelStar)
            {
                $data[$k]->hotelStar = $hotelStar[$v->hotelStar];
            }

            // 免费服务
            if($v->freeService)
            {
                $free = explode(',',$v->freeService);
                foreach($free as $key=>$value)
                {
                    $free[$key] = $freeValues[$value];
                }
                $data[$k]->free = $free;
            }else
            {
                $data[$k]->free = [];
            }

            // 配套服务
            $support = explode(',',$v->supportService);
            foreach($support as $key=>$value)
            {
                $support[$key] = $supportValues[$value];
            }
            $data[$k]->support = $support;

            // 图片
            $pics = explode(',',$v->pic);
            $data[$k]->pic = $pics[0];

        }
//        dd($data);
        return view('home.index.list',['title'=>'搜索结果列表页', 'request'=>$request->all(), 'scode' => 1, 'data'=>$data]);
    }

    
}
