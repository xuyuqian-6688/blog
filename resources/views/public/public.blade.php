<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{session("userInfo.username")}} | 后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="/static/admin/css/bootstrap.css" rel="stylesheet">
    <link href="/static/admin/css/site.css" rel="stylesheet">
    <link href="/static/admin/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="icon" sizes="192x192" href="/static/home/assets/i/10086.png">
    {{--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}

    <!--[if lt IE 9]>
    <script src="/static/admin/js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Strass Administration</a>
            <div class="btn-group pull-right">
                <a class="btn" ><i class="icon-user"></i>{{session("userInfo.username")}}</a>
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="my-profile.html">Profile</a></li>
                    <li class="divider"></li>
                    {{--这里也可以写路由地址，但是这个是为了路由改变，方法不变的，所以这个是不受路由影响的--}}
                    <li><a href="{{action("Admin\IndexController@logout")}}">退出登录</a></li>
                </ul>
            </div>
            <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="new-user.html">New User</a></li>
                            <li class="divider"></li>
                            <li><a href="users.html">Manage Users</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="new-role.html">New Role</a></li>
                            <li class="divider"></li>
                            <li><a href="roles.html">Manage Roles</a></li>
                        </ul>
                    </li>
                    <li><a href="stats.html">Stats</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    {{--<li class="nav-header"><i class="icon-wrench"></i> Administration</li>--}}
                    <li ><a href="{{action("Admin\IndexController@index")}}">首页</a></li>
                    <li class="nav-header"><i class="icon-wrench"></i> 分类管理</li>
                        <li ><a href="{{action("Admin\CateController@show")}}">分类列表</a></li>
                        <li ><a href="{{action("Admin\CateController@add")}}">添加分类</a></li>
                    <li class="nav-header"><i class="icon-wrench"></i> 文章管理</li>
                        <li ><a href="{{action("Admin\ArticleController@show")}}">文章列表</a></li>
                        <li ><a href="{{action("Admin\ArticleController@add")}}">添加文章</a></li>
                    <li class="nav-header"><i class="icon-wrench"></i> 评论管理</li>
                        <li ><a href="{{action("Admin\PlController@show")}}">评论管理列表</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            @yield("content")
        </div>

    </div>


</div>
@yield("js")
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
</body>
</html>

