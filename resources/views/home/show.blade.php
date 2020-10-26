@extends("home_public/public")
    @section("luobo")
        <ul class="am-slides">
            <li>
                <img src="/static/home/assets/i/b2.jpg">{{--此处轮播，添加图片--}}
                <div class="blog-slider-desc am-slider-desc ">
                    <div class="blog-text-center blog-slider-con">
                        <span><a href="" class="blog-color">Article &nbsp;</a></span>
                        <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                        <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                        </p>
                        <span class="blog-bor">2015/10/9</span>
                        <br><br><br><br><br><br><br>
                    </div>
                </div>
            </li>
            <li>
                <img src="/static/home/assets/i/b1.jpg">{{--此处轮播，添加图片--}}
                <div class="blog-slider-desc am-slider-desc ">
                    <div class="blog-text-center blog-slider-con">
                        <span><a href="" class="blog-color">Article &nbsp;</a></span>
                        <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                        <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                        </p>
                        <span class="blog-bor">2015/10/9</span>
                        <br><br><br><br><br><br><br>
                    </div>
                </div>
            </li>
            <li>
                <img src="/static/home/assets/i/b3.jpg">{{--此处轮播，添加图片--}}
                <div class="blog-slider-desc am-slider-desc ">
                    <div class="blog-text-center blog-slider-con">
                        <span><a href="" class="blog-color">Article &nbsp;</a></span>
                        <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                        <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                        </p>
                        <span class="blog-bor">2015/10/9</span>
                        <br><br><br><br><br><br><br>
                    </div>
                </div>
            </li>
        </ul>
        @endsection
    @section("content")
    <div class="am-u-md-8 am-u-sm-12">
        {{--此处内容页，循环--}}
        @foreach($article as $articles)
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="/static/home/images/{{mt_rand(1,30)}}.jpg" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span><a href="" class="blog-color">{{$articles->cateInfo->name}} &nbsp;</a></span>
                <span>乾哥哥&nbsp;</span>
                <span>{{$articles->created_at}}</span>
                <h1><a href="{{action("Home\IndexController@detail",["id"=>$articles->id])}}">{{$articles->title}}</a></h1>
                <p>{{$articles->getRemark()}}</p>
                <p><a href="" class="blog-continue">continue reading</a></p>
            </div>
        </article>
        @endforeach
        <ul class="am-pagination">
            @if($article->previousPageUrl())
                <li class="am-pagination-prev"><a href="{{$article->appends(["search"=>$search])->previousPageUrl()}}">&laquo; Prev</a></li>
            @endif
            @if( $article->nextPageUrl())
            <li class="am-pagination-next"><a href="{{$article->appends(["search"=>$search])->nextPageUrl()}}">Next &raquo;</a></li>
            @endif
        </ul>
    </div>
    @endsection
