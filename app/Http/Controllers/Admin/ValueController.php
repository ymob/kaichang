<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValueController extends Controller
{
    //属性值列表
    public function index(Request $request)
    {
        $num = $request->input('num',10);

        $keywords = $request->input('keywords','');

        $data = \DB::table('goods_values')->where('value','like','%'.$keywords.'%')->paginate($num);

        return view('admin.value.index',['title'=>'属性值列表','request'=>$request->all(),'data'=>$data]);

    }

    //执行属性值添加
    public function insert(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|unique:goods_values'
        ],[
            'value.required' => '添加的属性值不能为空',
            'value.unique' => '属性值已经存在'
        ]);

        $value = $request->except('_token');

        $res=\DB::table('goods_values')->insert($value);

        if($res){
            return redirect('/admin/value/index')->with(['info'=>'添加属性值成功']);
        }else{
            return back()->with(['info'=>'添加属性值失败']);
        }
    }

    //ajax 修改属性值
    public function ajaxRename(Request $request)
    {
        $res=\DB::table('goods_values')->where('value',$request->input('value'))->first();

        if($res)
        {
            return response()->json(0);
        }else
        {
            $res=\DB::table('goods_values')->where('id',$request->input('id'))->update(['value'=>$request->input('value')]);

            if($res)
            {
                return response()->json(1);
            }else{
                return response()->json(2);
            }
        }
    }

    //删除属性值
    public function delete($id)
    {
        $res=\DB::table('goods_values')->delete($id);

        if($res)
        {
            return redirect('/admin/value/index')->with(['info'=>'删除属性值成功']);
        }else
        {
            return back()->with(['info'=>'删除属性值失败']);
        }
    }
}
