@extends('home.layout2')

@section('header')
    <link rel="stylesheet" href="/home/css/index/details.css">
@endsection

@section('con')
    <div class="bg-gray">
        <div class="title col-md-8 col-md-offset-2">首页 > 场地搜索 > 北京四川五粮液龙爪树宾馆</div>
    </div>
    <div class="col-md-8 col-md-offset-2">

        <div class="margin-top">

            <div id="top1">
                <div class="a_content_title">
                    <div class="a_share">
                        <button class="btn btn-danger">分享到</button>
                        <button class="btn btn-danger">+加关注</button>
                    </div>
                    <div class="left">
                        北京四川五粮液
                    </div>
                    <div class="left">
                        北京朝阳区小红门
                    </div>
                    <br><br>
                    <ul>
                        <li>
                            场地类型 : 酒店类型
                        </li>
                        <li>&nbsp;&nbsp;</li>
                        <li>
                            联系电话 : 010-8585858
                        </li>
                    </ul>

                </div>


            </div>
            <!--banner-->

            <!--选项卡-->
            <div>
                <!--标题-->
                <div class="search_title">
                    <ul>
                        <li><a href="">会场</a></li>
                        <li><a href="">介绍</a></li>
                        <li><a href="">评价</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="banner">
                    <div class="a_banner_left">
                        <ul>
                            <li><h1>5</h1><span>会场数量</span></li>
                            <li><h1>200</h1><span>会场面积</span></li>
                            <li><h1>1998</h1><span>开业时间</span></li>
                            <li><h1>200</h1><span>客房数量</span></li>
                            <li><h1>200</h1><span>容纳人数</span></li>
                            <li><h1>2016</h1><span>最近装修</span></li>
                        </ul>
                    </div>
                    <div>
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
                                    <img src="./home/images/tu1.png" alt="..." style="width:700px;height:350px;">
                                    <div class="carousel-caption">
                                        场地1
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="./home/images/tu21.png" alt="..." style="width:700px;height:350px;">
                                    <div class="carousel-caption">
                                        场地2
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="./home/images/tu21.png" alt="..." style="width:700px;height:350px;">
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
            </div>
            <!--搜索结果-->
            <div class="seek_result">
                <!--结果展示-->
                <div class="seek_result_show">
                    <!--按什么排行-->

                    <!--按什么显示-->
                    <div class="a_show">
                        <ul class="list-unstyled">
                            <!--第一条-->
                            <li>
                                <div class="search_title" style="margin:0 auto;">
                                    <h4>大宴会厅</h4>
                                    <div class="s_grade"><span>4.8分</span>/5分</div>
                                </div>
                                <div>
                                    <div class="pos1 left">
                                        <img src="./home/images/tu1.png" alt="" height="250px" width="300px">
                                    </div>
                                    <div class="pos2 left border">
                                        <ol class="list-unstyled s_main">
                                            <li>场地面积 : 2000M(50*40*6M)</li>
                                            <li>最多容纳人数 : 1000人</li>
                                            <li>会场配置: 会议纸笔 免费茶水 免费WIFI</li>
                                            <li>曾举办活动: <a href="">互联网大会</a></li>
                                            <li>价格 : <span class="s_price">￥30万/天</span></li>
                                            <li>会议时长:
                                                <select name="" id="">
                                                    <option value="">请选择</option>
                                                </select>
                                                <span>  ,共____天</span>
                                            </li>
                                            <li>会议日期
                                                <input type="date">
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="right s_main2">
                                        <ul>
                                            <li><a href="">场地方正</a></li>
                                            <li><a href="">装修精美</a></li>
                                        </ul>
                                        <ul>
                                            <li>总成交量: 5888 </li>
                                            <li>&nbsp;&nbsp;</li>
                                            <li>评论: 666 </li>
                                        </ul>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div>
                                        <table border="1" width="800px">
                                            <tr>
                                                <th>会议茶歇:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>会务客房:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>AV设备:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="right"><span class="s_reserve"><button class="btn btn-danger">添加购物车</button></span></div>
                                </div>
                                <div style="clear:both;"></div>
                            </li>

                            <!--第二条-->
                            <li>
                                <div class="search_title" style="margin:0 auto;">
                                    <h4>休息室</h4>
                                    <div class="s_grade"><span>4.8分</span>/5分</div>
                                </div>
                                <div>
                                    <div class="pos1 left">
                                        <img src="./home/images/tu1.png" alt="" height="250px" width="300px">
                                    </div>
                                    <div class="pos2 left border">
                                        <ol class="list-unstyled s_main">
                                            <li>场地面积 : 2000M(50*40*6M)</li>
                                            <li>最多容纳人数 : 1000人</li>
                                            <li>会场配置: 会议纸笔 免费茶水 免费WIFI</li>
                                            <li>曾举办活动: <a href="">互联网大会</a></li>
                                            <li>价格 : <span class="s_price">￥30万/天</span></li>
                                            <li>会议时长:
                                                <select name="" id="">
                                                    <option value="">请选择</option>
                                                </select>
                                                <span>  ,共____天</span>
                                            </li>
                                            <li>会议日期
                                                <input type="date">
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="right s_main2">
                                        <ul>
                                            <li><a href="">场地方正</a></li>
                                            <li><a href="">装修精美</a></li>
                                        </ul>
                                        <ul>
                                            <li>总成交量: 5888 </li>
                                            <li>&nbsp;&nbsp;</li>
                                            <li>评论: 666 </li>
                                        </ul>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div>
                                        <table border="1" width="800px">
                                            <tr>
                                                <th>会议茶歇:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>会务客房:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>AV设备:</th>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">类型</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" id="">
                                                        <option value="">价格</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    数量
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="right"><span class="s_reserve"><button class="btn btn-danger">添加购物车</button></span></div>
                                </div>
                                <div style="clear:both;"></div>
                            </li>

                        </ul>
                    </div>
                    <!--分页-->
                </div>
                <!--推荐-->
            </div>
            <div class="a_comment">
                <div class="search_title">
                    <p><span class="a_h3">评论详情(325321) </span> 场地总评分<span class="f_color" >4.7分</span>，共2355次打分</p>
                </div>
                <div class="a_section">
                    <ol class="list-unstyled">
                        <li>
                            <dl class="dl-horizontal">
                                <dt>
                                    <img src="./home/images/tu1.png" alt="" width="50px;">
                                <h5>shihaojun</h5>
                                </dt>
                                <dd>
                                    <ul class="list-unstyled">
                                        <li>房子和合适 颜色很行看水水水水水水水水水水水水水水水水水水水顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</li>
                                        <li><img src="./home/images/tu5.png" alt="" width="40px">   <img src="./home/images/tu5.png" alt="" width="40px;"></li>
                                        <li>所以场地 : 第一会议室 会议人数 : 200 会议类型新闻发布会</li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="dl-horizontal">
                                <dt>
                                    <img src="./home/images/tu1.png" alt="" width="50px;">
                                <h5>shihaojun</h5>
                                </dt>
                                <dd>
                                    <ul class="list-unstyled">
                                        <li>房子和合适 颜色很行看水水水水水水水水水水水水水水水水水水水顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</li>
                                        <li><img src="./home/images/tu5.png" alt="" width="40px">   <img src="./home/images/tu5.png" alt="" width="40px;"></li>
                                        <li>所以场地 : 第一会议室 会议人数 : 200 会议类型新闻发布会</li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="dl-horizontal">
                                <dt>
                                    <img src="./home/images/tu1.png" alt="" width="50px;">
                                <h5>shihaojun</h5>
                                </dt>
                                <dd>
                                    <ul class="list-unstyled">
                                        <li>房子和合适 颜色很行看水水水水水水水水水水水水水水水水水水水顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</li>
                                        <li><img src="./home/images/tu5.png" alt="" width="40px">   <img src="./home/images/tu5.png" alt="" width="40px;"></li>
                                        <li>所以场地 : 第一会议室 会议人数 : 200 会议类型新闻发布会</li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ol>

                </div>
            </div>
        <!--首页推广-->
        <div class="a_generalize margin-top">
            <ul class="list-inline">
                <li>
                    <ol class="list-unstyled">
                        <li><img src="./home/images/tu21.png" alt=""></li>
                        <li>水立方</li>
                        <li>所在地 : 北京市海淀区紫竹院路69号</li>
                        <li>会所数量 : 40最大会所场面积:1352平米</li>
                        <li>最多容纳人数1400</li>
                        <li>联系电话 : 010-84826854</li>

                    </ol>
                </li>
                <li>
                    <ol class="list-unstyled">
                        <li><img src="./home/images/tu21.png" alt=""></li>
                        <li>水立方</li>
                        <li>所在地 : 北京市海淀区紫竹院路69号</li>
                        <li>会所数量 : 40最大会所场面积:1352平米</li>
                        <li>最多容纳人数1400</li>
                        <li>联系电话 : 010-84826854</li>

                    </ol>
                </li>
                <li>
                    <ol class="list-unstyled">
                        <li><img src="./home/images/tu21.png" alt=""></li>
                        <li>水立方</li>
                        <li>所在地 : 北京市海淀区紫竹院路69号</li>
                        <li>会所数量 : 40最大会所场面积:1352平米</li>
                        <li>最多容纳人数1400</li>
                        <li>联系电话 : 010-84826854</li>

                    </ol>
                </li>
                <li>
                    <ol class="list-unstyled">
                        <li><img src="./home/images/tu21.png" alt=""></li>
                        <li>水立方</li>
                        <li>所在地 : 北京市海淀区紫竹院路69号</li>
                        <li>会所数量 : 40最大会所场面积:1352平米</li>
                        <li>最多容纳人数1400</li>
                        <li>联系电话 : 010-84826854</li>

                    </ol>
                </li>

            </ul>
        </div>

    </div>





    </div>
    <div style="clear:left;"></div>


@endsection

