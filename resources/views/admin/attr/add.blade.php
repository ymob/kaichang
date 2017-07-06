@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                属性管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">属性管理</a></li>
                <li class="active">添加</li>
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
                            <h3 class="box-title">添加属性</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/attr/insert') }}" method="post" >
                            {{ csrf_field()  }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">属性名</label>
                                    <input type="text" name="attrName" value="" class="form-control" id="exampleInputEmail1" placeholder="请输入属性名">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
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