@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                分类管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">分类管理</a></li>
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
                            <h3 class="box-title">添加分类</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/category') }}" method="post" >
                            {{ csrf_field()  }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputauth">父分类</label>
                                    <select name="pid" id="exampleInputauth" class="form-control">
                                        <option value="0">根分类</option>
                                        @foreach($data as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->typeName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">分类名</label>
                                    <input type="text" name="typeName" value="{{ old('typeName')  }}" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名">
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