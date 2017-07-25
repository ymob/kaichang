@extends('home.layout')

@section('head')
    <link rel="stylesheet" href="/home/css/index/top.css">
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
    @yield('header')
@endsection

@section('content')

    <div class="row">
        <div id="search">
            <div id="logo_big">
                <img src="{{ asset('/home/images/logo_top.png') }}" width="96">
            </div>
            <div id="search_e">
                <form action="{{ url('/listSearch') }}" method="get" >
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
                                    <li><a href="">台州</a></li>
                                    <li><a href="">泰州</a></li>
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
                            <input type="text" name="keywords" size="30" class="form-my border-blue" placeholder="  场 地 或 地 标 关 键 词">
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
                            <button>
                                <img src="{{ asset('/home/images/search.png') }}" >
                            </button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

    @yield('con')


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
            $(this).parents('form').find("[index='city']").html('&nbsp;&nbsp;'+val);
            $(this).parents('form').find("[name='city']").attr('value', val);
            map.next().css('display', 'none');
            return false;
        });
    </script>

    @yield('javascript')

@endsection

@section('modaljs')
    @yield('modal')
@endsection