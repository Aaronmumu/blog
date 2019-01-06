<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>我的博客</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/aaron/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="/aaron/css/animate.css" rel="stylesheet">
    <link href="/aaron/css/layout.css?v=11.19.1" rel="stylesheet">
    <script src="/aaron/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/aaron/js/jquery.SuperSlide.2.1.2.js"></script>
    <script src="/aaron/js/korbin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/aaron/js/TweenLite.min.js"></script>
    <script type="text/javascript" src="/aaron/js/lem_counter.js"></script>
    <script type="text/javascript" src="/aaron/layui/layui.js"></script>
</head>
<body>
<div class="fixedHead header">
    <div class="wrapper">
        <div class="logo"><h1><a href="<?php echo url('/');?>">Aaron博客</a></h1></div>
        <div class="nav">
            <ul>
                <li data-index="blog" class=""><a class="ons" href="<?php echo url('/');?>">我的笔记</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    var menuCurr = 'index';
    function setCurrMenu(curr) {

        $('.fixedHead').removeClass('header');
        $('.fixedHead').removeClass('head_wrap');
        if (curr == 'index') {
            $('.fixedHead').addClass('header');
        } else {
            $('.fixedHead').addClass('head_wrap');
        }
        $('.wrapper .nav ul li').removeClass('curr');
        $('.wrapper .nav ul li[data-index='+ curr +']').addClass('curr');
    }
</script>
@yield('body')

<div class="footer">
    <div class="wrapper">
    </div>
</div>
</body>
</html>