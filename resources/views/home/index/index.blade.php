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
                            <input type="text" name="keywords" size="49" class="form-my border-blue" placeholder="  场 地 或 地 标 关 键 词">
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
            <div id="search_d">
                <div class="">
                    <form action="">
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
                                            <span class="form-my">起止时间：</span>
                                        </li>
                                        <li>
                                            <label>
                                                <div class="border-blue form-my">
                                                    <a id="input_trigger_demo_index" href="#">
                                                    <span id="date_demo_index"></span>
                                                    <input type="hidden" name="time">
                                                    <span class="caret"></span>
                                                    </a>
                                                </div>
                                                <script type="text/javascript">

                                                    var dateRange = new pickerDateRange('date_demo_index', {
                                                        aRecent7Days : 'aRecent7DaysDemo2', //最近7天
                                                        isTodayValid : false,
                                                        startDate : '2013-04-14',
                                                        endDate : '2013-04-21',
                                                        disCertainDate : [true, 4, 2],
                                                        //needCompare : true,
                                                        //isSingleDay : true,
                                                        //shortOpr : true,
                                                        dayRangeMax : '999', // 日期最大范围(以天计算)
                                                        startDateId : 'startDate',
                                                        endDateId : 'endDate',
                                                        defaultText : ' 至 ',
                                                        inputTrigger : 'input_trigger_demo_index',
                                                        theme : 'ta',
                                                        success : function(obj) {
                                                            $('#date_demo_index').next('input').attr('value', obj.startDate + ',' + obj.endDate);
                                                            // console.log(obj);                            
                                                        }
                                                    });
                                                </script>
                                            </label>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr id="star">
                                
                            </tr>
                            <tr id="star_model" class="hidden">
                                <th>酒店星级：</th>
                                <td>
                                    <ul>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                        <li><label><input type="checkbox" > 酒店</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-default">
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
            console.log(h);
            $(this).find('span').toggleClass("glyphicon-menu-down");
            $(this).find('span').toggleClass("glyphicon-menu-up");
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