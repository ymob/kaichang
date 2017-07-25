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
            <div class="row">
                <form id="h_search" action="{{ url('/listSearch') }}" method="get">
                    <div class="col-md-8">
                        <div id="">
                            <div class="">
                                <table border="0">
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
                                                        <span class="col-md-3">华北东北:</span>
                                                        <ul class="col-md-8">
                                                            <li><a href="">北京</a></li>
                                                            <li><a href="">天津</a></li>
                                                            <li><a href="">沈阳</a></li>
                                                            <li><a href="">大连</a></li>
                                                            <li><a href="">哈尔滨</a></li>
                                                            <li><a href="">石家庄</a></li>
                                                            <li><a href="">太原</a></li>
                                                            <li><a href="">呼和浩特</a></li>
                                                            <li><a href="">廊坊</a></li>
                                                        </ul>
                                                        <div class="hr"></div>
                                                        <span class="col-md-3 ">华东地区:</span>
                                                        <ul class="col-md-8 ">
                                                            <li><a href="">上海</a></li>
                                                            <li><a href="">杭州</a></li>
                                                            <li><a href="">南京</a></li>
                                                            <li><a href="">大连</a></li>
                                                            <li><a href="">苏州</a></li>
                                                            <li><a href="">无锡</a></li>
                                                            <li><a href="">济南</a></li>
                                                            <li><a href="">厦门</a></li>
                                                            <li><a href="">宁波</a></li>
                                                            <li><a href="">福州</a></li>
                                                            <li><a href="">青岛</a></li>
                                                            <li><a href="">合肥</a></li>
                                                            <li><a href="">常州</a></li>
                                                            <li><a href="">扬州</a></li>
                                                            <li><a href="">温州</a></li>
                                                            <li><a href="">绍兴</a></li>
                                                            <li><a href="">嘉兴</a></li>
                                                            <li><a href="">烟台</a></li>
                                                            <li><a href="">威海</a></li>
                                                            <li><a href="">镇江</a></li>
                                                            <li><a href="">南通</a></li>
                                                            <li><a href="">金华</a></li>
                                                            <li><a href="">徐州</a></li>
                                                            <li><a href="">潍坊</a></li>
                                                            <li><a href="">淄博</a></li>
                                                            <li><a href="">临沂</a></li>
                                                            <li><a href="">马鞍山</a></li>
                                                            <li><a href="">合州</a></li>
                                                            <li><a href="">台州</a></li>
                                                            <li><a href="">济宁</a></li>
                                                            <li><a href="">泰安</a></li>
                                                        </ul>
                                                        <div class="hr"></div>
                                                        <span class="col-md-3 ">中部西部:</span>
                                                        <ul class="col-md-8 ">
                                                            <li><a href="">成都</a></li>
                                                            <li><a href="">武汉</a></li>
                                                            <li><a href="">郑州</a></li>
                                                            <li><a href="">长沙</a></li>
                                                            <li><a href="">南昌</a></li>
                                                            <li><a href="">贵阳</a></li>
                                                            <li><a href="">西宁</a></li>
                                                            <li><a href="">重庆</a></li>
                                                            <li><a href="">西安</a></li>
                                                            <li><a href="">昆明</a></li>
                                                            <li><a href="">兰州</a></li>
                                                            <li><a href="">乌鲁木齐</a></li>
                                                            <li><a href="">银川</a></li>
                                                        </ul>
                                                        <div class="hr"></div>
                                                        <span class="col-md-3 ">华南地区:</span>
                                                        <ul class="col-md-8 ">
                                                            <li><a href="">广州</a></li>
                                                            <li><a href="">深圳</a></li>
                                                            <li><a href="">佛山</a></li>
                                                            <li><a href="">珠海</a></li>
                                                            <li><a href="">东莞</a></li>
                                                            <li><a href="">三亚</a></li>
                                                            <li><a href="">海口</a></li>
                                                            <li><a href="">南宁</a></li>
                                                            <li><a href="">惠州</a></li>
                                                        </ul>
                                                        <div class="hr"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <select name="number" class="form-my">
                                                        <option value="">人数不限</option>
                                                        <option value="0">1-10</option>
                                                        <option value="1">10-30</option>
                                                        <option value="2">30-60</option>
                                                        <option value="3">60-100</option>
                                                        <option value="4">100-200</option>
                                                        <option value="5">200-300</option>
                                                        <option value="6">300-500</option>
                                                        <option value="7">500-1000</option>
                                                        <option value="8">1000+</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <select name="price" class="form-my">
                                                        <option value="">&nbsp;&nbsp; 预算</option>
                                                        <option value="1">3000以下</option>
                                                        <option value="2">3-5千</option>
                                                        <option value="3">5-8千</option>
                                                        <option value="4">8千-1.2万</option>
                                                        <option value="5">1.2-1.5万</option>
                                                        <option value="6">1.5-2万</option>
                                                        <option value="7">2-3万</option>
                                                        <option value="8">3-5万</option>
                                                        <option value="9">5-8万</option>
                                                        <option value="10">8-12万</option>
                                                        <option value="11">12-20万</option>
                                                        <option value="12">20-30万</option>
                                                        <option value="13">30万以上</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>场地类型：</th>
                                        <td>
                                            <ul>
                                                <li><label><input type="checkbox" name="typeId[]" id="hotel" value="1"> 酒店</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="2"> 会议中心</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="3"> 体育馆</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="4"> 展览馆</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="5"> 酒吧/餐厅/会所</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="6"> 艺术中心/剧院</label></li>
                                                <li><label><input type="checkbox" name="typeId[]" value="7"> 咖啡厅/茶室</label></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>会议时长：</th>
                                        <td>
                                            <ul>
                                                <li>
                                                    <select name="timeLong" class="form-my">
                                                        <option value="0">会议时长</option>
                                                        <option value="1">1天</option>
                                                        <option value="2">2天</option>
                                                        <option value="3">3天</option>
                                                        <option value="4">4天</option>
                                                        <option value="5">5天</option>
                                                        <option value="6">6天</option>
                                                        <option value="7">7天</option>
                                                        <option value="8">10天</option>
                                                        <option value="9">14天</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <span class="form-my">开始时间：</span>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="date" name="startime" class="form-my">
                                                    </label>
                                                </li>
                                                <li>
                                                    <span id="time_info" class="text-danger" style="display:none;font-size:16px;">如果需要时间条件，请两个选项都填写</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr id="star">
                                        
                                    </tr>
                                    <tr id="star_model" class="hidden" >
                                        <th>酒店星级：</th>
                                        <td>
                                            <ul>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="2"> 三星以下</label></li>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="3"> 三星级</label></li>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="4"> 四星级</label></li>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="5"> 五星级</label></li>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="6"> 六星级</label></li>
                                                <li><label><input type="checkbox" name="hotelStar[]" value="7"> 七星级</label></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div id="rightbox1">
                            <div id="btn-rsea">
                                <button class="btn btn-primary" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span>搜 索</span>
                                </button>&nbsp;&nbsp;
                                {{-- <a href=""><button class="btn btn-primary">清空所有选项</button></a> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                                <a class="btn btn-default orderby" href="javascript:" field="o_score" title="从高到低排序">开场人气<span class="glyphicon glyphicon-triangle-bottom" style="margin-left: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="btn btn-default orderby" href="javascript:" field="o_sales" title="从高到低排序">销量<span class="glyphicon glyphicon-triangle-bottom" style="margin-left: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="btn btn-default orderby" href="javascript:" field="o_price" title="从高到低排序">价格<span class="glyphicon glyphicon-triangle-bottom" style="margin-left: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="btn btn-default orderby" href="javascript:" field="o_hotelStar" title="从高到低排序">酒店星级<span class="glyphicon glyphicon-triangle-bottom" style="margin-left: 5px;"></span></a>
                            </li>
                        </ul>
                        <!--多选-->
                    </div>
                    <!--按什么显示-->
                    <div class="a_show">
                        <ul id="places_ul" class="list-unstyled">

                            @foreach($data as $key=>$val)
                                @if($loop->index >= 5)
                                @break
                                @endif
                                <li>
                                    <dl class="dl-horizontal">
                                        <dt>
                                            <a target="_blank" href="{{ url('/detail/pid=') }}{{ $val->id }}">
                                                <img src="{{ url('uploads/shoper/places/places/') }}/{{ $val->pic }}" alt="" height="210px">
                                            </a>
                                        </dt>
                                        <dd>
                                            <ol class="list-unstyled s_main">
                                                <li>
                                                    <a target="_blank" href="{{ url('/detail/pid=') }}{{ $val->id }}">{{ $val->title }}</a>
                                                    @if(session('user'))
                                                        @if($val->coll)
                                                        <a href="javascript:" class="pull-right collection" index="{{ $val->id }}" title="点击收藏">
                                                            <span class="glyphicon glyphicon-heart" style="margin-right: 20px; font-size: 20px; color: #f55;"></span>
                                                        </a>
                                                        @else
                                                        <a href="javascript:" class="pull-right collection" index="{{ $val->id }}" title="点击收藏">
                                                            <span class="glyphicon glyphicon-heart" style="margin-right: 20px; font-size: 20px; color: #bbb;"></span>
                                                        </a>
                                                        @endif
                                                    @else
                                                    <a href="javascript:" class="pull-right collection" index="{{ $val->id }}" title="点击收藏">
                                                        <span class="glyphicon glyphicon-heart" style="margin-right: 20px; font-size: 20px; color: #bbb;"></span>
                                                    </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($val->hotelStar)
                                                        <a href="javascript:">{{ $val->hotelStar }}</a>
                                                    @endif
                                                    <b>地址 :</b> {{ $val->address }}
                                                </li>
                                                <li><span></span></li>
                                                <li><b>最大会场面积 :</b> {{ $val->maxArea }}平米</li>
                                                <li><b>最多容纳人数 :</b> {{ $val->maxPeople }}人</li>
                                                <li><b>会场数量 :</b> {{ $val->meetNum }}</li>
                                                <li><b>可提供配套服务 :</b>
                                                    @foreach($val->support as $v)
                                                        {{ $v }}&nbsp;
                                                    @endforeach
                                                </li>
                                                <li>
                                                    @if($val->free)
                                                        @foreach($val->free as $v)
                                                            @if($loop->index >= 5)
                                                            <a href="javascript:">...</a>
                                                            @break
                                                            @endif
                                                            <a href="javascript:">{{ $v }}</a>
                                                        @endforeach
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </li>
                                                <li>成交量 : {{ $val->sales }}单 | 评论 : 35252</li>
                                                <li class="s_main_ri model_score s_grade">{{ $val->score }}分/5分</li>
                                                <li class="s_main_ri s_price">￥{{ $val->price }}元起</li>
                                                <li class="s_main_ri s_reserve">
                                                    @if(isset($val->timeContradict))
                                                    <a target="_blank" class="btn btn-danger disabled" href="{{ url('/detail/pid=') }}{{ $val->id }}" role="button">预订</a>
                                                    @else
                                                    <a target="_blank" class="btn btn-danger" href="{{ url('/detail/pid=') }}{{ $val->id }}" role="button">预订</a>
                                                    @endif
                                                </li>

                                            </ol>
                                        </dd>
                                    </dl>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <li id="place_model" style="display:none;">
                        <dl class="dl-horizontal">
                            <dt>
                                <a target="_blank" class="model_pic" href=""><img src="" height="210px"></a>
                            </dt>
                            <dd>
                                <ol class="list-unstyled s_main">
                                    <li>
                                        <a target="_blank" class="model_title" href=""></a>
                                        <a href="javascript:" class="pull-right collection" index="" title="点击收藏">
                                            <span class="glyphicon glyphicon-heart" style="margin-right: 20px; font-size: 20px; color: #bbb;"></span>
                                        </a>
                                    </li>
                                    <li class="model_star_add">
                                        <a href="javascript:"></a>
                                        <span></span>
                                    </li>
                                    <li><span></span></li>
                                    <li class="model_maxArea"></li>
                                    <li class="model_maxPeople"></li>
                                    <li class="model_meetNum"></li>
                                    <li class="model_support"></li>
                                    <li class="model_free"></li>
                                    <li class="model_sales"></li>
                                    <li class="s_main_ri model_score s_grade"></li>
                                    <li class="s_main_ri s_price model_price"></li>
                                    <li class="s_main_ri s_reserve">
                                        <a target="_blank" class="btn btn-danger model_btn" href="" role="button">预订</a>
                                    </li>

                                </ol>
                            </dd>
                        </dl>
                    </li>
                    <!--分页-->
                    <div class="seek_paging text-center">
                        @if(count($data) < 6)
                            <button id="loadOther" class="btn btn-info disabled">暂无更多场地</button>
                        @else
                            <button id="loadOther" class="btn btn-info">点击加载更多</button>
                        @endif
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

@section('javascript')
    <script>
        $('#hotel').on('change', function(){
            var status = $.trim($('#star').html());
            if(status == '')
            {
                var html = $('#star_model').html();
                $('#star').html(html);
            }else
            {
                $('#star').html('');
            }
        });

        // 瀑布流
        @if(isset($ajax))
        var ajax = null;

        $('#loadOther').on('click', function(){
            if($('#loadOther').hasClass('disabled'))
            {
                return false;
            }
            $.ajax('/listSearch', {
                data: {'data': ajax?ajax:{!! $ajax !!} },
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    if(data.places.length != 6)
                    {
                        $('#loadOther').addClass('disabled');
                        $('#loadOther').html('暂无更多场地');
                    }
                    $.each(data.places, function(i, n){
                        if(i == 5)
                        {
                            return false;
                        }
                        var model = $('#place_model').clone();
                        model.attr('id', '');
                        model.find('.model_pic').attr('href', '/detail/pid='+n.id);
                        model.find('img').attr('src', '/uploads/shoper/places/places/'+n.pic);
                        model.find('.model_title').attr('href', '/detail/pid='+n.id);
                        model.find('.model_title').html(n.title);
                        model.find('.collection').attr('index', n.id);
                        @if(session('user'))
                        if(n.coll == 1)
                        {
                            model.find('.collection span').css('color', '#f55');
                            
                        }
                        model.find('.collection').on('click', function(){
                            var coll = $(this).find('span');
                            var pid = $(this).attr('index');
                            $.ajax('/collection/update', {
                                data: {pid: pid},
                                type: 'post',
                                dataType: 'json',
                                success: function(data)
                                {
                                    if(data.code == 1)
                                    {
                                        if(data.status == 1)
                                        {
                                            coll.css('color', '#f55');
                                        }else
                                        {
                                            coll.css('color', '#bbb');
                                        }
                                    }else
                                    {
                                        alert('系统异常，稍后重试');
                                    }
                                },
                                error: function()
                                {
                                    alert('系统异常，稍后重试');
                                }
                            });
                        });
                        @else
                        model.find('.collection').on('click', function(){
                            alert('您没有登录！');
                            var $form_modal = $('.cd-user-modal'),
                            $form_login = $form_modal.find('#cd-login'),
                            $form_modal_tab = $('.cd-switcher'),
                            $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
                            $main_nav = $('#main_nav');

                            $main_nav.children('ul').removeClass('is-visible');
                            $form_modal.addClass('is-visible'); 

                            $form_login.addClass('is-selected');
                            $tab_login.addClass('selected');
                        });
                        @endif
                        if(n.hotelStar)
                        {
                            model.find('.model_star_add a').html(n.hotelStar);
                        }else
                        {
                            model.find('.model_star_add a').remove();
                        }
                        model.find('.model_star_add span').html('<b>地址：</b>' + n.address);
                        model.find('.model_maxArea').html('<b>最大会场面积 :</b>'+ n.maxArea +'平米');
                        model.find('.model_maxPeople').html('<b>最多容纳人数 :</b>'+ n.maxPeople +'人');
                        model.find('.model_meetNum').html('<b>会场数量 : </b>'+ n.meetNum);
                        var support = '';
                        $.each(n.support, function(i, n){
                            support += n + "&nbsp;";
                        });
                        model.find('.model_support').html('<b>可提供配套服务 :</b>'+ support);
                        var free = '';
                        $.each(n.free, function(i, n){
                            if(i >= 5)
                            {
                                free += '<a href="javascript:">...</a>';
                                return false;
                            }
                            free += '<a href="javascript:">'+ n +'</a>';
                        });
                        if(free == '') free = '&nbsp;';
                        model.find('.model_free').html(free);
                        model.find('.model_price').html('￥'+ n.price +'元起');
                        model.find('.model_score').html(n.score +'分/5分');
                        model.find('.model_sales').html('成交量 : '+ n.sales +'单 | 评论 : 35252');


                        if(n.timeContradict)
                        {
                            model.find('.model_btn').addClass('disabled');
                        }
                        model.find('.model_btn').attr('href', '/detail/pid='+ n.id);
                        model.css('display', 'block');
                        $('#places_ul').append(model);
                    });
                    delete data.places;
                    ajax = data;
                }
            });
        });
        @endif

        // 时间和时长
        var h_form = $('#h_search');
        h_form.on('submit', function(){
            var timeLong = $('[name="timeLong"]').val();
            var startime = $('[name="startime"]').val();
            if(!startime)
            {
                if(timeLong != 0)
                {
                    $('#time_info').css('display', 'block');
                    return false;  
                }
            }
            if(timeLong != 0)
            {
               if(!startime)
                {
                    $('#time_info').css('display', 'block');
                    return false;  
                } 
            }
        });

        $('.orderby').on('click', function(){
            var url = location.href;
            var last = url.substr(url.length - 1);
            if(last == '#') url = url.substr(0, url.length - 1);
            var field = $(this).attr('field');
            if(url.indexOf(field) > 0)
            {
                var lastUrl = url.substr(url.indexOf(field));
                var start = lastUrl.indexOf('=') + 1;
                if(lastUrl.indexOf('&') > 0)
                {
                    var end = lastUrl.indexOf('&');
                }else
                {
                    var end = lastUrl.length;
                }
                var oldBy = lastUrl.substring(start, end);
                if(oldBy == 'desc')
                {
                    var by = 'asc';
                }else
                {
                    var by = 'desc';
                }
                var newUrl = url.replace(field +'='+ oldBy, field +'='+ by);
            }else
            {
                if(url.indexOf('?') > 0)
                {
                    var newUrl = url + '&' + field +'='+ 'desc';
                }else
                {
                    var newUrl = url + '?' + field +'='+ 'desc';
                }
            }

            location.href = newUrl;
        });
        var url = location.href;
        if(url.indexOf('o_') > 0)
        {
            var lastUrl = url.substr(url.indexOf('o_'));
            var arr = lastUrl.split('&');
            $.each(arr, function(i, n){
                var ar = n.split('=');
                $('.orderby[field="'+ ar[0] +'"]').css('background', '#ccc');
                if(ar[1] != 'desc')
                {
                    $('.orderby[field="'+ ar[0] +'"] span').toggleClass('glyphicon-triangle-bottom');
                    $('.orderby[field="'+ ar[0] +'"] span').toggleClass('glyphicon-triangle-top');
                    $('.orderby[field="'+ ar[0] +'"]').attr('title', '从低到高排序')
                }
            });
        }
    </script>
@endsection
