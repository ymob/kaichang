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
                <form action="" method="" >
                    <ul>
                        <li class="city">
                            <a href="#">
                                <div class="form-my border-blue fixedWidth">
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
                            <input type="text" name="keywords" size="30" class="form-my border-blue" placeholder="  场 地 或 地 标 关 键 词">
                        </li>
                        <li>
                            <select name="number" class="form-my border-blue fixedWidth">
                                <option value="0">人数不限</option>
                                <option value="1">50-100</option>
                                <option value="2">100-200</option>
                                <option value="3">200-300</option>
                                <option value="4">300-400</option>
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