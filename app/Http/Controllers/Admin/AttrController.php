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


        foreach ($data as $key=>$value)
        {
            $valueIds = explode(',',$value->valueIds);
            $arr=[];
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

    //加载属性编辑页
    public function edit($id)
    {
        //查询属性
        $data = \DB::table('goods_attrs')->where('id',$id)->first();

        $valueIds = explode(',',$data->valueIds);
        $data->valueId = explode(',',$data->valueIds);

        foreach($valueIds as $k=>$v)
        {
            $data->value[$k] = \DB::table('goods_values')->where('id',$v)->value('value');
        }

        //查询所有属性值
        $values = \DB::table('goods_values')->get();

        return view('admin.attr.edit',['title'=>'属性编辑', 'data'=>$data, 'values'=>$values]);
    }

    //执行属性修改
    public function update(Request $request)
    {
        //拼出需要修改的数据

        $id = $request->input('id');
        $addvs = $request->input('addval');

        if($addvs)
        {
            $addvs = explode(',',$addvs);
            $newvIds = [];
            foreach ($addvs as $key=>$value)
            {
                $newvIds[] = \DB::table('goods_values')->where('value',$value)->value('id');
            }
            $oldvalueIds = \DB::table('goods_attrs')->where('id',$id)->value('valueIds');
            if($oldvalueIds)
            {
                $oldvalueIds = explode(',',$oldvalueIds);
                foreach ($oldvalueIds as $k=>$v)
                {
                    $newvIds[] = $v;
                }
            }
            sort($newvIds);
            $newvIds = implode(',',$newvIds);
            $data['valueIds'] = $newvIds;
        }

        $data['attrName'] = $request->input('attrName');

        //执行修改
        $res = \DB::table('goods_attrs')->where('id',$id)->update($data);
        if($res)
        {
            return redirect('/admin/attr/index')->with(['info'=>'编辑属性成功']);
        }else
        {
            return back()->with(['info'=>'编辑属性失败']);
        }
    }

    //删除属性下的属性值
    public function deleteval($attrId,$valId)
    {
        //删除该属性下的 valueIds 字段下的如 1,2,3,4 中的一个属性值id
        $arr = \DB::table('goods_attrs')->where('id',$attrId)->value('valueIds');
        $arr = explode(',',$arr);
        foreach ($arr as $key=>$val)
        {
            if($val == $valId)
            {
                unset($arr[$key]);
            }
        }
        sort($arr);
        $arr = implode(',',$arr);
        $data = [];
        $data['valueIds'] = $arr;

        $res = \DB::table('goods_attrs')->where('id',$attrId)->update($data);

        if($res)
        {
            return redirect('/admin/attr/edit/'.$attrId)->with(['info'=>'删除属性值成功']);
        }else
        {
            return back()->with(['info'=>'删除属性值失败']);
        }

    }

    //删除属性
    public function delete($id)
    {
        $res=\DB::table('goods_attrs')->delete($id);

        if($res)
        {
            return redirect('/admin/attr/index')->with(['info'=>'删除属性成功']);
        }else
        {
            return back()->with(['info'=>'删除属性失败']);
        }
    }
}

