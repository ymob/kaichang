@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                属性管理
                <small>编辑</small>
            </h1>
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
                            <h3 class="box-title">编辑属性</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/attr/update') }}" method="post">
                            {{ csrf_field()  }}
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><h4>属性名称:</h4></label>
                                    <input type="text" name="attrName" value="{{ $data->attrName }}" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div>
                                    <label for=""><h4>所含属性值:</h4></label>
                                    <table class="table table-bordered">
                                        <th>属性值</th>
                                        <th>属性值ID</th>
                                        <th>操作</th>
                                        @foreach($data->value as $k=>$v)
                                            <tr>
                                                <td>{{ $v }}</td>
                                                <td>{{ $data->valueId[$k] }}</td>
                                                <td><a href="{{ url('/admin/attr/deleteval') }}/{{ $data->id }}/{{ $data->valueId[$k] }}">删除</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div>
                                    <label for=""><h4>添加属性值:</h4></label>
                                    <table id="vtable" class="table table-bordered">
                                        <th>可选属性值</th>
                                        <th>已选属性值</th>
                                        <tr>
                                            <td>
                                                @foreach($values as $val)
                                                    <input class="btn btn-default btn-sm" type="button" value="{{ $val->value }}">
                                                @endforeach
                                            </td>
                                            <td><textarea name="addval" id="selval" cols="40" rows="10" readonly style="resize:none;"></textarea></td>
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