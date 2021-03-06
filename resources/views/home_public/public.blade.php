<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{session("userInfo.username")}}|这是你的博客</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/10086.png">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/static/home/assets/i/10086.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="/static/home/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileImage" content="/static/home/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="/static/home/assets/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/home/assets/css/app.css">
</head>

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered"  >
        <img width="400" height="250" src="/static/home/images/{{mt_rand(1,30)}}.jpg" alt=""/>
        <h2 class="am-hide-sm-only">中国现代著名诗人，乾哥哥在线吟诗对唱</h2>
    </div>
</header>
<hr>
<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a >php</a></li>
            <li class="am-active"><a >mysql</a></li>
            <li class="am-active"><a >linux</a></li>
            <li class="am-active"><a >html</a></li>
            {{--<li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    首页布局 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="lw-index.html">1. blog-index-standard</a></li>
                    <li><a href="lw-index-nosidebar.html">2. blog-index-nosidebar</a></li>
                    <li><a href="lw-index-center.html">3. blog-index-layout</a></li>
                    <li><a href="lw-index-noslider.html">4. blog-index-noslider</a></li>
                </ul>
            </li>
            <li><a href="lw-article.html">标准文章</a></li>
            <li><a href="lw-img.html">图片库</a></li>
            <li><a href="lw-article-fullwidth.html">全宽页面</a></li>
            <li><a href="lw-timeline.html">存档</a></li>--}}
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" role="search" method="get" action="{{action("Home\IndexController@show")}}">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索" name="search">
            </div>
        </form>
    </div>
</nav>
<hr>
<!-- nav end -->
<!-- banner start -->
<div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
    <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
        @yield("luobo")
    </div>
</div>
<!-- banner end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    @yield("content")
    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>这是小paopao友</span></h2>
            <img src="/static/home/assets/i/f161.jpg" alt="about me" class="blog-entry-img" >
            <p>+妹纸 V</p>
            <p>
                大家好！我是妹子UII
            </p>
            <p>
                我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，
                后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？<br>
                加我微信我们晚上聊 <b>V:17063188_aft</b>
            </p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href="https://www.qq.com/"><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href="https://open.weibo.com/"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href="https://wx.qq.com/"><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>TAG cloud</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
                <a href="http://106.53.100.181/" class="blog-tag">amaze</a>
                <a href="http://106.53.100.181/" class="blog-tag">妹纸 UI</a>
                <a href="http://106.53.100.181/" class="blog-tag">HTML5</a>
                <a href="http://106.53.100.181/" class="blog-tag">这是标签</a>
                <a href="http://106.53.100.181/" class="blog-tag">Impossible</a>
                <a href="http://106.53.100.181/" class="blog-tag">开源前端框架</a>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>么么哒</span></h2>
            <ul class="am-list">
                <li><a href="http://106.53.100.181/">每个人都有一个死角， 自己走不出来，别人也闯不进去。</a></li>
                <li><a href="http://106.53.100.181/">我把最深沉的秘密放在那里。</a></li>
                <li><a href="http://106.53.100.181/">你不懂我，我不怪你。</a></li>
                <li><a href="http://106.53.100.181/">每个人都有一道伤口， 或深或浅，盖上布，以为不存在。</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- content end -->



<footer class="blog-footer" style="background-color: #027359;">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>博客简介</h3>
            <p class="am-text-sm">这是一个使用amazeUI做的简单的前端模板。<br> 博客/ 资讯类 前端模板 <br> <br>支持响应式，多种布局，包括主页、文章页、媒体页、分类页等<br><br>后台采用laravel 5.5框架<br>
                <br><br>环境：apache2.4 + mysql5.7 + php7.3
            </p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href="https://www.qq.com/"><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href="https://open.weibo.com/"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href="https://wx.qq.com/"><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
            <h3>Credits</h3>
            <p>我们追求卓越，然时间、经验、能力有限。Amaze UI 有很多不足的地方，希望大家包容、不吝赐教，给我们提意见、建议。感谢你们！</p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h1>我们站在巨人的肩膀上</h1>
            <h3>Heroes</h3>
            <p>
            <ul>
                <li>jQuery</li>
                <li>Zepto.js</li>
                <li>Seajs</li>
                <li>LESS</li>
                <li>...</li>
            </ul>
            </p>
        </div>
    </div>
{{--    <div class="blog-text-center">© 2015 AllMobilize, Inc. Licensed under MIT license. Made with love By LWXYFER</div>--}}
</footer>





<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/static/home/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/static/home/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/static/home/assets/js/amazeui.min.js"></script>
</body>
</html>