<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title  }} </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/admin/adminlte/bootstrap/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/admin/adminlte/bootstrap/js/respond.min.js') }}"></script>
    <![endif]-->
    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/admin/index" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>开场网</b>后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                   
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('/uploads/adminUser') }}/{{ session('master')->pic }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ session('master')->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/uploads/adminUser') }}/{{ session('master')->pic }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ session('master')->name }}
                                    <small>创建时间
                                        @php
                                        echo date('Y-m-d',session('master')->created_at)
                                        @endphp
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--<li class="user-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Followers</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Sales</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Friends</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.row -->--}}
                            {{--</li>--}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/admin/logout" class="btn btn-default btn-flat">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('/uploads/adminUser') }}/{{ session('master')->pic }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ session('master')->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> @if(session('master')->auth)
                                                                                普通管理员
                                                                              @else
                                                                                超级管理员
                                                                              @endif
                    </a>
                </div>
            </div>

            <!-- search form -->
            <!-- /.search form -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">导航栏</li>

                <li class="active treeview">
                    <a href="{{ url('/admin/user/index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>用户管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-user-secret"></i> 管理员列表</a></li>
                        <li><a href="{{ url('/admin/shopuser/index') }}"><i class="fa fa-user-md"></i> 加盟商列表</a></li>
                        <li><a href="{{ url('/admin/homeuser/index') }}"><i class="fa fa-users"></i> 用户列表</a></li>
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="{{ url('/admin/places/index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>场地管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/places/index') }}"><i class="fa fa-user-secret"></i> 场地列表</a></li>
                       <!--  <li><a href="{{ url('/admin/meetplaces/index') }}"><i class="fa fa-user-md"></i> 会场列表</a></li>
                        <li><a href="{{ url('/admin/facilities/index') }}"><i class="fa fa-users"></i> 配套服务列表</a></li> -->
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>分类管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/category') }}"><i class="fa fa-circle-o"></i> 分类列表</a></li>
                        <li><a href="{{ url('/admin/attr/index') }}"><i class="fa fa-circle-o"></i> 属性列表</a></li>
                        <li><a href="{{ url('/admin/value/index') }}"><i class="fa fa-circle-o"></i> 属性值列表</a></li>
                    </ul>
                </li>


                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>商品管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/category') }}"><i class="fa fa-circle-o"></i> 商品列表</a></li>
                       <!--  <li><a href="{{ url('/admin/category/create') }}"><i class="fa fa-circle-o"></i> ......</a></li> -->
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>订单管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/order/index/0
                        ') }}"><i class="fa fa-circle-o"></i> 订单列表</a></li>
                      <!--   <li><a href="{{ url('/admin/category/create') }}"><i class="fa fa-circle-o"></i> .....</a></li> -->
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>评论管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/comment/index') }}"><i class="fa fa-circle-o"></i> 评论列表</a></li>
                        <li><a href="{{ url('admin/comment/recover') }}"><i class="fa fa-circle-o"></i> 回收站</a></li>
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>手机登录二维码管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/code') }}"><i class="fa fa-circle-o"></i> 二维码管理</a></li>
                        <!-- <li><a href="{{ url('/admin/category/create') }}"><i class="fa fa-circle-o"></i> ......</a></li> -->
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="">
                        <i class="fa fa-files-o"></i>
                        <span>广告管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin/adver/index') }}"><i class="fa fa-circle-o"></i> 广告列表</a></li>
                        <li><a href="{{ url('/admin/adver/toads') }}"><i class="fa fa-circle-o"></i> 广告添加</a></li>
                    </ul>
                </li>
              
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

   <!--  <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2017-2023 <a href="#">开场网&nbsp;&nbsp;版权所有</a>.</strong> All rights
        reserved.
    </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
               
                <!-- /.control-sidebar-menu -->

                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
               
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('/admin/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/raphael-min.js') }}"></script>

<script src="{{ asset('/admin/adminlte/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/admin/adminlte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/admin/adminlte/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/moment.min.js') }}"></script>
<script src="{{ asset('/admin/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/admin/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('/admin/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/admin/adminlte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin/adminlte/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/admin/adminlte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/admin/adminlte/dist/js/demo.js') }}"></script>

@yield('js')

@yield('modaljs')

</body>
</html>
