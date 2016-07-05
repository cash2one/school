<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>管理中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">
    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">
    @section('header')
    @show
</head>
<body class="overflow-hidden">
<div class="wrapper preload">
    <header class="top-nav">
        <div class="top-nav-inner">
            <div class="nav-header">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav-notification pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>
                        <ul class="dropdown-menu dropdown-sm pull-right">
                            <li class="user-avatar">
                                <img src="/images/profile9.jpg" alt="" class="img-circle">
                                <div class="user-content">
                                    <h5 class="no-m-bottom">窄屏显示</h5>
                                    <div class="m-top-xs">
                                        <a href="#" class="m-right-sm">修改密码</a>
                                        <a href="{{ url('/logout') }}">退出</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="{{ url('/admin') }}" class="brand">
                    <i class="fa fa-database"></i><span class="brand-name">来上课管理后台</span>
                </a>
            </div>

            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="pull-right m-right-sm">
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="/images/profile9.jpg" alt="" class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                {{ Auth::user()->name }}
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">
                            <div class="panel-body paddingTB-sm">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-edit fa-lg"></i><span class="m-left-xs">我的资料</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">修改密码</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}">
                                            <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">退出</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ./top-nav-inner -->
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <!--左侧nav begin-->
            <div class="main-menu">
                <ul class="accordion">
                    <li class="bg-palette1">
                        <a href="{{ url('/admin') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
                                <span class="text m-left-sm">首页</span>
                            </span>
                            <span class="menu-content-hover block">
                                首页
                            </span>
                        </a>
                    </li>
                    @role('administrator')
                    <li class="openable bg-palette4">
                        <a href="#">
                            <span class="menu-content block">
								<span class="menu-icon"><i class="block fa fa-list-ul fa-lg"></i></span>
								<span class="text m-left-sm">微官网设置</span>
								<span class="submenu-icon"></span>
							</span>
                            <span class="menu-content-hover block">
                                微官网设置
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="menu_list.html"><span class="submenu-label">菜单</span></a></li>
                            <li><a href="banner.html"><span class="submenu-label">轮播图</span></a></li>
                        </ul>
                    </li>
                    @endrole

                    @role('administrator')
                    <li class="openable bg-palette2">
                        <a href="{{ url('/admin/school') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
                                <span class="text m-left-sm">学校</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">
                                学校
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('/admin/school') }}"><span class="submenu-label">学校管理</span></a></li>
                        </ul>
                    </li>
                    @endrole

                    @role('school')
                    <li class="bg-palette2">
                        <a href="{{ url('/admin/grade') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
                                <span class="text m-left-sm">年级管理</span>
                            </span>
                            <span class="menu-content-hover block">
                                年级管理
                            </span>
                        </a>
                    </li>
                    @endrole

                    @role('grades')
                    <li class="bg-palette2">
                        <a href="{{ url('/admin/classes') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
                                <span class="text m-left-sm">班级管理</span>
                            </span>
                            <span class="menu-content-hover block">
                                班级管理
                            </span>
                        </a>
                    </li>
                    @endrole

                    @role('school')
                    <li class="bg-palette2">
                        <a href="{{ url('/admin/teacher') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
                                <span class="text m-left-sm">教师管理</span>
                            </span>
                            <span class="menu-content-hover block">
                                教师
                            </span>
                        </a>
                    </li>
                    @endrole

                    @role('school')
                    <li class="bg-palette2">
                        <a href="{{ url('/admin/course') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
                                <span class="text m-left-sm">课程管理</span>
                            </span>
                            <span class="menu-content-hover block">
                                课程
                            </span>
                        </a>
                    </li>
                    @endrole

                    <li class="openable bg-palette3">
                        <a href="#">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-shopping-cart fa-lg"></i></span>
                                <span class="text m-left-sm">文章</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">
                                文章
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="article_list.html"><span class="submenu-label">文章管理</span></a></li>
                            <li><a href="article_type.html"><span class="submenu-label">文章类型</span></a></li>
                        </ul>
                    </li>

                    @role('administrator')
                    <li class="bg-palette4">
                        <a href="{{ url('/admin/role') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-list-ul fa-lg"></i></span>
                                <span class="text m-left-sm">角色管理</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">
                                角色
                            </span>
                        </a>
                    </li>
                    @endrole

                    @role('administrator')
                    <li class="bg-palette1">
                        <a href="{{ url('/admin/user') }}">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-weixin fa-lg"></i></span>
                                <span class="text m-left-sm">会员管理</span>
                            </span>
                            <span class="menu-content-hover block">
                                会员管理
                            </span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
            <!--左侧nav end-->
            <div class="sidebar-fix-bottom clearfix">
                <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
            </div>
        </div><!-- sidebar-inner -->
    </aside>
    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            @section('content')
            @show
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
    <!--内容部分-->
    <footer class="footer">
        <span class="footer-brand">
            <strong class="text-danger">爱学科技</strong>
        </span>
        <p class="no-margin">
            &copy; 2016 <strong>爱学科技</strong>. 版权所有.
        </p>
    </footer>
</div><!-- /wrapper -->
<a href="javascript:void(0);" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery -->
<script src="/js/jquery-2.1.3.min.js"></script>
<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src='/js/jquery.slimscroll.min.js'></script>
<!-- Popup Overlay -->
<script src='/js/jquery.popupoverlay.min.js'></script>
<!-- Modernizr -->
<script src='/js/modernizr.min.js'></script>
<!-- Simplify -->
<script src="/js/simplify/simplify.js"></script>
<!-- Noty -->
<script src='/js/jquery.noty.packaged.min.js'></script>
@if(session('status'))
    <script>
        noty({
            text: '{{ session('status.msg') }}',
            type: '{{ session('status.code') }}',
            layout: 'center',
            timeout: '3000'
        });
    </script>
@endif
@section('footer')
@show
</body>
</html>