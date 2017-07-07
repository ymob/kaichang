@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                广告管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">广告管理</a></li>
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
                    <div class="box box-primary col-md-6">
                       
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/adver/update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()  }}
                           @foreach($data as $key=>$value)
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">广告名称</label>
                                    <input type="text"name="title" value="{{ $value->title }}" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">广告内容</label>
                                   <textarea name="content" style="width:480px; height:100px;resize:none" >{{$value->content}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">广告链接</label>
                                    <input type="text" name="url" value="{{ $value->url }}" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">广告图片</label>
                                    <input type="file"name="pic" value="{{ $value->pic }}" class="form-control" id="exampleInputEmail1" >
                                </div>
                       
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer col-md-offset-5">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                            @endforeach
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

