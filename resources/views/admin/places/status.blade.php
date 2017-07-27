@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            加盟商管理
            <small>加盟商列表</small>
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
                        <h3 class="box-title">加盟商列表</h3>&nbsp;&nbsp;&nbsp;&nbsp;
                        是否需要审核：
                        @if($status)
                            <a id="isstatus" href="javascript:" title="仅在本次操作之后注册的商户不需要审核">是</a>
                        @else
                            <a id="isstatus" href="javascript:" title="仅在本次操作之后注册的商户需要审核">否</a>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-danger">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="/admin/shopuser/status" method="get">
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
                                <th>加盟商名</th>
                                <th>Email</th>
                                <th>手机号</th>
                                <th>公司名</th>
                                <th>地址</th>
                                <th>营业执照</th>
                                <th style="width: 150px;">审核</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key=>$value)
                            <tr class="parent">
                                <td class="ids">{{ $value->id  }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->dname }}</td>
                                <td>{{ $value->address }}</td>
                                <td>
                                    <a href="{{ url('/uploads/shoper/license/'.$value->license) }}">
                                        <img src="{{ asset('/uploads/shoper/license/'.$value->license) }}" width="100px">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/admin/shopuser/status/'.$value->id) }}">通过</a>
                                    <a class="btn btn-danger status-no" href="javascript:" data-toggle="modal" data-target="#myModal">驳回</a>
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

        // 是否审核
        $('#isstatus').on('click', function(){
            $.ajax('/admin/shopuser/isstatus', {
                dataType: 'JSON',
                type: 'POST',
                success: function(data)
                {
                    if(data == 1)
                    {
                        $('#isstatus').html('是');
                        $('#isstatus').attr('title', '仅在本次操作之后注册的商户不需要审核');
                    }else
                    {
                        $('#isstatus').html('否');
                        $('#isstatus').attr('title', '仅在本次操作之后注册的商户需要审核');
                    }
                },
                error: function()
                {
                    alert('数据异常，稍后重试');
                }
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
                    <h4 class="modal-title" id="myModalLabel">输入驳回原因</h4>
                </div>
                <form action="{{ url('') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="info alert alert-danger hidden"></div>
                        <input type="text" name="con" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-status-no">驳回</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // 驳回
        var id=0;
        $(".status-no").click(function(){
            id=$(this).parents('.parent').find('.ids').html();
            $('#myModal').find('form').attr('action', '{{ url('/admin/shopuser/status') }}/'+id);
        });

        $('#myModal').find('form').on('submit', function(){
            var con = $(this).find('[name="con"]').val();
            if(con.replace(/[\s]/, '').length == 0)
            {
                $(this).find('.info').html('请填写驳回原因！');
                $(this).find('.info').removeClass('hidden');
                return false;
            }
        });
    </script>
@endsection