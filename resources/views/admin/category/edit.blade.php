@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                分类管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">分类管理</a></li>
                <li class="active">编辑</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">

                    @if (session('info'))
                        <div class="alert alert-danger">
                            <ul style="color:white;">
                                {{ session('info')  }}
                            </ul>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul style="color:white;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif

                <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑分类</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/category/') }}/{{ $data->id }}" method="post" >
                            {{ method_field('PUT') }}
                            {{ csrf_field()  }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputauth">父分类</label>
                                    <select name="pid" id="exampleInputauth" class="form-control" >
                                        <option value="0">根分类</option>
                                        @foreach($allData as $key=>$value)
                                            <option value="{{ $value->id }}"
                                            @if($data->pid == $value->id)
                                                selected="selected"
                                            @endif
                                            @if($data->id == $value->id)
                                                disabled="disabled"
                                            @endif
                                            >{{ $value->typeName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">分类名</label>
                                    <input type="text" name="typeName" value="{{ $data->typeName }}" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div>
                                    <label for=""><h4>所含属性:</h4></label>
                                    <table class="table table-bordered">
                                        <th>属性</th>
                                        <th>属性ID</th>
                                        <th>操作</th>
                                        @foreach($data->attrs as $k=>$v)
                                            <tr>
                                                <td>{{ $v }}</td>
                                                <td>{{ $data->attrIds[$k] }}</td>
                                                <td><a href="{{ url('/admin/type/deleteAttr') }}/{{ $data->id }}/{{ $data->attrIds[$k] }}">删除</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div>
                                    <label for=""><h4>添加属性:</h4></label>
                                    <table id="vtable" class="table table-bordered">
                                        <th>可选属性</th>
                                        <th>已选属性</th>
                                        <tr>
                                            <td>
                                                @foreach($allAttrs as $val)
                                                    <input class="btn btn-default btn-sm" type="button" value="{{ $val->attrName }}">
                                                @endforeach
                                            </td>
                                            <td><textarea name="addAttr" id="selval" cols="40" rows="10" readonly style="resize:none;"></textarea></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-md-3"></div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        var i = 1;
        $(".btn-default").click(function () {

            var selval = $("#selval").html();
            if(i == 1)
            {
                var addval = selval + $(this).val();
            }else{
                var addval = selval + ',' + $(this).val();
            }
            $("#selval").html(addval);
            i++;
        });
    </script>
@endsection