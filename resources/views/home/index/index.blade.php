@extends('home.layout')

@section('head')
    <link rel="stylesheet" href="{{ asset('/home/css/index/index.css') }}">
@endsection

@section('content')
    <article>
        <div class="container text-center">
            <div id="logo_big">
                <img src="{{ asset('/home/images/logo.png') }}" width="120">
            </div>
            <div id="search_e">

                <form action="/indexSearch" method="post" >
                    {{ csrf_field() }}
                    <ul>
                        <li class="city">
                            <a href="#">
                                <div class="form-my border-blue fixedWidth">
                                    <span index="city"> 地区不限 </span>
                                    <input type="hidden" name="city">
                                    <span class="glyphicon glyphicon-menu-down"></span>
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
                            <input type="text" name="keywords" size="49" class="form-my border-blue" placeholder="  场 地 或 地 标 关 键 词" value="">
                        </li>
                        <li>
                            <select name="number" class="form-my border-blue fixedWidth">
                                <option value="0">人数不限</option>
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
                            <button>
                                <img src="{{ asset('/home/images/search.png') }}" >
                            </button>
                        </li>
                    </ul>
                </form>

            </div>
            <div id="search_d">
                <div class="">
                    <form action="/indexSearch" method="post">
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
                                                <option value="0">人数不限</option>
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
                                                <option value="0">&nbsp;&nbsp; 预算</option>
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
                                                <option value="1">50-100</option>
                                                <option value="2">100-200</option>
                                                <option value="3">200-300</option>
                                                <option value="4">300-400</option>
                                            </select>
                                        </li>
                                        <li>
                                            <span class="form-my">起止时间：</span>
                                        </li>
                                        <li>
                                            <label>

                                                {{--<div class="border-blue form-my">--}}
                                                    {{--<a id="input_trigger_demo_index" href="#">--}}
                                                    {{--<span id="date_demo_index"></span>--}}
                                                    {{--<input type="hidden" name="time">--}}
                                                    {{--<span class="caret"></span>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<script type="text/javascript">--}}

                                                    {{--var dateRange = new pickerDateRange('date_demo_index', {--}}
                                                        {{--aRecent7Days : 'aRecent7DaysDemo2', //最近7天--}}
                                                        {{--isTodayValid : false,--}}
                                                        {{--startDate : '2013-04-14',--}}
                                                        {{--endDate : '2013-04-21',--}}
                                                        {{--disCertainDate : [true, 4, 2],--}}
                                                        {{--//needCompare : true,--}}
                                                        {{--//isSingleDay : true,--}}
                                                        {{--//shortOpr : true,--}}
                                                        {{--dayRangeMax : '999', // 日期最大范围(以天计算)--}}
                                                        {{--startDateId : 'startDate',--}}
                                                        {{--endDateId : 'endDate',--}}
                                                        {{--defaultText : ' 至 ',--}}
                                                        {{--inputTrigger : 'input_trigger_demo_index',--}}
                                                        {{--theme : 'ta',--}}
                                                        {{--success : function(obj) {--}}
                                                            {{--$('#date_demo_index').next('input').attr('value', obj.startDate + ',' + obj.endDate);--}}
                                                            {{--// console.log(obj);                            --}}
                                                        {{--}--}}
                                                    {{--});--}}
                                                {{--</script>--}}
                                                <input type="date" name="startTime" value="">

                                                {{--<input type="date" name="startime" class="form-my">--}}

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
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                        <span>搜 索</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div id="down_up">
                <a href="">
                    <span class="glyphicon glyphicon-menu-down"></span><br>
                    <span class="glyphicon glyphicon-menu-down"></span><br>
                    <font color="#0E6EB8" size="4px">高级搜索</font>
                </a>
            </div>
        </div>
    </article>
@endsection

@section('js')
    <script>

        var map = $("[index='city']").parents('a');
        map.on('click', function(){
            var status = $(this).next().css('display');
            if(status == 'block')
            {
                $(this).next().css('display', 'none');
            }else
            {
                $(this).next().css('display', 'block');
            }
            return false;
        });
        $('.city div li').on('click', function(){
            var val = $(this).find('a').html();
            // alert(val);
            $(this).parents('form').find("[index='city']").html('&nbsp;&nbsp;'+val);
            $(this).parents('form').find("[name='city']").attr('value', val);
            map.next().css('display', 'none');
            return false;
        });
        $('#down_up a').on('click', function(){
            $(this).find('span').toggleClass("glyphicon-menu-down");
            $(this).find('span').toggleClass("glyphicon-menu-up");
            var status = $('#search_d').css('overflow');
            if(status == 'hidden')
            {
                $('#search_d').css('overflow', 'visible');
            }else
            {
                $('#search_d').css('overflow', 'hidden');
            }
            var h = $('#search_d').css('height');
            if(h == '1px')
            {
                $('#search_d').animate({'height': '350px','opacity': 'show'}, 1000);
            }else
            {
                $('#search_d').animate({'height': '1px','opacity': 'show'}, 1000);
            }
            return false;
        });
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
    </script>
@endsection