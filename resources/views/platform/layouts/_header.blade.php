<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>易可达门户</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/platform/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="/platform/css/animate.css" rel="stylesheet">
    <link href="/platform/css/layout.css?v=11.19.1" rel="stylesheet">
    <script src="/platform/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/platform/js/jquery.SuperSlide.2.1.2.js"></script>
    <script src="/platform/js/korbin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/platform/js/TweenLite.min.js"></script>
    <script type="text/javascript" src="/platform/js/lem_counter.js"></script>
    <script type="text/javascript" src="/platform/layui/layui.js"></script>
</head>
<body>
    <div class="fixedHead header">
        <div class="wrapper">
            <div class="logo"><h1><a href="<?php echo url('/');?>"><img src="/platform/img/logo.png" alt="" /></a></h1></div>
            <div class="nav">
                <ul>
                    <li data-index="index" class=""><a class="ons" href="<?php echo url('/');?>">首页</a></li>
                    <li data-index="osw"><a class="ons" href="<?php echo url('/osw');?>">海外仓</a></li>
                    <li data-index="business"><a class="ons" href="javascript:;">产品业务</a>
                        <div class="submenu">
                            <a href="<?php echo route('business', ['type' => 'business1']);?>">海外仓服务</a>
                            <a href="<?php echo route('business', ['type' => 'business2']);?>">头程物流服务</a>
                            <a href="<?php echo route('business', ['type' => 'business3']);?>">尾程物流服务</a>
                        </div>
                    </li>
                    <li data-index="dada"><a class="ons" href="javascript:;">达达学院</a>
                        <div class="submenu">
                            <a href="<?php echo route('help', ['type' => 'faq']);?>">常见问题</a>
                            <a href="<?php echo route('help', ['type' => 'news']);?>">新闻资讯</a>
                        </div>
                    </li>
                    <li data-index="about"><a class="ons" href="<?php echo url('/about');?>">关于我们</a></li>
                    <li data-index="platform"><a class="ons" target="_blank" href="http://oms.goodcang.com/default/open">开放平台</a></li>
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
            <div class="footMenu">
                <div class="menulink">
                    <div class="menuTab footAbout">
                        <h3>关于我们</h3>
                        <div class="tabs">
                            <a href="<?php echo url('/about');?>">公司介绍</a>
                            <a href="<?php echo route('help', ['type' => 'news']);?>">新闻资讯</a>
                            <a href="<?php echo url('/about');?>">加入我们</a>
                        </div>
                    </div>
                    <div class="menuTab">
                        <h3>友情链接</h3>
                        <div class="tabs"><a href="http://goodcang.com/">谷仓官网</a><a href="http://edoshipping.com/">易渡官网</a></div>
                    </div>
                </div>
                <div class="btmContact">
                    <h3>深圳易可达科技有限公司</h3>
                    <p class="tel">0755-21001612</p>
                    <p class="email"><a href="mailto:kf@goodcang.com">kf@goodcang.com</a></p>
                </div>
                <div class="btmWachat">
                    <ul>
                        <li><img src="/platform/img/eq1.jpg " alt="" /><p>微信公众号</p></li>
                        <li><img src="/platform/img/eq2.jpg " alt="" /><p>新浪微博</p></li>
                    </ul>
                </div>
            </div>
            <div class="copyright"><p>Copyright ©2014-2018 深圳易可达科技有限公司 粤ICP备16045411号-1</p></div>
        </div>
    </div>
</body>
</html>