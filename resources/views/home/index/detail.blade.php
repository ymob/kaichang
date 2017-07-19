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
                <li class="active">{{ $data->title  }}</li>
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
                                    <span class="biaoqian">aa</span>
                                    <span class="biaoqian">aa</span>
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
                            <li>价格：<span class="s_price">￥{{ $v->price }}元/天</span></li>
                            <li>
                                <span>会议时长：</span>
                                <select name="timeLong" style="height:26px;width:60px;">
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
                                    <option value="15">14天以上</option>
                                </select>
                                ，共<span class="day">&nbsp;&nbsp;&nbsp;&nbsp;</span>天
                            </li>
                            <li>
                                <span>会议开始日期：</span>
                                <input type="date" name="startTime" style="height:26px;">
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
                                <li><span>价格 : {{ $val->price }}</span></li>
                            @endforeach
                        </ol>
                        <ol>
                            @foreach($facilities[$k] as $key=>$val)
                                <li style="padding-top:8px;">
                                    <input type="checkbox" name="sel[]" class="checkbox">
                                </li>
                            @endforeach
                        </ol>
                        <div>
                            <li>
                                <button class="btn btn-danger col-xs-offset-10">加入购物车</button>
                            </li>
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
                <div class="col-md-6">
                    <div class="col-xs-6">
                        <img src="./home/images/tu1.png">
                        <ul>
                            <h3>鸟巢</h3>
                            <p>所在地 : 北京市海淀区紫竹院路69号</p>
                            <p>会所数量 : 40最大会所场面积:1352平米</p>
                            <p>最多容纳人数1400</p>
                            <p>联系电话 : 010-84826854</p>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <img src="./home/images/tu1.png">
                        <ul>
                            <h3>鸟巢</h3>
                            <p>所在地 : 北京市海淀区紫竹院路69号</p>
                            <p>会所数量 : 40最大会所场面积:1352平米</p>
                            <p>最多容纳人数1400</p>
                            <p>联系电话 : 010-84826854</p>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-xs-6">
                        <img src="./home/images/tu1.png">
                        <ul>
                            <h3>鸟巢</h3>
                            <p>所在地 : 北京市海淀区紫竹院路69号</p>
                            <p>会所数量 : 40最大会所场面积:1352平米</p>
                            <p>最多容纳人数1400</p>
                            <p>联系电话 : 010-84826854</p>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <img src="./home/images/tu1.png">
                        <ul class="list-unstyled">
                            <h3>鸟巢</h3>
                            <p>所在地 : 北京市海淀区紫竹院路69号</p>
                            <p>会所数量 : 40最大会所场面积:1352平米</p>
                            <p>最多容纳人数1400</p>
                            <p>联系电话 : 010-84826854</p>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end 推荐 -->
            <div class="hr-dashed"></div>
        </div>       
    </article>
@endsection

@section('js')
    <script>

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
        $('.jian').on('click', function(){
            var num = Number($(this).next().html());
            if(num < 2) return;
            $(this).next().html(num - 1);
        });
        $('.jia').on('click', function(){
            var num = Number($(this).prev().html());
            $(this).prev().html(num + 1);
        });

        // 选择会议时长
        $("select[name='timeLong']").on('change',function(){
            var day = '&nbsp;'+$(this).val()+'&nbsp;';
            $(".day").html(day);
        });
    </script>
@endsection