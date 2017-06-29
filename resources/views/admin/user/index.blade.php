@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>用户列表</small>
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
                        <h3 class="box-title">用户列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="/admin/user/index" method="get">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="num" class="form-control">
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
                                <th>用户名</th>
                                <th>权限</th>
                                <th>头像</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key=>$value)
                            <tr class="parent">
                                <td class="ids">{{ $value->id  }}</td>
                                <td class="name">{{ $value->name }}</td>
                                <td>{{ $value->auth }}</td>
                                <td>
                                    <img style="width:50px;height:50px;" src="/uploads/adminUser/{{ $value->pic }}" alt="">
                                </td>
                                <td>编辑 删除</td>
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

        $(".name").on('dblclick',function(){

            var td=$(this);

            //获取id
            var id=$(this).parent('.parent').find('.ids').html();

            //获取原来的值
            var oldName=$(this).html();

            var inp=$("<input type='text'>");
            inp.val(oldName);
            $(this).html(inp);

            inp.on('blur',function(){

                //获取新名
                var newName=inp.val();
                //执行ajax
                $.ajax('/admin/user/ajaxrename',{
                    type:'POST',
                    data:{id:id,name:newName}
                    success:function(data){
                        if(data=='0')
                        {
                            alert('用户名已经存在');
                            td.html(oldName);
                        }else if(data=='1')
                        {
                            td.html(newName);
                        }else
                        {
                            alert('修改失败');
                        }
                    },
                    error:function(data){
                        alert('数据异常');
                    },
                    dataType:'json'
                });
                td.one('dblclick');
            });
        });

    </script>
@endsection