@extends('h5.layouts.main')
@section('title')
    @if($baseConfig)
        <title>{{$baseConfig->title}}-{{$baseConfig->name}}</title>
        <meta name="keywords" content="{{$baseConfig->home_key_word}}" />
        <meta name="description" content="{{$baseConfig->home_meta_description}}" />
    @endif
@endsection
@section('content')
    <div class="content_top">
        <div class="arrowl"><a href="/index"><img src="/h5/images/home.png" alt="首页" height="22"></a></div>
        <div class="context">马陆葡萄网</div>
        <div class="arrowr"><a href="#" class="more" id="dhmore"><img src="/h5/images/more.png" height="23"></a></div>
    </div>
    <div class="cnsnav">
        <div class="navlayer" id="navlayer">
            <div class="cnsnav">
                <ul id="">
                    <li class="selimg"><a href="/">首页</a></li>

                    <li><a href="/index2.html">价格</a></li>

                    <li><a href="/index4.html">知识</a></li>

                    <li><a href="/index9.html">采摘</a></li>

                    <li><a href="/index10.html">品种</a></li>
                    <li><a href="/payment">付款</a></li>
                    <li><a href="/instruction">说明</a></li>
                    <li><a href="/about">须知</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header>
        <nav>
            <a target="_blank" href="/">首页</a>
            <a href="/index2.html" >价格</a>
            <a href="/index4.html" >知识</a>
            <a href="/index9.html" >采摘</a>
            <a href="/index10.html" >品种</a>
            <a href="/payment" >付款</a>
            <a href="/instruction" >说明</a>
            <a href="/about" >须知</a>
        </nav>
    </header>
    @foreach($news as $k => $new)
        @if($k == 0)
    <h3 class="headNew"><a href="/thread-{{$new->id}}.html" title="{{$new->title}}">{{$new->title}}</a></h3>
    <h5 class="subNew">{{mb_substr($new->meta_description,0,32)}}...<a href="/index6.html">[更多]</a></h5>
        @else
                @break;
        @endif
    @endforeach

    <!-- 焦点图 -->
    <div class="imgSwipeMain">
        <div id="slider" class="swipe">
            <div class="swipe-wrap swiper-wrapper">
                @foreach($goods as $img)
                <div class="image swiper-slide" style="background:url({{env('IMG_URL')}}/{{$img->thumbPic}}) center no-repeat;background-size: cover;"> <a href="/g-{{$img->id}}.html"></a>
                    <div class="title">
                        <p>{{$img->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="position"></div>
    </div>

    <!-- Tab切换（高度自适应示范） -->
    <script type="text/javascript">
        TouchSlide( { slideCell:"#tabBox1",
            endFun:function(i){ //高度自适应
                var bd = document.getElementById("tabBox1-bd");
                bd.parentNode.style.height = bd.children[i].children[0].offsetHeight+"px";
                if(i>0)bd.parentNode.style.transition="200ms";//添加动画效果
            }
        } );</script>
    <!-- Tab切换 -->
    <div id="tabBox2" class="tabBox">
        <div class="hd">
            <h3><a href="/index2.html" >价格</a><span>Focus</span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($priceNews as $price)
                <li><a href="/thread-{{$price->id}}.html" title="{{$price->title}}">{{$price->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index1.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox2" } );</script>

    <div class="ad_wap"></div>

    <div id="tabBox3" class="tabBox">
        <div class="hd">
            <h3><a href="/index4.html" >知识</a><span>Tech</span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($knowsNews as $effect)
                <li><a href="/thread-{{$effect->id}}.html" title="{{$effect->title}}">{{$effect->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index4.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox3" } );</script>

    <div id="tabBox4" class="tabBox">
            <div class="hd">
            <h3><a href="/index9.html">采摘</a><span></span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($czNews as $plant)
                <li><a href="/thread-{{$plant->id}}.html" title="{{$plant->title}}">{{$plant->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index10.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox4" } );</script>


    <!-- 效果导航 -->
    <div class="effectNav">
        <h3><a href="/">首页</a>&#160;&#160;&#160;|&#160;&#160;&#160;<a href="list.php?tid=60" >帮助</a></h3>
        <p>首页 | 资讯 | 价格 | 功效 | 种植 | 冲泡 | 图片 | 品牌</p>
        <p></p>
    </div>
    <div id="goTopBtn"><img src="/h5/images/top.png" width="30"></div>
    <script src="/h5/js/top.js" type="text/javascript"></script>
    <script type="text/javascript">goTopEx();</script>
@endsection