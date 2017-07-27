@extends('home.usercenter.layout')
@section('header')
    <style>
        /*div{border:1px solid red;}*/
        .comment ul li{height:30px; line-height:30px;}
        .comment ul li:nth-child(1){font-weight:bold;}
        .comment .price{color:red;font-weight:bold;font-size:16px;}
    </style>
@endsection
@section('con')
    <div class="comment">
        <br>
        <div class="row">
            <div class="col-md-2">
                <img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{ $data['pic'] }}" width="110%" alt="">
            </div>
            <div class="col-md-8">
                <ul>
                    <li>
                        场地:{{ $data['pname'] }} &nbsp;&nbsp; 会场:{{ $data['mname'] }}
                    </li>
                    <li>
                        配套服务:
                        @foreach($data['fname'] as $k=>$v)
                            {{ $v }} &nbsp;
                        @endforeach
                    </li>
                    <li>
                        价格: <span class="price">￥{{ $data['price'] }}</span>
                    </li>

                </ul>
            </div>
        </div>
        <div><br></div>
        <div class="col-md-2">
            发表评论:
        </div>
        <form action="{{ url('/home/comment/insert/') }}/{{ $data['mid'] }}" method="get" enctype="multipart/form-data">
        <div class="row">

            <div class="col-md-10">
                    @include('UEditor::head')
                    <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain">

                        </script>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                            });
                        </script>

            </div>
        </div>
    </div>
    <div class="row col-md-offset-4">
        <br>
        <button class="btn btn-primary">提交评论</button>
    </div>
    </form>
@endsection

@section('javascript')
    <script>
        var shopcartPrice = $(".shopcartPrice");
        var shopsum = 0;
        $.each(shopcartPrice,function(i,n){
            shopsum += parseInt($(this).html());
        });
        $(".shopcartTotal").html(shopsum);

        $.each($(".nav-son li"),function(i,n){
            $(this).removeClass('active-nav-son');
        });

        $(".nav-son li").eq(0).addClass('active-nav-son');
    </script>
@endsection

