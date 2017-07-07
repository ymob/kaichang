<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    //分类列表
    public function index()
    {
        //在查询中使用原始表达式,可以使用 DB::raw
        //select *,concat(path,',',id) as sort_path from category order by sort_path
        $data = \DB::table('goods_types')->select('*',\DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理 typeName 显示
        foreach($data as $key=>$value)
        {
            $num = substr_count($value->path,',');
            $value->typeName = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|---",$num).$value->typeName;

            //将 attrIds 转换成对应的属性名显示
            $attrIds = explode(',',$value->attrIds);
            $arr = [];
            foreach ($attrIds as $k=>$val)
            {
                $arr[$k] = \DB::table('goods_attrs')->where('id',$val)->value('attrName');
            }
            $data[$key]->attrNames = implode(',',$arr);
        }

        return view('admin.category.index',['title'=>'分类列表','data'=>$data]);
    }

    //加载添加分类页
    public function create()
    {
        //在查询中使用原始表达式,可以使用 DB::raw
        //select *,concat(path,',',id) as sort_path from category order by sort_path
        $data = \DB::table('goods_types')->select('*',\DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理
        foreach($data as $key=>$value)
        {
            $num = substr_count($value->path,',');
            $value->typeName = str_repeat('|---',$num).$value->typeName;
        }

        return view('admin.category.add',['title'=>'分类添加','data'=>$data]);
    }

    //执行添加子分类
    public function store(Request $request)
    {
        $data = $request->except('_token');

        //判断是否是添加根分类
        if($data['pid'] == '0')
        {
           $data['path']=0;
           $data['status']=1;
        }else
        {
            //查询父path
            $parent_path = \DB::table('goods_types')->where('id',$data['pid'])->first()->path;

            //拼接要在其下添加的子分类的path
            $data['path'] = $parent_path.','.$data['pid'];
            $data['status'] = 1;
        }

        $res=\DB::table('goods_types')->insert($data);
        if ($res)
        {
            return redirect('/admin/category')->with(['info'=>'添加成功']);
        }else
        {
            return back()->with(['info'=>'添加失败']);
        }
    }

    public function show($id)
    {

    }

    //编辑分类
    public function edit($id)
    {
        //要编辑的数据
        $data = \DB::table('goods_types')->where('id', $id)->first();

        //所有分类
        $allData = \DB::table('goods_types')->select('*', \DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理
        foreach ($allData as $key => $value) {
            $num = substr_count($value->path, ',');
            $value->typeName = str_repeat('|---', $num) . $value->typeName;
        }

        //所含属性
        $attrIds = explode(',', $data->attrIds);
        $data->attrIds = explode(',', $data->attrIds);

        foreach ($attrIds as $k => $v) {
            $data->attrs[$k] = \DB::table('goods_attrs')->where('id', $v)->value('attrName');
        }

        //查询所有已有属性
        $allAttrs = \DB::table('goods_attrs')->get();

        return view('admin.category.edit', ['title' => '分类编辑', 'data' => $data, 'allData' => $allData, 'allAttrs' => $allAttrs]);

    }

    //执行修改
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');

        //判断是否是添加根分类
        if($data['pid'] == '0')
        {
            $data['path']=0;
            $data['status']=1;
        }else
        {
            //查询父path
            $parent_path = \DB::table('goods_types')->where('id',$data['pid'])->first()->path;

            //拼接要在其下添加的子分类的path
            $data['path'] = $parent_path.','.$data['pid'];
            $data['status'] = 1;
        }

        $addAttr = $request->input('addAttr');

        if($addAttr)
        {
            $addAttr = explode(',',$addAttr);
            $newattrIds = [];

            //新添加的属性
            foreach ($addAttr as $key=>$value)
            {
                $newattrIds[] = \DB::table('goods_attrs')->where('attrName',$value)->value('id');
            }
            $oldattrIds = \DB::table('goods_types')->where('id',$id)->value('attrIds');

            //原有的属性
            if($oldattrIds)
            {
                $oldattrIds = explode(',',$oldattrIds);
                foreach ($oldattrIds as $k=>$v)
                {
                    $newattrIds[] = $v;
                }
            }

            //排序
            sort($newattrIds);
            $newattrIds = implode(',',$newattrIds);
            $data['attrIds'] = $newattrIds;
        }

        unset($data['addAttr']);
        $res = \DB::table('goods_types')->where('id',$id)->update($data);
        if ($res)
        {
            return redirect('/admin/category')->with(['info'=>'修改成功']);
        }else
        {
            return back()->with(['info'=>'修改失败']);
        }

    }

    //执行删除分类
    public function destroy($id)
    {
        $res = \DB::table('goods_types')->where('pid',$id)->first();
        if($res)
        {
            return back()->with(['info'=>'有子分类,不允许删除']);
        }

        $res = \DB::table('goods_types')->delete($id);
        if ($res)
        {
            return redirect('/admin/category')->with(['info'=>'删除成功']);
        }else
        {
            return back()->with(['info'=>'删除失败']);
        }

    }

    //递归查询所有多级分类
    public function getCategoryByPid($pid)
    {
        //根据 pid 查询子分类
        $data = \DB::table('goods_types')->where('pid',$pid)->get();

        $allData = [];
        foreach($data as $key=>$val)
        {
            $val->sub = $this->getCategoryByPid($val->id);
            $allData[] = $val;
        }

        return $allData;
    }
    public function get()
    {
        $data = $this->getCategoryByPid(0);
        dd($data);
    }

    //删除分类下的属性
    public function deleteAttr($typeId,$attrId)
    {
        $arr = \DB::table('goods_types')->where('id',$typeId)->value('attrIds');
        $arr = explode(',',$arr);
        foreach ($arr as $key=>$val)
        {
            if($val == $attrId)
            {
                unset($arr[$key]);
            }
        }
        sort($arr);
        $arr = implode(',',$arr);
        $data = [];
        $data['attrIds'] = $arr;

        $res = \DB::table('goods_types')->where('id',$typeId)->update($data);

        if($res)
        {
            return redirect('/admin/category/'.$typeId.'/edit')->with(['info'=>'删除属性成功']);
        }else
        {
            return back()->with(['info'=>'删除属性失败']);
        }
    }

}
