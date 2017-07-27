@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                二维码管理
                <small>修改二维码</small>
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
                    <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            
                                <th class="text-center">ID</th>
                                <th class="text-center">名称</th>
                                <th class="text-center">二维码</th>
                                <th class="text-center">操作</th>
                            </thead>
                            <tbody>
                            <!-- 遍历 -->
                            @foreach($data as $key=>$value)

                        

                            <tr class="parent" width="800px" style="text-align:center">
                                <td class="ids">{{$value->id}}</td>
                                <td class="name">{{ $value->pic}}</td>
                                <td class="pic"> <img src="{{ url('uploads/code') }}/{{ $value->pic}}" alt="" height="50" width="50"></td>
                                <td><a href="#" class="update">修改</a></td>
                            </tr>
                          
                            @endforeach

                            </tbody>
                        </table>
                <!-- general form elements -->
                    <div class="box box-primary col-md-6 change hidden" >
                        <form role="form" action="{{url('/admin/code/update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()  }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">修改</label>
                                    <input type="file"name="pic" value="" class="form-control" id="exampleInputEmail1" >
                                </div>
                       
                            </div>
                            <div class="box-footer col-md-offset-5">
                                <button type="submit" class="btn btn-primary">提交</button>
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
    <script type="text/javascript">
        $('.update').on('click',function(){
            $(".change").removeClass('hidden');
        });
    </script>
@endsection

