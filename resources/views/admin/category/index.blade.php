@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                分类管理
                <small>分类列表</small>
            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Tables</a></li>--}}
            {{--<li class="active">Data tables</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">分类列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if(session('info'))
                                <div class="alert alert-danger">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>分类名</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $key=>$value)
                                    <tr class="parent">
                                        <td class="ids">{{ $value->id  }}</td>
                                        <td class="name">{{ $value->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/category') }}/{{ $value->id }}/edit">编辑</a>
                                            <a href="#" data-toggle="modal" data-target="#myModal" class="del">删除</a>
                                        </td>

                                    </tr>
                                @endforeach

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //绑定一次双击事件
        $(".name").one('dblclick',update);

        //双击事件封装函数
        function update() {

            var td = $(this);

            //获取id
            var id = $(this).parent('.parent').find('.ids').html();

            //获取原来的值
            var oldName = $(this).html();

            var inp = $("<input type='text'>");
            inp.val(oldName);
            $(this).html(inp);

            //直接选中
            inp.select();

            inp.on('blur', function () {

                //获取新名
                var newName = inp.val();
                //执行ajax
                $.ajax('/admin/user/ajaxrename', {
                    type: 'POST',
                    data: {id: id, name: newName},
                    success: function (data) {
                        if (data == '0') {
                            alert('用户名已经存在');
                            td.html(oldName);
                        } else if (data == '1') {
                            td.html(newName);
                        } else {
                            alert('修改失败');
                        }
                    },
                    error: function (data) {
                        alert('数据异常');
                    },
                    dataType: 'json'
                });

                //再绑定一次双击事件
                td.one('dblclick', update);
            });
        }

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
            location.href="/admin/user/delete/"+id;
        });

    </script>

@endsection
