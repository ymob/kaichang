<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttrController extends Controller
{
    //属性列表
    public function index(Request $request)
    {

        $num = $request->input('num',10);

        $keywords = $request->input('keywords','');

        $data = \DB::table('goods_attrs')->where('attrName','like','%'.$keywords.'%')->paginate($num);

        $arr=[];
        foreach ($data as $key=>$value)
        {
            $valueIds = explode(',',$value->valueIds);
            foreach($valueIds as $k=>$v)
            {
                $arr[$k] = \DB::table('goods_values')->where('id',$v)->value('value');
            }
            $data[$key]->values = implode(',',$arr);
        }

        return view('admin.attr.index',['title'=>'属性列表','request'=>$request->all(),'data'=>$data]);

    }

    //加载属性添加页面
    public function add()
    {
        return view('admin.attr.add',['title'=>'属性添加']);
    }

    //执行属性添加
    public function insert(Request $request)
    {
        $this->validate($request, [
            'attrName' => 'required|unique:goods_attrs'
        ],[
            'attrName.required' => '属性名不能为空',
            'attrName.unique' => '属性名已经存在'
        ]);

        $data = $attrName = $request->except('_token');

        $res=\DB::table('goods_attrs')->insert($data);

        if($res){
            return redirect('/admin/attr/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }

    }
}

