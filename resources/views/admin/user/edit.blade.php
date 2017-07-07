@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
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
                            <h3 class="box-title">编辑管理员</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('/admin/user/update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()  }}
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">密码</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{ decrypt($data->password) }}" 
                                    @if(session('master')->id != 1)
                                        
                                        @if($data->id != session('master')->id)
                                        disabled
                                        @endif

                                    @endif
                                    >
                                </div>
                                @if($data->auth != 1)
                                <div class="form-group">
                                    <label for="exampleInputstatus">用户状态</label>
                                    <select name="status" id="exampleInputstatus">
                                        <option value="1"
                                        @if($data->status == 1)
                                        selected
                                        @endif
                                        >启用</option>
                                        <option value="0"
                                        @if($data->status == 0)
                                        selected
                                        @endif
                                        >禁用</option>
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputFile">上传头像</label>
                                    <input type="file" name="pic" id="exampleInputFile">

                                    <p class="help-block">请选择你的大头贴</p>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
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