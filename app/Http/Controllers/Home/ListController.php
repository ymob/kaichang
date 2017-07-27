<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Place;

class ListController extends Controller
{
    // 高级搜索
    public function listSearch(Request $request)
    {
    	$pageSize = 5;
        
        if($request->data)
        {
            $data = $request->data;
            $page = $request->data['page'] or 1;
        }else
        {
            $data = $request->except('_token');
            $page = $request->input('page', 1);
        }

        $startPage = ($page - 1) * $pageSize;
        if($startPage < 0) $startPage = 0;

		$where = 'WHERE updown=1 ';

        // 地区
		$arr_add = ['北京'=>1,'天津'=>2,'沈阳'=>107,'大连'=>108,'哈尔滨'=>130,'石家庄'=>73,'太原'=>84,'呼和浩特'=>95,'廊坊'=>82,'上海'=>9,'杭州'=>175,'南京'=>162,'苏州'=>166,'无锡'=>163,'济南'=>223,'厦门'=>204,'宁波'=>176,'福州'=>203,'青岛'=>224,'合肥'=>186,'常州'=>165,'扬州'=>171,'温州'=>177,'绍兴'=>180,'嘉兴'=>178,'威海'=>232,'镇江'=>172,'南通'=>167,'金华'=>183,'徐州'=>164,'潍坊'=>229,'淄博'=>225,'临沂'=>235,'马鞍山'=>190,'台州'=>184,'泰州'=>173,'济宁'=>230,'泰安'=>231,'成都'=>385,'武汉'=>258,'郑州'=>240,'长沙'=>275,'南昌'=>212,'贵阳'=>406,'西宁'=>462,'重庆'=>22,'西安'=>438,'昆明'=>415,'兰州'=>448,'乌鲁木齐'=>475,'银川'=>470,'广州'=>289,'深圳'=>291,'佛山'=>294,'珠海'=>292,'东莞'=>305,'三亚'=>325,'海口'=>324,'南宁'=>310,'惠州'=>299];
    	if(isset($data['city']))
        {
            if($data['city'])
            {
                $city = $arr_add[$data['city']];
                if($city == 1 || $city == 2 || $city == 9 || $city == 22)
                {
                    $where .= ' && address like "'.$city.',%" ';
                }else
                {
                    $where .= ' && address like "%,'.$city.',%" ';
                }
            }
        }

		// 人数
        $arr_Num = [10, 30, 60, 100, 200, 300, 500, 1000];
        if(isset($data['number']))
        {
            $number = $data['number'];
            if($number != null)
            {
                $where = trim($where);
                if($number != 8)
                {
                    $where .= ' && maxPeople>='.$arr_Num[$number];
                }else
                {
                    $where .= ' && maxPeople>'.$arr_Num[$number];
                }
            }
        }

		// 价格
        if(isset($data['price']))
        {
            $price = $data['price'];
            $arr_minPirce = [0, 1, 3000, 5000, 8000, 12000, 15000, 20000, 30000, 50000, 80000, 120000, 200000, ];
            $arr_maxPirce = [1, 3000, 5000, 8000, 12000, 15000, 20000, 30000, 50000, 80000, 120000, 200000, 300000];
            if($price)
            {
                $where = trim($where);
                if($price != 13)
                {
                    $where .= ' && price>='.$arr_minPirce[$price].' && price<'.$arr_maxPirce[$price];
                }else
                {
                    $where .= ' && price>300000';
                }
            }
        }

        // 类型
        if(isset($data['typeId']))
        {
        	$where = trim($where);
			$where = $where.' && (';
        	$typeId = $data['typeId'];

        	foreach ($typeId as $key => $val) {
        		$where .= 'typeId='.$val.' || ';
        	}

        	$where = trim($where);
			$where = trim($where, '||');
        	$where = trim($where).')';
        }

        // 酒店星级条件
        if(isset($data['hotelStar']))
        {
        	$where = trim($where);
			$where = $where.' && (';

        	$hotelStar = $data['hotelStar'];
        	foreach ($hotelStar as $key => $val) {
        		$where .= 'hotelStar='.$val.' || ';
        	}

        	$where = trim($where);
			$where = trim($where, '||');
        	$where = trim($where).')';
        }

        $where = trim($where);
        $where = trim($where, '&&');
        $where = trim($where);

        // 查询语句
        $key_where = md5($where);

        $places = \Cache::get($key_where, function() use($where, $key_where) {
            $res = \DB::select("SELECT * FROM places ".$where);
            \Cache::put($key_where, $res, 5);
            return $res;
        });

        // 酒店星级排序
        if(isset($data['o_hotelStar']))
        {
            $len = count($places);
            for ($i=1; $i < $len; $i++) { 
                for ($j=0; $j < $len - $i; $j++) { 
                    if($places[$j]->hotelStar > $places[$j + 1]->hotelStar)
                    {
                        $tmp = $places[$j];
                        $places[$j] = $places[$j + 1];
                        $places[$j + 1] = $tmp;
                    }
                }
            }
            if($data['o_hotelStar'] == 'desc')
            {
                $places = array_reverse($places);
            }
        }

        // 价格排序
        if(isset($data['o_price']))
        {
            $len = count($places);
            for ($i=1; $i < $len; $i++) { 
                for ($j=0; $j < $len - $i; $j++) { 
                    if($places[$j]->price > $places[$j + 1]->price)
                    {
                        $tmp = $places[$j];
                        $places[$j] = $places[$j + 1];
                        $places[$j + 1] = $tmp;
                    }
                }
            }
            if($data['o_price'] == 'desc')
            {
                $places = array_reverse($places);
            }
        }

        // 销量排序
        if(isset($data['o_sales']))
        {
            $len = count($places);
            for ($i=1; $i < $len; $i++) { 
                for ($j=0; $j < $len - $i; $j++) { 
                    if($places[$j]->sales > $places[$j + 1]->sales)
                    {
                        $tmp = $places[$j];
                        $places[$j] = $places[$j + 1];
                        $places[$j + 1] = $tmp;
                    }
                }
            }
            if($data['o_sales'] == 'desc')
            {
                $places = array_reverse($places);
            }
        }

        // 评分排序 
        if(isset($data['o_score']))
        {
            $o_places = [];
            foreach ($places as $val) {
                $score = ten($val->score);
                if(count($o_places) == 0)
                {
                    $o_places[] = $val;
                }else if(count($o_places) == 1)
                {
                    if($score >= ten($o_places[0]->score))
                    {
                        $o_places[] = $val;
                    }else
                    {
                        array_unshift($o_places, $val);
                    }
                }else
                {
                    foreach ($o_places as $k => $v) {
                        if(isset($o_places[$k + 1]))
                        {
                           
                            if($score < ten($o_places[0]->score))
                            {
                                array_unshift($o_places, $val);
                            }else if($score >= ten($v->score) && $score < ten($o_places[$k + 1]->score))
                            {
                                array_splice($o_places, $k + 1, 0, [$val]);
                            }
                        }else
                        {
                            if($score >= ten($v->score))
                            {
                                $o_places[] = $val;
                            }else
                            {
                                array_splice($o_places, $k - 1, 0, [$val]);
                            }
                        }
                    }
                }
            }
            $places = $o_places;
            if($data['o_score'] == 'desc')
            {
                $places = array_reverse($places);
            }
        }

		// 时间
        if(isset($data['startime']))
        {
            $startime = strtotime($data['startime']);
            $arr_time = [0, 1, 2, 3, 4, 5, 6, 7, 10, 14];
            $timeLong = $arr_time[$data['timeLong']] * 86400;

    		foreach ($places as $key => $val)
    		{
    			$orders = \DB::table('orders')->where([['pid', $val->id], ['status', '2']])->orWhere([['pid', $val->id], ['status', '3']])->get();
    			$place_order = [];
    			// 遍历该场地订单
    			foreach ($orders as $k => $v) {
    				if(($startime >= ($v->stime + $v->ltime)) && (($startime + $timeLong) <= $v->stime))
    				{
    					$place_order[] = true;
    				}else
    				{
    					$place_order[] = false;
    				}
    			}
    			if($orders)
    			{
    				if(in_array(false, $place_order))
    				{
                        $val->timeContradict = true;
    				}
    			}
    		}

            $places_order_false = [];
            $places_order_true = [];
            foreach ($places as $key => $val)
            {
                if(isset($val->timeContradict))
                {
                    array_push($places_order_false, $val);
                }else
                {
                    array_push($places_order_true, $val);
                }
            }
            $places = array_merge($places_order_true, $places_order_false);
        }

        $user = session('user');

        foreach($places as $k => $v)
        {
            // 地址
            $address = explode(',', $v->address);
            $arr = [];
            foreach($address as $key=>$value)
            {
                $arr[$key] = \DB::table('district')->where('id',$value)->value('name');
            }
            $v->address = implode(' ',$arr).' '.$address[3];

            // 会场数
            $v->meetNum = \DB::table('meetplaces')->where('pid',$v->id)->count();

            // 酒店星级
            if($v->hotelStar)
            {
        		$hotelStar = array('','','三星以下','三星级','四星级','五星级','六星级','七星级');
                $v->hotelStar = $hotelStar[$v->hotelStar];
            }

            // 免费服务
            if($v->freeService)
            {
                $free = explode(',',$v->freeService);
                foreach($free as $key=>$value)
                {
        			$freeValues = array('','暖气','地毯','音响','无线话筒','固定投影','固定幕布','移动投影','电视屏','白板','移动舞台','茶/水','纸笔','桌卡','指引牌','签到台','鲜花','茶歇','有线话筒','台式话筒','小蜜蜂','移动幕布','LED屏','移动讲台','宽带接口','代客泊车','停车场');
                    $free[$key] = $freeValues[$value];
                }
                $v->free = $free;
            }else
            {
                $v->free = [];
            }

            // 配套服务
            $support = explode(',',$v->supportService);
            foreach($support as $key=>$value)
            {
        		$supportValues = array('','客房','茶歇','AV设备');
                $support[$key] = $supportValues[$value];
            }
            $v->support = $support;

            // 图片
            $pics = explode(',',$v->pic);
            $v->pic = $pics[0];

            // 收藏
            if($user)
            {
                $coll = \DB::table('collection')->where([['uid', $user->id], ['pid', $v->id]])->first();
                if($coll)
                {
                    if($coll->status == 1)
                    {
                        $v->coll = 1;
                    }else
                    {
                        $v->coll = 0;
                    }
                }else
                {
                    $v->coll = 0;
                }
            }else
            {
                $v->coll = 0;
            }
        }

        $dataSize = count($places);
        $maxPage = ceil($dataSize / $pageSize);
        // 清除缓存
        if($maxPage == $page)
        {
            \Cache::forget($key_where);
        }

        $places = array_slice($places, $startPage, $pageSize+1);
        $data['page'] = $page + 1;

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

        if($request->data)
        {
            $data['places'] = $places;
            $ajax = json_encode($data);
            return response()->json($data);
        }else
        {
            $ajax = json_encode($data);
            return view('home.index.list', ['title'=>'搜索结果列表页', 'adver'=>$adver, 'ajax' => $ajax, 'data' => $places]);
        }

    }
}