@extends('home.layout2')

@section('header')
    <link rel="stylesheet" href="/home/css/index/list.css">
@endsection

@section('con')
    <div class="bg-gray">
        <div class="title col-md-8 col-md-offset-2">首页 > 场地搜索</div>
    </div>
    <div class="col-md-8 col-md-offset-2">

        {{--多条件搜索--}}
        <div class="margin-top">
            <form action="">
                <div class="row">
                    <div class="col-md-8">
                        <table border="0" class="left">
                            <tr>
                                <th>会议规模：</th>
                                <td>
                                    <ul>
                                        <li class="city">
                                            <a href="#">
                                                <div class="form-my border-ccc fixedWidth">
                                                    <span index="city"> 地区不限 </span>
                                                    <input type="hidden" name="city">
                                                    <span class="glyphicon glyphicon-menu-down">
                                                </div>
                                            </a>
                                            <div>
                                                <span class="border">华东</span>
                                                <ul>
                                                    <li><a href="">北京</a></li>
                                                    <li><a href="">北京</a></li>
                                                    <li><a href="">北京</a></li>
                                                    <li><a href="">北京</a></li>
                                                </ul>
                                                <div class="hr"></div>
                                                <span class="border">华东</span>
                                                <ul>
                                                    <li><a href="">北京</a></li>
                                                    <li><a href="">北京</a></li>
                                                    <li><a href="">北京</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <select name="number" class="form-my">
                                                <option value="0">人数不限</option>
                                                <option value="1">50-100</option>
                                                <option value="2">100-200</option>
                                                <option value="3">200-300</option>
                                                <option value="4">300-400</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="price" class="form-my">
                                                <option value="0">&nbsp;&nbsp; 预算</option>
                                                <option value="1">50-100</option>
                                                <option value="2">100-200</option>
                                                <option value="3">200-300</option>
                                                <option value="4">300-400</option>
                                            </select>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>场地类型：</th>
                                <td>
                                    <ul>
                                        <li><label><input type="checkbox" id="hotel"> 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>会议时长：</th>
                                <td>
                                    <ul>
                                        <li>
                                            <select name="number" class="form-my">
                                                <option value="0">会议时长</option>
                                                <option value="1">50-100</option>
                                                <option value="2">100-200</option>
                                                <option value="3">200-300</option>
                                                <option value="4">300-400</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label>
                                                <span>开始时间：</span>
                                                <input type="date" class="form-my">
                                            </label>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr id="star_model">
                                <th>酒店星级：</th>
                                <td>
                                    <ul>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="s_selected">
                                <th style="font-size:16px;">您已选择 ：</th>
                                <td>
                                    <ul>
                                        <li>
                                            <span class="a_s">城市 : 北京</span>
                                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </li>
                                        <li>
                                            <span class="a_s">场地类型 : 酒店会场</span>
                                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div id="rightbox1">
                            <div id="btn-rsea">
                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span>搜 索</span>
                                </button>&nbsp;&nbsp;
                                <button class="btn btn-primary">清空所有选项</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div style="clear:both;"></div>

        {{--<!--搜索结果-->--}}
        <div class="seek_result margin-top">

                {{--<!--结果展示-->--}}
                <div class="seek_result_show">
                    {{--<!--按什么排行-->--}}
                    <div class="show_ask">
                        <!--下拉-->
                        <ul class="list-inline">
                            <li>
                                <a class="btn btn-default" href="#" role="button">综合排名</a>
                            </li>
                            <li>
                                <a class="btn btn-default" href="#" role="button">开场人气</a>
                            </li>
                            <li>
                                <a class="btn btn-default" href="#" role="button">销量</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        价格
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">从低到高</a></li>
                                        <li><a href="#">从高到低</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        星级
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">从低到高</a></li>
                                        <li><a href="#">从高到低</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <!--多选-->
                        <div class="c_box">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 酒店
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 含餐点
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 可预订
                            </label>
                        </div>
                    </div>
                    <!--按什么显示-->
                    <div class="a_show">
                        <ul class="list-unstyled">

                            @foreach($data as $key=>$val)
                                <li>
                                    <dl class="dl-horizontal">
                                        <dt><img src="{{ url('uploads/shoper/places/places/') }}/{{ $val->pic }}" alt="" height="210px"></dt>
                                        <dd>
                                            <ol class="list-unstyled s_main">
                                                <li><a href="{{ url('/detail/pid=') }}{{ $val->id }}">{{ $val->title }}</a></li>
                                                <li>
                                                    @if($val->hotelStar)
                                                        <a href="#">{{ $val->hotelStar }}</a>
                                                    @endif
                                                    地址 : {{ $val->address }}
                                                </li>
                                                <li><span></span></li>
                                                <li>最大会场面积 : {{ $val->maxArea }}平米</li>
                                                <li>最多容纳人数 : {{ $val->maxPeople }}人</li>
                                                <li>会场数量 : {{ $val->meetNum }}</li>
                                                <li>可提供配套服务 :
                                                    @foreach($val->support as $v)
                                                        {{ $v }}&nbsp;
                                                    @endforeach
                                                </li>
                                                <li>
                                                    @foreach($val->free as $v)
                                                            <a href="#">{{ $v }}</a>
                                                    @endforeach
                                                </li>
                                                <li>成交量 : 58622单 | 评论 : 35252</li>
                                                <li class="s_main_ri s_grade">4.8分/5分</li>
                                                <li class="s_main_ri s_price">￥{{ $val->price }}元起</li>
                                                <li class="s_main_ri s_reserve">
                                                    <a class="btn btn-danger" href="{{ url('/detail/pid=') }}{{ $val->id }}" role="button">预订</a>
                                                </li>

                                            </ol>
                                        </dd>
                                    </dl>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--分页-->
                    <div class="seek_paging text-center">
                            {{ $data->appends($request)->links() }}
                    </div>
                </div>

                <!--推荐-->
                <div class="seek_recommend">
                    <div class="recommend_title">热门场地</div>
                    <div class="recommend_list">
                        <ul class="list-unstyled">
                            <!--一条一条的-->
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="dl-horizontal">
                                    <dt>
                                        <img src="./home/images/tu5.png" alt="">
                                    </dt>
                                    <dd>
                                        <ol class="list-unstyled">
                                            <li><a href="">广西大厦</a></li>
                                            <li>星级酒店</li>
                                            <li>北京朝阳区潘家园华威里26号</li>
                                        </ol>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>

        </div>

        <!--首页推广-->
        <div id="commend" class="row a_generalize margin-top">
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

    </div>
    <div style="clear:left;"></div>


@endsection

