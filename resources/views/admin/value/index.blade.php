@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                属性值管理
                <small>属性值列表</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">属性值列表 </h3>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if(session('info'))
                                <div class="alert alert-info">
                                    {{ session('info') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-info">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <div class="row">
                                    <form action="/admin/value/index" method="get">
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
                                        <div class="col-md-4">
                                            <div class="input-group input-group">
                                                <input type="text" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
                                                <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-flat">搜索</button>
                                            </span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-md-5 col-md-offset-1">
                                        <form action="/admin/value/insert" method="post">
                                            {{ csrf_field() }}
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h4>属性添加:</h4>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="value">
                                                    </td>
                                                    <td>&nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm">添加</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>属性值(双击修改)</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $key=>$value)
                                    <tr class="parent">
                                        <td class="id">{{ $value->id }}</td>
                                        <td class="value">{{ $value->value }}</td>
                                        <td>
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

        $("[name='my-checkbox']").bootstrapSwitch();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //绑定一次双击事件
        $(".value").one('dblclick',update);

        //双击事件封装函数
        function update() {

            var td = $(this);

            //获取id
            var id = $(this).parent('.parent').find('.id').html();

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
                $.ajax('/admin/value/ajaxRename', {
                    type: 'POST',
                    data: {id: id, value: newName},
                    success: function (data) {
                        if (data == '0') {
                            alert('属性值已经存在');
                            td.html(oldName);
                        } else if (data == '1') {
                            td.html(newName);
                        } else {
                            alert('属性值修改失败');
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

            id=$(this).parents('.parent').find('.id').html();
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
            location.href="/admin/value/delete/"+id;
        });

    </script>

@endsection
