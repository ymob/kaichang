@extends('home.layout2')

@section('header')
    <link rel="stylesheet" href="{{ asset('/home/css/index/index2.css') }}">
    <style>
        #title1{font-weight:bold;}
        .shopcartDel:hover{color:red;}
    </style>
@endsection

@section('con')
    <div class="row bg-progress">
        <div class="col-md-2 "></div>
        <div class="col-md-8" ><span>首页 > 购物车</span></div>
        <div class="col-md-2"></div>
    </div>
    <div style="height:30px;"></div>
    <div class="row order-title">
        <div class="col-md-2 "></div>
        <div class="col-md-8"id="title1"><span>购物车</span></div>
        <div class="col-md-2"></div>
    </div>
    <div class="row order-head">
        <div class="col-md-2 "></div>
        <div class="col-md-8"id="title2">
            <div class="col-md-2 ">商家会场</div>
            <div class="col-md-2 ">会场名称</div>
            <div class="col-md-2 ">所属场地</div>
            <div class="col-md-2 ">配套服务</div>
            <div class="col-md-2 ">小计</div>
            <div class="col-md-2 ">操作</div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row order-name"></div>

    @if(isset($shopcart))
    @foreach($shopcart as $k=>$v)
        <div class="row order-detail">
            <div class="col-md-2 "></div>
            <div class="col-md-8 "id="title3">
                <div class="col-md-2 ">
                    <div class="left">
                        <img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{ $v['pic'] }}" width="40" height="40px">
                    </div>
                    <div class="left">
                        <div class="describe"><span>场地方正</span></div>

                    </div>
                </div>
                <div class="col-md-2 ">{{ $v['mname'] }}</div>
                <div class="col-md-2 ">{{ $v['pname'] }}</div>
                <div class="col-md-2 ">
                    @if(isset($v['fname']))
                        @foreach($v['fname'] as $key=>$val)
                            {{ $val }} &nbsp;
                        @endforeach
                    @endif
                </div>
                <div class="col-md-2 shopcartPrice">{{ $v['price'] }}</div>
                <div class="col-md-2 "><a href="{{ url('/shopcart/delete') }}/{{ $v['started_at'] }}" class="shopcartDel">删除</a></div>
            </div>
            <div class="col-md-2"></div>
        </div>
    @endforeach
    @endif

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 total">
            <div class="col-md-3 col-md-offset-9">总计: ¥<span class="shopcartTotal"></span></div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="col-md-3 col-md-offset-9"><a class="btn btn-danger" href="{{ url('/home/order/order') }}" role="button" style="color:white;">&nbsp;去结算&nbsp;</a></div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div style="height:50px;"></div>

@endsection

@section('javascript')
    <script>
        var shopcartPrice = $(".shopcartPrice");
        var shopsum = 0;
        $.each(shopcartPrice,function(i,n){
            shopsum += parseInt($(this).html());
        });
        $(".shopcartTotal").html(shopsum);
    </script>
@endsection