@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理员管理
            <small>管理员列表</small>
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
                        <h3 class="box-title">管理员列表 </h3>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/admin/user/add') }}"><button class="btn-flat"><i class="fa fa-user-plus"> </i> 管理员添加</button></a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-danger">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="/admin/user/index" method="get">
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
                                <th>管理员名</th>
                                <th>状态</th>
                                <th>头像</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key=>$value)
                            <tr class="parent">
                                <td class="ids">{{ $value->id  }}</td>
                                <td class="name">{{ $value->name }}</td>
                                <td>
                                    @if($value->id != 1)
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="status_show">
                                                @if($value->status == 1)
                                                    启用
                                                @else
                                                    禁用
                                                @endif
                                            </span>&nbsp;
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="status_sel" index="admins" href="javascript:">
                                                        @if($value->status == 1)
                                                            禁用
                                                        @else
                                                            启用
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <img style="width:50px;height:50px;" src="/uploads/adminUser/{{ $value->pic }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ url('/admin/user/edit') }}/{{ $value->id }}">编辑</a>
                                    @if($value->id != 1)
                                    <a href="javascript:" data-toggle="modal" data-target="#myModal" class="del">删除</a>
                                    @endif
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
                            alert('管理员名已经存在');
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


        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });

        // 状态开启关闭
        $('.status_sel').on('click', function(){
            var index = $(this).attr('index');
            var id = $(this).parents('.parent').find('.ids').html();
            var status = $.trim($(this).html());

            $(this).html($(this).parents('.btn-group').find('.status_show').html());
            $(this).parents('.btn-group').find('.status_show').html(status);

            if(status == '禁用')
            {
                var value = 0;
            }else
            {
                var value = 1;
            }

            $.ajax('/admin/user/ajaxrestatus', {
                type: 'POST',
                data: {id: id, table: index, status: value},
                success: function (data) {
                    if(data == 0) {
                        alert('修改失败，稍后重试');
                    }
                },
                error: function (data) {
                    alert('数据异常，稍后重试');
                },
                dataType: 'json'
            });

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