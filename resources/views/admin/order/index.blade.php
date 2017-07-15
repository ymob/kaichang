@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            订单管理
            <small>订单列表</small>
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
                        <h3 class="box-title">定单列表 </h3>&nbsp;&nbsp;&nbsp;&nbsp;

                    </div>    
    
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="/admin/order/index/{{ $status }}" method="get" id="form">
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
                               
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group">
                                        <!-- <input type="text" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">搜索</button>
                                        </span> -->
                                        <button type="button" class="btn btn-default sta">全部订单</button>
                                        <button type="button" class="btn btn-default sta">未付款</button>
                                        <button type="button" class="btn btn-default sta" >未接单</button>
                                        <button type="button" class="btn btn-default sta">使用中</button>
                                        <button type="button" class="btn btn-default sta">定单取消</button>
                                        <button type="button" class="btn btn-default sta">使用完成</button>
                                       
                                    </div>

                                </div>
                            </div>
                        </form>


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            
                                <th class="text-center">ID</th>
                                <th class="text-center">订单号</th>
                                <th class="text-center">加盟商名称</th>
                                <th class="text-center">商品名称</th>
                                <th class="text-center">商品属性</th>
                                <th class="text-center">订单状态</th>
                                <th class="text-center">定单开始时间</th>
                                <th class="text-center">定单结束时间</th>
                            </thead>
                            <tbody>
                            <!-- 遍历 -->

                            @foreach($data as $key=>$value)
                           
                            <tr class="parent text-center" width="800px">
                                <td class="ids">{{ $value->id}}</td>
                                <td class="name">{{ $value->number }}</td>
                                <td class="name">{{ $value->number }}</td>
                                <td class="name">{{ $value->goodsname }}</td>
                                <td class="name">{{ $value->value }}</td>
                                <td class="name">
                                @if($value->status==1)
                                未付款 
                                @elseif($value->status==2)
                                未接单
                                @elseif($value->status==3)
                                使用中
                                @elseif($value->status==4)
                                定单取消
                                @elseif($value->status==5)
                                使用完成
                                @endif
                                </td>
                                <td class="name">{{ $value->created_at}}</td>
                                <td class="name">{{ $value->ended_at}}</td>
                            
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

        //全局变量
        var id=0;

        $(".del").click(function(){

            id=$(this).parents('.parent').find('.ids').html();
        });


        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });

        //根据定单状态的筛选
          $(".sta").on('click', function(){
            switch($(this).html())
            {   
                case '全部订单':
                    location.href="/admin/order/index/0";
                break;
                case '未付款':
                    location.href="/admin/order/index/1";
                break;
                case '未接单':
                    location.href="/admin/order/index/2";
                break;
                case '使用中':
                    location.href="/admin/order/index/3";
                break;
                case '定单取消':
                    location.href="/admin/order/index/4";
                break;
                case '使用完成':
                    location.href="/admin/order/index/5";
                break;
            }
        });

    </script>
@endsection

@section('modaljs')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">提示信息</h4>
                </div>
                <div class="modal-body">
                    确定要删除吗?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="del">确认</button>
                </div>
            </div>
        </div>
    </div>

    <script !src="">

        $("#del").click(function(){
            location.href="/admin/adver/delete/"+id;
        });


    </script>
@endsection

