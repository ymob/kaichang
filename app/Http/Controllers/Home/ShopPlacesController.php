<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Place;
use App\Model\Meetplace;
use App\Model\Facilitie;

class ShopPlacesController extends Controller
{
    // 场地列表
    public function index(Request $request)
    {
        $num = $request->input('num', 10);

        $keywords = $request->input('keywords', '');

        $data = \DB::table('places')
            ->where('title','like','%'.$keywords.'%')
            ->where('sid', session('shopkeeper')->id)
            ->paginate($num);
        foreach ($data as $key => $val) {
            $arr1 = explode(',', $val->freeService);
            $val->freeService = $arr1;
            $arr2 = explode(',', $val->supportService);
            $val->supportService = $arr2;
            $arr3 = explode(',', $val->pic);
            $val->pic = $arr3;
        }
        return view('home.shopercenter.places',['title'=>'场地列表','request'=>$request->all(),'data'=>$data]);
    }

    // 场地详情
    public function places(Request $request)
    {
        $id = $request->id;
        $res = Place::where('id', $id)->where('sid', session('shopkeeper')->id)->first();
        if(!$res)
        {
            return redirect('404');
        }
        $arr1 = explode(',', $res->freeService);
        $res->freeService = $arr1;
        $arr2 = explode(',', $res->supportService);
        $res->supportService = $arr2;
        $arr3 = explode(',', $res->pic);
        $res->pic = $arr3;

        return view('home.shopercenter.places_detail', ['title' => '场地详情页', 'data' => $res]);
    }

    // 场地详情修改
    public function upplaces(Request $request)
    {
        $valid = [
            'typeId' => 'required',
            'title' => 'required',
            'address3' => 'required',
            'phone' => 'required',
            'evidencePic' => 'image',
            'price' => 'required'
        ];
        $validInfo = [
            'typeId.required' => '未选择场地类型',
            'title.required' => '场地标题不能为空',
            'address3.required' => '地址不能为空',
            'phone.required' => '联系电话不能为空',
            'evidencePic.image' => '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。',
            'price.required' => '场地起价不能为空'
        ];
        
        if(isset($request->pic[0]))
        {
            $valid['pic.0'] = 'image';
            $validInfo['pic.0.image'] = '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。';
        }
        if(isset($request->pic[1]))
        {
            $valid['pic.1'] = 'image';
            $validInfo['pic.1.image'] = '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。';
        }
        if(isset($request->pic[2]))
        {
            $valid['pic.2'] = 'image';
            $validInfo['pic.2.image'] = '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。';
        }

        $this->validate($request, $valid, $validInfo);
        $data = $request->except('_token', 'id');
        $id = $request->id;

        $res = Facilitie::where('mid', $id)->get();
        foreach ($res as $key => $val) {
            if(!in_array($val['supportType'], $data['supportService']))
            {
                return back()->with(['info' => '本场地下存在该附属服务，不能取消该选项。']);
            }
        }

        if($data['typeId'] != 1)
        {
            $data['hotelStar'] = '';
        }
        // dd($data);
        if($request->pic)
        {
            foreach ($data['pic'] as $key => $val) {
                if($request->file('pic.'.$key)->isValid())
                {
                    $ext=$request->file('pic.'.$key)->extension();

                    do
                    {
                        $filename = time().mt_rand(10000000,99999999).'.'.$ext;
                    }while(file_exists('./uploads/shoper/places/places/'.$filename));

                    $request->file('pic.'.$key)->move('./uploads/shoper/places/places',$filename);

                    $data['pic'][$key] = $filename;
                }
            }
        }

        $oldData = Place::where('id', $id)->first();
        $oldPic = explode(',', $oldData->pic);
        
        if($request->file('pic'))   
        {
            foreach ($data['pic'] as $key => $val) {
                if($key == 0)
                {
                    if(file_exists('./uploads/shoper/places/places/'.$oldPic[0]) && $oldPic[0] != 'default_place.jpg')
                    {
                        unlink('./uploads/shoper/places/places/'.$oldPic[0]);
                    }
                    $oldPic[0] = $val;
                }
                if($key == 1)
                {
                    if(file_exists('./uploads/shoper/places/places/'.$oldPic[1]) && $oldPic[1] != 'default_place.jpg')
                    {
                        unlink('./uploads/shoper/places/places/'.$oldPic[1]);
                    }
                    $oldPic[1] = $val;
                }
                if($key == 2)
                {
                    if(file_exists('./uploads/shoper/places/places/'.$oldPic[2]) && $oldPic[2] != 'default_place.jpg')
                    {
                        unlink('./uploads/shoper/places/places/'.$oldPic[2]);
                    }
                    $oldPic[2] = $val;
                }
            }
            $data['pic'] = implode(',', $oldPic);
        }

        if($request->file('evidencePic'))
        {
            if($request->file('evidencePic')->isValid())
            {
                $ext=$request->file('evidencePic')->extension();

                do
                {
                    $filename = time().mt_rand(10000000,99999999).'.'.$ext;
                }while(file_exists('./uploads/shoper/places/evidence/'.$filename));

                if(file_exists('./uploads/shoper/places/evidence/'.$oldData->evidencePic) && $oldData->evidencePic != 'default_place.jpg')
                {
                    unlink('./uploads/shoper/places/evidence/'.$oldData->evidencePic);
                }

                $request->file('evidencePic')->move('./uploads/shoper/places/evidence', $filename);

                $data['evidencePic'] = $filename;
            }
        }
        if($request->has('freeService'))
        {
            $data['freeService'] = implode(',',$data['freeService']);
        }else{
            $data['freeService'] = '';
        }
        if($request->has('supportService'))
        {
            $data['supportService'] = implode(',',$data['supportService']);
        }else{
            $data['supportService'] = '';
        }
        $data['address'] = $data['address1'].','.$data['address2'].','.$data['address3'];
        unset($data['address1']);
        unset($data['address2']);
        unset($data['address3']);
        // dd($data);
        $data['updated_at'] = time();
        $res = Place::where('id', $id)->update($data);
        if($res)
        {
            return back()->with(['info' => '修改成功']);
        }else
        {
            return back()->with(['info' => '修改失败']);
        }
    }

