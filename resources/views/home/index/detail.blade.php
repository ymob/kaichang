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
                <li class="active">北京四川五粮液龙爪树宾馆</li>
            </ol>
        </div>
        <div id="all_con" class="container">
            <div>
                <h3>北京四川五粮液龙爪树酒店 <small> 北京是朝阳区小红门录龙爪树北里312号</small></h3>
                <p>
                    <span>场地类型：</span>
                    <span>酒店会场 </span>&nbsp;&nbsp;&nbsp;
                    <span>联系电话：</span>
                    <span>13513513511</span>
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
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
                        </div>
                        <div>
                            <h1>500</h1>
                            <span>会场数量</span>
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
                                <img src="./home/images/tu1.png" alt="...">
                                <div class="carousel-caption">
                                    场地1
                                </div>
                            </div>
                            <div class="item">
                                <img src="./home/images/tu1.png" alt="...">
                                <div class="carousel-caption">
                                    场地2
                                </div>
                            </div>
                            <div class="item">
                                <img src="./home/images/tu1.png" alt="...">
                                <div class="carousel-caption">
                                    场地3
                                </div>
                            </div>
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
            <div class="detail">
                <div class="detail_nav">
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <b>大宴会厅</b>
                    <p class="pull-right">
                        <span>4.8分</span>
                        <small>/ 5分</small>
                    </p>
                </div>
                <div style="clear: both;"></div>
                <div class="detail_con">
                    <div class="col-xs-3">
                        <img src="{{ asset('/home/images/tu21.png') }}">
                    </div>
                    <div class="col-xs-9">
                        <ol>
                            <li>
                                <span>
                                    <span>会场面积：</span>
                                    <span>1350平方米</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>最多容纳人数：</span>
                                    <span>1400 <a href="">（课桌式）</a> / </span>
                                    <span>1000 <a href="">（宴会式）</a></span> 
                                </span>
                                <span class="pull-right">
                                    <span class="biaoqian">aa</span>
                                    <span class="biaoqian">aa</span>
                                </span> 
                            </li>
                            <li>
                                <span>曾举办活动：</span>
                                <a href="">互联网大会、</a>
                                <a href="">互联网大会</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span>会场配置：会议纸笔、免费茶水、免费WIFI</span>
                                <span class="pull-right">
                                    <span>总成交量：0 |</span>
                                    <span>评论：0</span>
                                </span> 
                            </li>
                            <li>价格：<span class="s_price">￥30万/天</span></li>
                            <li>
                                <span>会议时长：</span>
                                <select name="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                ，共<span class="day">&nbsp;&nbsp;&nbsp;&nbsp;</span>天
                            </li>
                            <li>
                                <span>会议日期：</span>
                                <select name="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                        </ol>
                    </div>
                    <div class="col-xs-3">
                        <ol>
                            <li><span>会议茶歇：</span></li>
                            <li><span>会务客房：</span></li>
                            <li><span>AV设备：</span></li>
                        </ol>
                    </div>
                    <div class="col-xs-9">
                        <ol>
                            <li>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <select name="" id="">
                                    <option value=""> 类 型 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value=""> 价 格 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <span>
                                    数量&nbsp;
                                    <span class="jian">-</span>
                                    <span class="num">1</span>
                                    <span class="jia">+</span>
                                    份
                                </span>
                                入/离时间
                                <select name="" id="">
                                    <option value=""> 请选择 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <select name="" id="">
                                    <option value=""> 类 型 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value=""> 价 格 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <span>
                                    数量&nbsp;
                                    <span class="jian">-</span>
                                    <span class="num">1</span>
                                    <span class="jia">+</span>
                                    份
                                </span>
                                使用时间
                                <select name="" id="">
                                    <option value=""> 请选择 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <button class="btn btn-danger col-xs-offset-9">加入购物车</button>
                            </li>
                        </ol>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="hr-dashed"></div>
            </div>
            <div class="detail">
                <div class="detail_nav">
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <b>大宴会厅</b>
                    <p class="pull-right">
                        <span>4.8分</span>
                        <small>/ 5分</small>
                    </p>
                </div>
                <div style="clear: both;"></div>
                <div class="detail_con">
                    <div class="col-xs-3">
                        <img src="{{ asset('/home/images/tu21.png') }}">
                    </div>
                    <div class="col-xs-9">
                        <ol>
                            <li>
                                <span>
                                    <span>会场面积：</span>
                                    <span>1350平方米</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>最多容纳人数：</span>
                                    <span>1400 <a href="">（课桌式）</a> / </span>
                                    <span>1000 <a href="">（宴会式）</a></span> 
                                </span>
                                <span class="pull-right">
                                    <span class="biaoqian">aa</span>
                                    <span class="biaoqian">aa</span>
                                </span> 
                            </li>
                            <li>
                                <span>曾举办活动：</span>
                                <a href="">互联网大会、</a>
                                <a href="">互联网大会</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span>会场配置：会议纸笔、免费茶水、免费WIFI</span>
                                <span class="pull-right">
                                    <span>总成交量：0 |</span>
                                    <span>评论：0</span>
                                </span> 
                            </li>
                            <li>价格：<span class="s_price">￥30万/天</span></li>
                            <li>
                                <span>会议时长：</span>
                                <select name="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                ，共<span class="day">&nbsp;&nbsp;&nbsp;&nbsp;</span>天
                            </li>
                            <li>
                                <span>会议日期：</span>
                                <select name="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                        </ol>
                    </div>
                    <div class="col-xs-3">
                        <ol>
                            <li><span>会议茶歇：</span></li>
                            <li><span>会务客房：</span></li>
                            <li><span>AV设备：</span></li>
                        </ol>
                    </div>
                    <div class="col-xs-9">
                        <ol>
                            <li>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <select name="" id="">
                                    <option value=""> 类 型 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value=""> 价 格 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <span>
                                    数量&nbsp;
                                    <span class="jian">-</span>
                                    <span class="num">1</span>
                                    <span class="jia">+</span>
                                    份
                                </span>
                                入/离时间
                                <select name="" id="">
                                    <option value=""> 请选择 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <select name="" id="">
                                    <option value=""> 类 型 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <select name="" id="">
                                    <option value=""> 价 格 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <span>
                                    数量&nbsp;
                                    <span class="jian">-</span>
                                    <span class="num">1</span>
                                    <span class="jia">+</span>
                                    份
                                </span>
                                使用时间
                                <select name="" id="">
                                    <option value=""> 请选择 </option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </li>
                            <li>
                                <button class="btn btn-danger col-xs-offset-9">加入购物车</button>
                            </li>
                        </ol>
                    </div>
                </div>
                    <div style="clear: both;"></div>
                    <div class="hr-dashed"></div>
            </div>
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
    </script>
@endsection