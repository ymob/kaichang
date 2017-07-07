@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                属性管理
                <small>属性列表</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">属性列表 </h3>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ url('/admin/attr/add') }}" class="><button class="btn-flat"><i class="glyphicon glyphicon-plus"></i> 属性添加</button></a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if(session('info'))
                                <div class="alert alert-info">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <form action="/admin/attr/index" method="get">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="num" name="num" class="form-control">
                                                <option value="10"
                                                        @if(!empty($request['num']) && $request['num']=='10')
                                                        selected="selected"
                                                        @endif
                                                >每页10条</option>
                                                <option value="25"
                                                        @if(!empty($request['num']) && $request['num']=='25')
                                                        selected="selected"
                                                        @endif
                                                >每页25条</option>
                                                <option value="50"
                                                        @if(!empty($request['num']) && $request['num']=='50')
                                                        selected="selected"
                                                        @endif
                                                >每页50条</option>
                                                <option value="100"
                                                        @if(!empty($request['num']) && $request['num']=='100')
                                                        selected="selected"
                                                        @endif
                                                >每页100条</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-md-offset-6">
                                        <div class="input-group input-group">
                                            <input type="text" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
                                            <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">搜索</button>
                                        </span>
                                        </div>

                                    </div>
                                </div>
                            </form>


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>属性名</th>
                                    <th>属性值</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $key=>$value)
                                    <tr class="parent">
                                        <td class="ids">{{ $value->id  }}</td>
                                        <td class="name">{{ $value->attrName }}</td>
                                        <td class="name">{{ $value->values }}</td>
                                        <td>
                                            <a href="{{ url('/admin/attr/edit') }}/{{ $value->id }}">编辑</a>&nbsp;&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#myModal" class="del">删除</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            {{ $data->appends($request)->links() }}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js')
    <script>

        //全局变量
        var id=0;

        $(".del").click(function(){

            id=$(this).parents('.parent').find('.ids').html();
        });

        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });


    </script>
@endsection

@section('modaljs')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">提示信息</h4>
                </div>
                <div class="modal-body">
                    确定要删除此条数据吗?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="delete">确认删除</button>
                </div>
            </div>
        </div>
    </div>

    <script !src="">

        $("#delete").click(function(){
            location.href="/admin/attr/delete/"+id;
        });

    </script>

@endsection

