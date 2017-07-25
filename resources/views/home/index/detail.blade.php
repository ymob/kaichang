@extends('home.layout2')

@section('header')
    <link rel="stylesheet" href="/home/css/index/detail.css">
@endsection

@section('con')
    <article>
        <div style="background: #F5F5F5">
            <ol class="breadcrumb container">
                <li><a href="#">首页</a></li>
                <li><a href="#">场地搜索</a></li>
                <li class="active">{{ $data->title }}</li>
            </ol>
        </div>
        <div id="all_con" class="container">
            <div>
                <h3>{{ $data->title  }} <small> {{ $data->address }}</small></h3>
                <p>
                    <span>场地类型：</span>
                    <span>{{ $data->type }} </span>&nbsp;&nbsp;&nbsp;
                    <span>联系电话：</span>
                    <span>{{ $data->phone }}</span>
                </p>
            </div>

            <div id="maodian">
                <ul>
                    <li><a href="#">会场</a></li>
                    <li><a href="#">介绍</a></li>
                    <li><a href="#">评价</a></li>
                </ul>
            </div>
            <br>
            <!-- 统计 轮播图 -->
            <div id="c_b">
                <div id="count" class="col-md-6">
                    <div class="row">
                        <div>
                            <h1>{{ $data->meetNum }}</h1>
                            <span>会场数量</span>
                        </div>
                        <div>
                            <h1>{{ $data->maxArea }}</h1>
                            <span>最大会场面积</span>
                        </div>
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h1><?php echo date('Y-m',$data->created_at) ?></h1>
                            <span>开业时间</span>
                        </div>
                        <div>
                            <h1>{{ $data->maxPeople }}</h1>
                            <span>最多容纳人数</span>
                        </div>
                        <div>
                            <h1><?php echo date('Y-m',$data->updated_at) ?></h1>
                            <span>最近装修</span>
                        </div>
                    </div> 
                </div>
                <div id="banner" class="col-md-6">
                    <!-- 轮播图 -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="{{ url('uploads/shoper/places/places/') }}/{{ $data->pic[0] }}" alt="图片加载失败">
                                <div class="carousel-caption">
                                    场地外景图1
                                </div>
                            </div>
                            @if(isset($data->pic[1]))
                                <div class="item">
                                    <img src="{{ url('uploads/shoper/places/places/') }}/{{ $data->pic[1] }}" alt="图片加载失败">
                                    <div class="carousel-caption">
                                        场地外景图2
                                    </div>
                                </div>
                            @endif
                            @if(isset($data->pic[2]))
                                <div class="item">
                                    <img src="{{ url('uploads/shoper/places/places/') }}/{{ $data->pic[2] }}" alt="图片加载失败">
                                    <div class="carousel-caption">
                                        场地外景图3
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="hr-dashed"></div>
            <!-- 场地详情 -->
            @foreach($meetData as $k=>$v)
            <div class="detail">
                <div class="detail_nav">
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <b>{{ $v->title }}</b>
                    <p class="pull-right">
                        <span>4.8分</span>
                        <small>/ 5分</small>
                    </p>
                </div>
                <div style="clear: both;"></div>
                <div class="detail_con">
                    <div class="col-xs-3">
                        <img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{$v->pic}}">
                    </div>
                    <div class="col-xs-9">
                        <ol>
                            <li>
                                <span>
                                    <span>会场面积：</span>
                                    <span>{{ $v->area }}平方米</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>最多容纳人数：</span>
                                    <span>{{ $v->deskPeople }} <a href="">（课桌式）</a> / </span>
                                    <span>{{ $v->dinnerPeople }} <a href="">（宴会式）</a></span>
                                </span>
                                <span class="pull-right">
                                    <span class="biaoqian">场地方正</span>
                                    <span class="biaoqian">装修精美</span>
                                </span>
                            </li>
                            <li>
                                {{--<span>曾举办活动：</span>--}}
                                {{--<a href="">互联网大会、</a>--}}
                                {{--<a href="">互联网大会</a>--}}
                                <span>可提供免费服务：{{ $v->free }}</span>
                                <span class="pull-right">
                                    <span>总成交量：0 |</span>
                                    <span>评论：0</span>
                                </span>
                            </li>
                            <li>价格：<span class="s_price">￥<span class="mprice">{{ $v->price }}</span> 元/天</span></li>
                            <li>
                                <span>会议时长：</span>
                                <select name="ltime" class="ltime" style="height:26px;width:70px;">
                                    <option value="1">1 天</option>
                                    <option value="2">2 天</option>
                                    <option value="3">3 天</option>
                                    <option value="4">4 天</option>
                                    <option value="5">5 天</option>
                                    <option value="6">6 天</option>
                                    <option value="7">7 天</option>
                                    <option value="8">8 天</option>
                                    <option value="9">9 天</option>
                                    <option value="10">10 天</option>
                                    <option value="11">11 天</option>
                                    <option value="12">12 天</option>
                                    <option value="13">13 天</option>
                                    <option value="14">14 天</option>
                                </select>
                                ，共&nbsp;&nbsp;<span class="day">1</span>&nbsp;&nbsp;天
                            </li>
                            <li>
                                <span>会议开始日期：</span>
                                <input type="date" name="stime" class="stime" style="height:26px;">
                            </li>
                        </ol>
                    </div>
                    {{--配套服务--}}
                    <div class="col-xs-3">
                        <ol>
                            <span class="support">可提供配套服务:</span>
                            @foreach($facilities[$k] as $key=>$val)
                            <li><span>{{ $val->support }}：</span></li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="col-xs-9">
                        <ol>

                            @foreach($facilities[$k] as $key=>$val)
                                <li><span>类型 : {{ $val->type }}</span></li>
                            @endforeach
                        </ol>
                        <ol>
                            @foreach($facilities[$k] as $key=>$val)
                                <li>价格 : <span class="fprice">{{ $val->price }}</span></li>
                            @endforeach
                        </ol>
                        <ol>
                            @foreach($facilities[$k] as $key=>$val)
                                <li style="">
                                  <span>
                                     数量&nbsp;
                                     <span class="jian ope">-</span>
                                     <span class="num">0</span>
                                     <span class="jia ope">+</span>
                                     份
                                  </span>
                                    {{--<input type="checkbox" name="sel[]" class="checkbox">--}}
                                    {{--无 <input type="radio" name="sel{{ $k }}{{ $key }}" value="0" checked >&nbsp;--}}
                                    {{--有 <input type="radio" name="sel{{ $k }}{{ $key }}" value="1">--}}
                                </li>
                            @endforeach
                        </ol>
                        <div>
                            <div class="total"><span>总价 : </span><span class="totalprice">100.00 </span> 元</div>
                            <button class="btn btn-danger col-xs-offset-9 go">加入购物车</button>
                            <span style="display:none;" class="mid">{{ $v->id }}</span>
                            @foreach($facilities[$k] as $key=>$val)
                                <span style="display:none;" class="fid">{{ $val->id }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="hr-dashed"></div>
            </div>
            @endforeach

            <!-- end 场地详情 -->

            <!-- 评论 -->
            <div id="comment">
                <div class="comment_nav">
                    <b>评论详情（222）</b>
                    <span>场地总评分<span>4.7</span>分，共2333次打分</span>
                </div>
                <div class="comment_con row">
                    <div class="col-xs-2">
                        <img src="{{ asset('/home/images/order_2.png') }}">
                        <p class="">183大酒店</p>
                    </div>
                    <div class="col-xs-10 ">
                        <div class="con">
                            很宽敞 <br> 
                            场地工作人员服务很好 <br> 
                        <img src="{{ asset('/home/images/order_2.png') }}">
                        </div>
                        <div class="good">
                            <span>所用场地：第一会议</span>
                            <span>会议人数：200</span>
                            <span>会议类型：新闻发布会</span>
                        </div>
                    </div>
                </div>
                <div class="comment_con row">
                    <div class="col-xs-2">
                        <img src="{{ asset('/home/images/order_2.png') }}">
                        <p class="">183大酒店</p>
                    </div>
                    <div class="col-xs-10 ">
                        <div class="con">
                            很宽敞 <br> 
                            场地工作人员服务很好 <br> 
                        <img src="{{ asset('/home/images/order_2.png') }}">
                        </div>
                        <div class="good">
                            <span>所用场地：第一会议</span>
                            <span>会议人数：200</span>
                            <span>会议类型：新闻发布会</span>
                        </div>
                    </div>
                </div>
                <div id="comment_btn">
                    <button class="btn btn-info center-block">查看更多评论</button>
                </div>
            </div>
            <!-- end 评论 -->

            <!-- 推荐 -->
            <div id="commend" class="row">
                <div class="col-md-12">
                    @foreach($adver as $k=>$v)
                     <div class="col-xs-3">
                        <a href=""><img style="width:250px;height:250px;" src="{{ url('uploads/shoper/places/places') }}/{{$v->pic}}"></a>
                        <ul>
                            <h3>{{$v->title}}</h3>
                            <p>所在地 : {{$v->address}}</p>
                            <p>最大会所场面积:{{$v->maxArea}}平米</p>
                            <p>最多容纳人数{{$v->maxPeople}}</p>
                            <p>联系电话 : {{$v->phone}}</p>
                        </ul>
                    </div>
                    @endforeach
                   
                </div>
                
            </div>
            <!-- end 推荐 -->
            <div class="hr-dashed"></div>
        </div>       
    </article>
@endsection

@section('js')
    <script>

        // 会场下拉的展开与收缩
        $(".detail_con").eq(0).css('display','block');
        $(".detail_nav").eq(0).find('span').eq(0).toggleClass('glyphicon-triangle-bottom');
        $(".detail_nav").eq(0).find('span').eq(0).toggleClass('glyphicon-triangle-right');

        $('.detail_nav').on('click', function(){
            var status =  $(this).next().next().css('display');
            var ico = $(this).find('span').eq(0);
            if(status == 'none')
            {
                ico.toggleClass('glyphicon-triangle-bottom');
                ico.toggleClass('glyphicon-triangle-right');
                $(this).next().next().css('display', 'block');
            }else
            {
                ico.toggleClass('glyphicon-triangle-bottom');
                ico.toggleClass('glyphicon-triangle-right');
                $(this).next().next().css('display', 'none');
            }
        });

        // 加减按钮
        $('.jian').on('click', function(){
            var num = Number($(this).next().html());
            if(num < 1) return;
            $(this).next().html(num - 1);
        });
        $('.jia').on('click', function(){
            var num = Number($(this).prev().html());
            $(this).prev().html(num + 1);
        });

        // 选择会议时长并填充
        $("select[name='ltime']").on('change',function(){
            var day = $(this).val();
            $(this).parents(".detail").find(".day").html(day);

            var smprice = $(this).parents(".detail").find(".mprice").html();
            var totalprice = parseInt(smprice)*$(this).val();
            $(this).parents(".detail").find(".totalprice").html(totalprice);

            var nums = $(this).parents(".detail").find(".num");
            $.each(nums,function(i,n){
                $(this).html(0);
            });
        });

        // 计算会场总价
        var mprice = $(".mprice");
        // 所选配套服务id
        var fid = [];

        $.each(mprice,function(i,n){

            var mprice1 = $(this).html();
            $(this).parents(".detail").find(".totalprice").html(mprice1);
            var opes = $(this).parents(".detail").find(".ope");

            $(this).parents(".detail").find(".ope").on('click',function(){

                var index = opes.index($(this));
                //ope是1的时候表示加上价格;是0表示减去价格
                var ope = index%2;
                //low是当前选中的加减按钮所在行数
                var low = Math.floor(index/2);

                if(ope == 1)
                {
                    var mprice2 = $(this).parents(".detail").find(".totalprice").html();
                    var fprice = $(this).parents(".detail").find(".fprice").eq(low).html();
                    var day =$(".day").html();
                    var total = parseInt(mprice2)+parseInt(fprice)*day;
                    $(this).parents(".detail").find(".totalprice").html(total);

                    fid.push($(this).parents(".detail").find(".fid").eq(low).html());
                }
                if(ope == 0)
                {
                    var mprice2 = $(this).parents(".detail").find(".totalprice").html();
                    var fprice = $(this).parents(".detail").find(".fprice").eq(low).html();
                    var day =$(".day").html();
                    var total = parseInt(mprice2)-parseInt(fprice)*day;
                    if(total < $(this).parents(".detail").find(".mprice").html()*day)
                    {
                        return false;
                    }
                    $(this).parents(".detail").find(".totalprice").html(total);

                    var mfid = $(this).parents(".detail").find(".fid").eq(low).html();
                    fid.splice($.inArray(mfid,fid),1);
                }

            });

        });

        // 添加到购物车
        $(".go").on('click',function(){

            var mid = $(this).parents(".detail").find(".mid").html();
            var price = $(this).parents(".detail").find(".totalprice").html();
            var stime = $(this).parents(".detail").find(".stime").val();
            var ltime = $(this).parents(".detail").find(".ltime").val();
            console.log(price);
            if(ltime == 0)
            {
                alert('请选择会场租用时长!');
                return false;
            }
            if(!stime)
            {
                alert('请选择会场租用开始时间!');
                return false;
            }

            $.ajax('/shopcart/add',{
                "type":'GET',
                "data":{mid:mid, fids:fid, stime:stime, ltime:ltime, price:price},
                "success":function(data){
                    console.log(data);
                    location.href='';
                },
                "error":function(){
                    alert('数据异常');
                },
                "dataType":"json"
            });

        });

    </script>
@endsection