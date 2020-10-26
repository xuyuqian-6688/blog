@extends("home_public/public")
@section("content")
    <div class="am-u-md-8 am-u-sm-12">
        <article class="am-article blog-article-p">
            <div class="am-article-hd">
                <h1 class="am-article-title blog-text-center">{{$data->title}}</h1>
                <p class="am-article-meta blog-text-center">
                    <span><a href="#" class="blog-color">{{$data->cateInfo->name}} &nbsp;</a></span>-
                    <span><a >乾哥哥 &nbsp;</a></span>-
                    <span><a >{{$data->created_at}}</a></span>
                </p>
            </div>
            <div class="am-article-bd">
                <img src="assets/i/f10.jpg" alt="" class="blog-entry-img blog-article-margin">
                {!! $data->content !!}
            </div>
        </article>

        <div class="am-g blog-article-widget blog-article-margin">
            <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
                <span class="am-icon-tags"> &nbsp;</span><a href="#">标签</a> , <a href="#">TAG</a> , <a href="#">啦啦</a>
                <hr>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
            </div>
        </div>

        <hr>
        @foreach($data->comment() as $key =>$vlaue)
            <div class="am-g blog-author blog-article-margin">
                <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
                    <img src="/static/home/assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
                </div>
                <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
                    <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">{{ $vlaue->name }}</span></h3>
                    <p>{{ $vlaue->content }}</p>
                </div>
            </div>
            <hr>
        @endforeach
        <hr>

        <hr>
        @if(count($errors) > 0)

            @foreach($errors->all() as $error)
                <div class="am-alert am-alert-danger" style="">{{ $error }}</div>
            @endforeach

        @endif

        @if(session('errMsg'))
            <div class="am-alert am-alert-danger" style="">{{ session('errMsg') }}</div>
        @endif
        <form class="am-form am-g" action="{{action("Home\IndexController@pl")}}" method="post">
            <input type="hidden" name="article_id" value="{{ $data->id }}">
            <h3 class="blog-comment">欢迎评论</h3>
            <fieldset>
                <div class="am-form-group am-u-sm-4 blog-clear-left">
                    <input type="text" class="" placeholder="名字" name="name">
                </div>
                <div class="am-form-group am-u-sm-4">
                    <input type="email" class="" placeholder="邮箱" name="email">
                </div>

                <div class="am-form-group am-u-sm-4 blog-clear-right">
                    <input type="password" class="" placeholder="网站" name="site_url">
                </div>

                <div class="am-form-group">
                    <textarea class="" rows="5" placeholder="一字千金" name="content"></textarea>
                </div>

                <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
            </fieldset>
        </form>

        <hr>
    </div>
@endsection
