<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/blog/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/blog/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/blog/layui/layui.js"></script>
    <script type="text/javascript" src="/blog/js/common.js"></script>
    <script type="text/javascript" src="/blog/ckeditor/ckeditor.js"></script>
</head>
<body>
<style type="text/css">
    body{background-color:#ecf0f5}
    #app .navbar-laravel{z-index:820}
    #app .main-sidebar{position:absolute;top:0;left:0;min-height:100%;z-index:810;-webkit-transition:-webkit-transform .3s ease-in-out,width .3s ease-in-out;-webkit-transition:width .3s ease-in-out,-webkit-transform .3s ease-in-out;transition:width .3s ease-in-out,-webkit-transform .3s ease-in-out;transition:transform .3s ease-in-out,width .3s ease-in-out;transition:transform .3s ease-in-out,width .3s ease-in-out,-webkit-transform .3s ease-in-out}
    #app .con-left{position: fixed;width:230px;overflow:hidden;background-color:#222d32;padding: 0px}
    #app .con-right{margin-left:230px;min-height: 739px;}

    .pull-right{float:right!important}
    .sidebar{padding-bottom:10px}
    .sidebar-form input:focus{border-color:transparent}
    .user-panel>.image>img{width:100%;max-width:45px;height:auto}
    .user-panel>.info>p{font-weight:600;margin-bottom:9px}
    .user-panel>.info>a{text-decoration:none;padding-right:5px;margin-top:3px;font-size:11px}
    .user-panel>.info>a>.fa,.user-panel>.info>a>.glyphicon,.user-panel>.info>a>.ion{margin-right:3px}
    .sidebar-menu{list-style:none;margin:50px 0px 0px 0px;padding:0}
    .sidebar-menu>li{position:relative;margin:0;padding:0}
    .sidebar-menu>li:hover, .sidebar-menu>li.active{color:#4b646f;background:#1a2226}
    .sidebar-menu>li>a{padding:12px 25px 12px 35px;display:block}
    .sidebar-menu>li>a:hover{text-decoration:none;}
    .sidebar-menu>li>a>.fa,.sidebar-menu>li>a>.glyphicon,.sidebar-menu>li>a>.ion{width:20px}
    .sidebar-menu li.header{padding:10px 25px 10px 15px;font-size:12px}
    .sidebar-menu li>a>.fa-angle-left,.sidebar-menu li>a>.pull-right-container>.fa-angle-left{width:auto;height:auto;padding:0;margin-right:10px;-webkit-transition:transform .5s ease;-webkit-transition:-webkit-transform .5s ease;transition:-webkit-transform .5s ease;transition:transform .5s ease;transition:transform .5s ease,-webkit-transform .5s ease}
    .sidebar-menu li>a>.fa-angle-left{position:absolute;top:50%;right:10px;margin-top:-8px}
    .sidebar-menu .menu-open>a>.fa-angle-left,.sidebar-menu .menu-open>a>.pull-right-container>.fa-angle-left{-webkit-transform:rotate(-90deg);transform:rotate(-90deg)}
    .skin-red .sidebar-menu>li.header{color:#4b646f;background:#1a2226}
    .skin-red .sidebar-menu>li>a{border-left:3px solid transparent}
    .skin-red .sidebar-menu>li.active>a,.skin-red .sidebar-menu>li.menu-open>a,.skin-red .sidebar-menu>li:hover>a{color:#fff;background:#1e282c}
    .skin-red .sidebar-menu>li.active>a{border-left-color:#dd4b39}
    .skin-red .sidebar-menu>li>.treeview-menu{margin:0 1px;background:#2c3b41}
    .skin-red .sidebar a{color:#b8c7ce}
    .skin-red .sidebar a:hover{text-decoration:none}
    .skin-red .sidebar-menu .treeview-menu>li>a{color:#8aa4af}
    .skin-red .sidebar-menu .treeview-menu>li.active>a,.skin-red .sidebar-menu .treeview-menu>li>a:hover{color:#fff}
    .content-wrapper{min-height:100%;background-color:#ecf0f5;z-index:800}
    .content-tail {margin:0px 10px;padding:20px;min-height:800px;background-color: white;display: block}
    .title-menu {padding: 50px 25px}
    .title-menu h2{width: 100%;text-align: center}
    .edit-tail {}
    .pt-4, .py-4 {padding-top: 0.8rem!important;}
    .layui-upload .btn_upload_img {width: 115px;height:100px;}
</style>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle login-ckui" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right login-out" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        var menuCurr = 'index';
        function setCurrMenu(curr) {
            $('ul.sidebar-menu li').removeClass('active');
            $('ul.sidebar-menu li[data-index='+ curr +']').addClass('active');
        }
    </script>
    <main class="py-4">
        <aside class="main-sidebar con-left">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="height: auto;">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li data-index="index" class="header">MAIN NAVIGATION</li>
                    <li data-index="Dashboard">
                        <a href="<?php echo url('/blogs');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>总览</span>
                        </a>
                    </li>
                    <li data-index="blog">
                        <a href="<?php echo url('/blogs/blog');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>我的博客</span>
                        </a>
                    </li>
                    <li data-index="branner">
                        <a href="<?php echo url('/blogs/pic');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>轮播图</span>
                        </a>
                    </li>
                    <li data-index="news">
                        <a href="<?php echo url('/blogs/news');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>新闻资讯</span>
                        </a>
                    </li>
                    <li data-index="faq">
                        <a href="<?php echo url('/blogs/faq');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>常见问题</span>
                        </a>
                    </li>
                    <li data-index="job">
                        <a href="<?php echo url('/blogs/join');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>招聘信息</span>
                        </a>
                    </li>
                    <li data-index="about">
                        <a href="<?php echo url('/blogs/about');?>">
                            <i class="fa fa-dashboard"></i>
                            <span>关于我们</span>
                        </a>
                    </li>

                    <li class="treeview none" style="display: none">
                        <a href="http://lavalite.cn/admin/user/user">
                            <i class="fa fa-users"></i> <span>设置</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="http://lavalite.cn/admin/user/user">
                                    <i class="fa fa-user"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="http://lavalite.cn/admin/user/client">
                                    <i class="fa fa-user"></i>
                                    <span>Clients</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="con-right content-wrapper">
            @yield('content')
        </div>
    </main>

    <script type="text/javascript">
        $(function () {
            $('.login-ckui').bind('click', function () {
                $('.login-out').toggle();
            });
            $('.sidebar-menu li').bind(function () {
                $('.sidebar-menu li').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</div>
</body>
</html>
