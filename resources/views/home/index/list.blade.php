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
                <form action="{{ url('/listSearch') }}" method="get">
                    <div class="col-md-8">
                        <div id="">
                            <div class="">
                                {{ csrf_field() }}
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
                                                <li><a target="_blank" href="{{ url('/detail/pid=') }}{{ $val->id }}">{{ $val->title }}</a></li>
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
                                                    @foreach($val->free as $v)
                                                        @if($loop->index >= 5)
                                                        <a href="javascript:">...</a>
                                                        @break
                                                        @endif
                                                        <a href="javascript:">{{ $v }}</a>
                                                    @endforeach
                                                </li>
                                                <li>成交量 : 58622单 | 评论 : 35252</li>
                                                <li class="s_main_ri s_grade">4.8分/5分</li>
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
                                    <li><a target="_blank" class="model_title" href=""></a></li>
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
                                    <li>成交量 : 58622单 | 评论 : 35252</li>
                                    <li class="s_main_ri s_grade">4.8分/5分</li>
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
                        @if($scode == 1)
                            {{ $data->appends($request)->links() }}
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
            <div class="col-md-12">
                
                 @foreach($adver as $k=>$v)
                     <div class="col-xs-3">
                        <a href=""><img style="width:200px;height:200px;" src="{{ url('uploads/shoper/places/places') }}/{{$v->evidencePic}}"></a>
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
                type: 'POST',
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
                        model.find('.model_free').html(free);
                        model.find('.model_price').html('￥'+ n.price +'元起');
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
    </script>
@endsection