@extends('admin.layout')

@section('head')
     <style>
        .order-title {
            border:1px solid #e3eaee;
            font-size:14px;
            color:#001f3b;
            height:40px;
            width:715px;
            border-right:1px solid  #e3eaee;
             /*border-radius: 10px;*/
        }
        .order-title li{
            cursor:pointer;
            float:left;
            padding:5px 28px;
            border-right:1px solid #e3eaee;
            position:relative;
            height:40px;
            line-height:30px;
            list-style: none;
        }
        .order-title li:hover{
            color:cornflowerblue;
            background:aliceblue;
        }
         .style-table
        {
             border:1px solid #e3eaee;
             width:715px;
        }
        .style-td{
            font-size:16px;
            font-family:serif,Times;
            color:#001f3b;
            border:1px solid  #e3eaee;
            text-align:center;
        }
        td{
            height:20px;
            line-height:10px;
        }
        td a:hover{
            color:cornflowerblue;
        }
        .myorder{
          width:100px;
          height:10px;
          margin:30px;
          font-size:20px;
        }
    </style>
@endsection
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
    
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif
                                
                                <div>
                                <ul class="order-title">
                                  <li class="cur sta" >全部订单</li>
                                  <li class="cur sta">商家未接单</li>
                                  <li class="cur sta">未付款</li>
                                  <li class="cur sta">交易中</li>
                                  <li class="cur sta">交易完成</li>
                                  <li class="cur sta" style="border-right:none">交易取消</li>
                                </ul>
                                </div> 
                                <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            
                                  <th class="style-td">编号</th>
                                  <th class="style-td">会场</th>
                                  <th class="style-td">详情</th>
                                  <th class="style-td">价格</th>
                                  <th class="style-td">状态</th>
                           
                            </thead>
                            <tbody>
                            <!-- 遍历 -->
                            @foreach($data as $key=>$val)

                            <!-- 显示没有放入回收站的评论 -->
                        
                           
                            <tr class="parent" width="800px">
                                  <td class="style-td">{{$val['number']}}</td>
                                  <td class="style-td">
                                      <a href="{{ url('/detail/pid=') }}{{ $val['pid'] }}" target="_blank">
                                      <img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{ $val['pic'] }}" alt="" height="50" width="50">
                                      </a>
                                  </td>
                                  <td class="style-td">
                                    {{ $val['pname'] }}&nbsp;{{$val['mname']}}<br>
                                      @if(isset($val['fname']))
                                          @foreach($val['fname'] as $k=>$v)
                                              {{ $v }}
                                          @endforeach
                                      @endif
                                  </td>
                                  <td class="style-td">{{$val['price']}}</td>
                                  <td class="style-td">
                                  @if($val['status']==1)
                                      商家未接单
                                  @elseif($val['status']==2)
                                      未付款
                                  @elseif($val['status']==3)
                                      交易中
                                  @elseif($val['status']==4)
                                      交易完成
                                  @elseif($val['status']==5)
                                      交易取消
                                  @endif
                              </td>
                            </tr>
                            
                           

                            @endforeach

                            </tbody>
                        </table>

                      
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
                case '商家未接单':
                    location.href="/admin/order/index/1";
                break;
                case '未付款':
                    location.href="/admin/order/index/2";
                break;
                case '交易中':
                    location.href="/admin/order/index/3";
                break;
                case '交易完成':
                    location.href="/admin/order/index/4";
                break;
                case '交易取消':
                    location.href="/admin/order/index/5";
                break;
            }
        });

    </script>
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
                    location.href="/usercenter/order/0";
                    break;
                case '商家未接单':
                    location.href="/usercenter/order/1";
                    break;
                case '未付款':
                    location.href="/usercenter/order/2";
                    break;
                case '交易中':
                    location.href="/usercenter/order/3";
                    break;
                case '交易完成':
                    location.href="/usercenter/order/4";
                    break;
                case '交易取消':
                    location.href="/usercenter/order/5";
                    break;
            }
        });

         $(".cur").click(function(){
      // alert(111);
        $(this).addClass("current").siblings().removeClass("current");
    });

    </script>
@endsection

