@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
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
                                        <label>Select</label>
                                        <select name="num" class="form-control">
                                            <option>10</option>
                                            <option>25</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-6">
                                    <div class="input-group input-group">
                                        <input type="text" name="keywords" class="form-control">
                                        <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat">搜索</button>
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
                            <tr>
                                <td>{{ $value->id  }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->auth }}</td>
                                <td>
                                    <img src="/uploads/{{ $value->pic }}" alt="">
                                </td>
                                <td>编辑 删除</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $data->appends(['request'=>$request])->links() }}
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