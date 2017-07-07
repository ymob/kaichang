@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1>
                        分类管理
                        <small>分类列表</small>
                    </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">分类列表</h3>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url('/admin/category/create') }}" class="><button class="btn-flat"><i class="glyphicon glyphicon-plus"></i> 分类添加</button></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if(session('info'))
                                <div class="alert alert-info">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>分类名</th>
                                    <th>所含属性</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $key=>$value)
                                    <tr class="parent">
                                        <td class="ids">{{ $value->id  }}</td>
                                        <td class="name">{!! $value->typeName !!}</td>
                                        <td>{{ $value->attrNames }}</td>
                                        <td>
                                            <a href="{{ url('/admin/category') }}/{{ $value->id }}/edit">编辑</a>
                                            <a href="#" data-toggle="modal" data-target="#myModal" class="del">删除</a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--隐藏的表单提交,用于删除--}}
                                <form action="" id="formDel" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>


                                </tbody>
                            </table>

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

            var url="/admin/category/"+id;
            $("#formDel").attr('action',url);
            $("#formDel").submit();

        });

    </script>

@endsection

