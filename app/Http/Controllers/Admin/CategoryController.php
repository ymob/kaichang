<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分类列表//

        //在查询中使用原始表达式,可以使用 DB::raw
        //select *,concat(path,',',id) as sort_path from category order by sort_path
        $data=\DB::table('goods_types')->select('*',\DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理
        foreach($data as $key=>$value)
        {
            $num=substr_count($value->path,',');
            $value->typeName=str_repeat('|---',$num).$value->typeName;
        }

        return view('admin.category.index',['title'=>'分类列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加分类页//

        //在查询中使用原始表达式,可以使用 DB::raw
        //select *,concat(path,',',id) as sort_path from category order by sort_path
        $data=\DB::table('goods_types')->select('*',\DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理
        foreach($data as $key=>$value)
        {
            $num=substr_count($value->path,',');
            $value->typeName=str_repeat('|---',$num).$value->typeName;
        }

        return view('admin.category.add',['title'=>'分类添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加子分类//

        $data=$request->except('_token');

        //判断是否是添加根分类
        if($data['pid'] == '0')
        {
           $data['path']=0;
           $data['status']=1;
        }else
        {
            //查询父path
            $parent_path=\DB::table('goods_types')->where('id',$data['pid'])->first()->path;

            //拼接要在其下添加的子分类的path
            $data['path']=$parent_path.','.$data['pid'];
            $data['status']=1;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //编辑分类//

        //要编辑的数据
        $data=\DB::table('goods_types')->where('id',$id)->first();

        //所有分类
        $allData=\DB::table('goods_types')->select('*',\DB::raw("concat(path,',',id) as sort_path"))->orderBy('sort_path')->get();

        //处理
        foreach($allData as $key=>$value)
        {
            $num=substr_count($value->path,',');
            $value->typeName=str_repeat('|---',$num).$value->typeName;
        }

        return view('admin.category.edit',['title'=>'分类编辑','data'=>$data,'allData'=>$allData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //执行修改//

        $data=$request->except('_token','_method');

        //判断是否是添加根分类
        if($data['pid'] == '0')
        {
            $data['path']=0;
            $data['status']=1;
        }else
        {
            //查询父path
            $parent_path=\DB::table('goods_types')->where('id',$data['pid'])->first()->path;

            //拼接要在其下添加的子分类的path
            $data['path']=$parent_path.','.$data['pid'];
            $data['status']=1;
        }

        $res=\DB::table('goods_types')->where('id',$id)->update($data);
        if ($res)
        {
            return redirect('/admin/category')->with(['info'=>'更新成功']);
        }else
        {
            return back()->with(['info'=>'更新失败']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除分类//

        $res=\DB::table('goods_types')->where('pid',$id)->first();
        if($res)
        {
            return back()->with(['info'=>'有子分类,不允许删除']);
        }

        $res=\DB::table('goods_types')->delete($id);
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
        $data=\DB::table('goods_types')->where('pid',$pid)->get();

        $allData=[];
        foreach($data as $key=>$val)
        {
            $val->sub=$this->getCategoryByPid($val->id);
            $allData[]=$val;
        }

        return $allData;
    }
    public function get()
    {
        $data=$this->getCategoryByPid(0);
        dd($data);
    }

    //为分类添加属性
    public function addAttr($id)
    {
        dd($id);
    }
}