    // 会场列表
    public function meetplaces(Request $request)
    {
        $pid = $request->id;
        $sid = session('shopkeeper')->id;
        $res = Place::where([['id', $pid], ['sid', $sid]])->first();
        if(!$res)
        {
            return redirect('404');
        }
        $data = Meetplace::where('pid', $pid)->get();

        foreach ($data as $key => $val) {
            $arr1 = explode(',', $val->freeService);
            $val->freeService = $arr1;
            $arr2 = explode(',', $val->supportService);
            $val->supportService = $arr2;
        }

        return view('home.shopercenter.meetplaces', ['title' => '会场列表页', 'data' => $data]);
    }

    // 会场详情
    public function meet_detail(Request $request)
    {
        $mid = $request->id;
        dd($mid);
    }

    //加载添加场地页面
    public function add()
    {
        return view('home.shopercenter.release',['title'=>'商户发布场地']);
    }

    //执行添加场地
    public function insert(Request $request)
    {
        //表单验证
        $validator = \Validator::make($request->all(), [
            'typeId' => 'required',
            'title' => 'required',
            'address3' => 'required',
            'phone' => 'required',
            'evidencePic' => 'required|image',
            'price' => 'required'
        ],[
            'typeId.required' => '未选择场地类型',
            'title.required' => '场地标题不能为空',
            'address3.required' => '地址不能为空',
            'phone.required' => '联系电话不能为空',
            'evidencePic.required' => '必须上传营业执照',
            'evidencePic.image' => '请上传合适图片格式，例如： jpeg、png、bmp、gif、或 svg 。',
            'price.required' => '场地起价不能为空'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //处理要添加的数据
        $data = $request->except('_token');
        $data['sid'] = \Session('shopkeeper')->id;
        $data['address'] = $data['address1'].','.$data['address2'].','.$data['address3'];
        unset($data['address1']);
        unset($data['address2']);
        unset($data['address3']);
        if($request->has('freeService'))
        {
            $data['freeService'] = implode(',',$data['freeService']);
        }else{
            $data['freeService'] = '';
        }
        if($request->has('supportService'))
        {
            $data['supportService'] = implode(',',$data['supportService']);
        }else{
            $data['supportService'] = '';
        }
        $time = time();
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        //处理上传的图片
        if($request->file('evidencePic')->isValid())
        {

            $ext=$request->file('evidencePic')->extension();

            do
            {
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
            }while(file_exists('./uploads/shoper/places/evidence/'.$filename));

            // 修改指定图片的大小
            //$img = Image::make('images/avatar.jpg')->resize(200, 200);

            // 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素
            //$img->insert('images/watermark.png', 'bottom-right', 15, 10);

            // 将处理后的图片重新保存到其他路径
           //$img->save('images/new_avatar.jpg');

            $request->file('evidencePic')->move('./uploads/shoper/places/evidence',$filename);

            $data['evidencePic'] = $filename;
        }
        if($request->file('pic')->isValid())
        {

            $ext=$request->file('pic')->extension();

            do
            {
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
            }while(file_exists('./uploads/shoper/places/places'.$filename));

            $request->file('pic')->move('./uploads/shoper/places/places',$filename);

            $data['pic'] = $filename;
        }

        //添加数据到数据库表 places ,返回ID
        $res=\DB::table('places')->insertGetId($data);

        if($res){

            //跳到继续添加会场的页面
            return redirect('/shopcenter/addMeet/'.$res)->with(['info' => '场地添加成功,请继续添加场地下的会场信息！']);
        }else{
            return back()->withInput()->with(['info' => '提交失败！']);
        }

    }

    //加载添加会场页面
    public function addMeet($pid)
    {
        //查询场地中已选择的 免费服务 和 配套服务
        $data = \DB::table('places')->where('id',$pid)->first();
        $freeValues = array('空','暖气','地毯','音响','无线话筒','固定投影','固定幕布','移动投影','电视屏','白板','移动舞台','茶/水','纸笔','桌卡','指引牌','签到台','鲜花','茶歇','有线话筒','台式话筒','小蜜蜂','移动幕布','LED屏','移动讲台','宽带接口','代客泊车','停车场');
        $arr = [];
        if($data->freeService)
        {
            $free = explode(',',$data->freeService);
            foreach($free as $v)
            {
                $arr['free'][$v] = $freeValues[$v];
            }
            $arr['freeKeys'] = $free;
        }else{
            $arr['free'] = [];
            $arr['freeKeys'] = [];
        }
        $supportValues = array('空','客房','茶歇','AV设备');
        if($data->supportService)
        {
            $support = explode(',',$data->supportService);
            foreach($support as $v)
            {
                $arr['support'][$v] = $supportValues[$v];
            }
            $arr['supportKeys'] = $support;
        }else{
            $arr['support'] = [];
            $arr['supportKeys'] = [];
        }

        //将 pid $arr 存入 session 以便添加多个会场
        session('pid',$pid);
        session('arr',$arr);

        return view('home.shopercenter.addMeet',['title'=>'添加会场', 'pid'=>$pid ,'arr'=>$arr]);
    }

    public function insertMeet(Request $request)
    {
        //表单验证
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required'
        ],[
            'title.required' => '会场标题不能为空',
            'price.required' => '会场价格不能为空'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('_token');

        // 添加会场
        $meet = [];
        $meet['pid'] = $data['pid'];
        $meet['title'] = $data['title'];
        $meet['area'] = $data['area'];
        $meet['deskPeople'] = $data['deskPeople'];
        $meet['dinnerPeople'] = $data['dinnerPeople'];
        $meet['price'] = $data['price'];
        if(array_key_exists('freeService',$data))
        {
            $meet['freeService'] = implode(',',$data['freeService']);
        }
        if($data['supportService'])
        {
            $arr = explode(',',$data['supportService']);
            unset($arr[0]);
            $arr = array_unique($arr);
            $meet['supportService'] = implode(',',$arr);
        }else{
            $meet['supportService'] = '';
        }
        if($request->file('pic')->isValid())
        {

            $ext=$request->file('pic')->extension();

            do
            {
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
            }while(file_exists('./uploads/shoper/places/meetplaces'.$filename));

            $request->file('pic')->move('./uploads/shoper/places/meetplaces',$filename);

            $meet['pic'] = $filename;
        }
        $time = time();
        $meet['created_at'] = $time;
        $meet['updated_at'] = $time;

        //返回添加成功的 会场id
        $mid = \DB::table('meetplaces')->insertGetId($meet);
        if($mid)
        {
            // 添加会场下的 配套服务 最多50个
            for($i=1;$i<=50;$i++) {

                $key = 'type' . $i;
                if (array_key_exists($key, $data)) {

                    $facility = [];
                    $price = 'price' . $i;
                    $supportType = 'supportType' . $i;
                    $pic = 'pic' . $i;

                    $facility['mid'] = $mid;
                    $facility['supportType'] = $data[$supportType];
                    $facility['type'] = $data[$key];
                    $facility['price'] = $data[$price];
                    $facility['created_at'] = time();
                    $facility['updated_at'] = time();
                    if(array_key_exists($pic,$data))
                    {
                        $ext = $request->file($pic)->extension();
                        do {
                            $filename = time() . mt_rand(10000000, 99999999) . '.' . $ext;
                        } while (file_exists('./uploads/shoper/places/facilities' . $filename));

                        $request->file($pic)->move('./uploads/shoper/places/facilities', $filename);

                        $facility['pic'] = $filename;
                    }

                    $res = \DB::table('facilities')->insert($facility);
                    //var_dump($res);
                    if(!$res)
                    {
                        return back()->with(['info' => '添加会场失败']);
                    }

                }
            }

            return view('home.shopercenter.release',['title'=>'商户发布场地'])->with(['info'=>'发布场地及会场成功!']);
        }else{
            return back()->with(['info'=>'添加会场失败']);
        }
    }


    public function insertMeetAgain(Request $request)
    {
        //表单验证
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required'
        ],[
            'title.required' => '会场标题不能为空',
            'price.required' => '会场价格不能为空'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('_token');

        // 添加会场
        $meet = [];
        $meet['pid'] = $data['pid'];
        $meet['title'] = $data['title'];
        $meet['area'] = $data['area'];
        $meet['deskPeople'] = $data['deskPeople'];
        $meet['dinnerPeople'] = $data['dinnerPeople'];
        $meet['price'] = $data['price'];
        if(array_key_exists('freeService',$data))
        {
            $meet['freeService'] = implode(',',$data['freeService']);
        }
        if($data['supportService'])
        {
            $arr = explode(',',$data['supportService']);
            unset($arr[0]);
            $arr = array_unique($arr);
            $meet['supportService'] = implode(',',$arr);
        }else{
            $meet['supportService'] = '';
        }
        if($request->file('pic')->isValid())
        {

            $ext=$request->file('pic')->extension();

            do
            {
                $filename = time().mt_rand(10000000,99999999).'.'.$ext;
            }while(file_exists('./uploads/shoper/places/meetplaces'.$filename));

            $request->file('pic')->move('./uploads/shoper/places/meetplaces',$filename);

            $meet['pic'] = $filename;
        }
        $time = time();
        $meet['created_at'] = $time;
        $meet['updated_at'] = $time;

        //返回添加成功的 会场id
        $mid = \DB::table('meetplaces')->insertGetId($meet);
        if($mid)
        {
            // 添加会场下的 配套服务 最多50个
            for($i=1;$i<=50;$i++) {

                $key = 'type' . $i;
                if (array_key_exists($key, $data)) {

                    $facility = [];
                    $price = 'price' . $i;
                    $supportType = 'supportType' . $i;
                    $pic = 'pic' . $i;

                    $facility['mid'] = $mid;
                    $facility['supportType'] = $data[$supportType];
                    $facility['type'] = $data[$key];
                    $facility['price'] = $data[$price];
                    $facility['created_at'] = time();
                    $facility['updated_at'] = time();
                    if(array_key_exists($pic,$data))
                    {
                        $ext = $request->file($pic)->extension();
                        do {
                            $filename = time() . mt_rand(10000000, 99999999) . '.' . $ext;
                        } while (file_exists('./uploads/shoper/places/facilities' . $filename));

                        $request->file($pic)->move('./uploads/shoper/places/facilities', $filename);

                        $facility['pic'] = $filename;
                    }

                    $res = \DB::table('facilities')->insert($facility);
                    //var_dump($res);
                    if(!$res)
                    {
                        return back()->with(['info' => '添加会场失败']);
                    }

                }
            }

            //继续添加当前场地下的 会场
            $pid = session('pid');
            $arr = session('arr');
            return view('home.shopercenter.addMeet',['title'=>'继续添加会场', 'pid'=>$pid ,'arr'=>$arr]);
        }else{
            return back()->with(['info'=>'添加会场失败']);
        }
    }
}
