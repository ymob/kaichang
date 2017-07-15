@extends('home.usercenter.layout');
@section('header')
    <style>
        .order-title {
            border:1px solid #e3eaee;
            /*padding:5px 0;*/
            font-size:14px;
            color:#001f3b;
            height:40px;
            width:715px;
        }
        a{
            text-decoration:none;
            color:#333;
        }
        .order-title li{
            cursor:pointer;
            float:left;
            padding:5px 34px;
            border-right:1px solid  #e3eaee;
            position:relative;
            height:40px;
        }
       a:hover{
            color:#007bb6;
            font-size:105%;
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
        }
    </style>
@endsection()
@section('con')

    <ul class="order-title">
      <li><a href="#" class="sta">全部订单</a></li>
      <li><a href="#" class="sta">未付款</a></li>
      <li><a href="#" class="sta">未接单</a></li>
      <li><a href="#" class="sta">使用中</a></li>
      <li><a href="#" class="sta">定单取消</a></li>
      <li><a href="#" class="sta">使用完成</a></li>
    </ul>

  <table class="style-table " style="margin-top: 50px;">
      <tr class="style-tr">

          <th class="style-td">编号</th>
          <th class="style-td">商家</th>
          <th class="style-td">价格</th>
          <th class="style-td">状态</th>
          <th class="style-td">详情</th>
      </tr>
      @foreach($data as $key=>$val)
      <tr>

          <td class="style-td">{{$val->number}}</td>
         <td class="style-td">{{$val->keepername}}</td>
          <td class="style-td">{{$val->price}}</td>
          <td class="style-td">
              @if($val->status==1)
                  未付款
              @elseif($val->status==2)
                  未接单
              @elseif($val->status==3)
                  使用中
              @elseif($val->status==4)
                  定单取消
              @elseif($val->status==5)
                  使用完成
              @endif
          </td>
          <td class="style-td">1</td>

      </tr>
      @endforeach

  </table>
    {{ $data->appends($request)->links() }}

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
                case '未付款':
                    location.href="/usercenter/order/1";
                    break;
                case '未接单':
                    location.href="/usercenter/order/2";
                    break;
                case '使用中':
                    location.href="/usercenter/order/3";
                    break;
                case '定单取消':
                    location.href="/usercenter/order/4";
                    break;
                case '使用完成':
                    location.href="/usercenter/order/5";
                    break;
            }
        });

    </script>
@endsection

