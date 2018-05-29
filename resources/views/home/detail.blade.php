@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/details.css">
    @include('layouts.header')
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">
                <div class="BreadNav">
                    {{--<a href="/">马陆葡萄网</a>&nbsp;/&nbsp;--}}
                    {{--<a href="/">养花精选</a>&nbsp;/&nbsp;<a href="/cyyh">创意养花</a>&nbsp;/&nbsp;--}}
                    <a class="hover">{{$category->name}}</a>
                </div>
                <h1>{{$article->title}}</h1>
                <div class="font2 adimg">
                    <span>发布日期：{{$article->created_at}}</span>
                    <span>出处：{{$article->source}}</span>
                    <span>作者：{{$article->author}}</span>
                    <span>阅读：{{rand(7,3222)}}</span>
                </div>
                <div class="content">
                    <?php
                        echo htmlspecialchars_decode($article->content);
                    ?>
                </div>
                <div class="connext adimg">
                    <span class="nextup"><a href="/detail/{{$article->id-1}}.html">家里没地养花?错!是你不会养</a></span>
                    <span class="next"><a href="/detail/{{$article->id+1}}.html">封闭阳台、室内窗台也能打造超美花园</a></span>
                </div>
            </div>
        </div>
        <div class="news-r">
            <div class="news-r-n">
                @foreach($categories as $k=>$cat)
                    <?php
                    $articles = \App\Models\Article::where('category_id',$cat->id)->where('status',3)->select('id','title','thumbPic')->limit(10)->get();
                    ?>
                    @if($k == 0)
                        <div class="news-r-t">
                            <h2>{{$cat->name}}</h2>
                        </div>
                        <div class="tag">
                            @foreach($articles as $article)
                                <a href="/detail/{{$article->id}}">{{$article->title}}</a>
                            @endforeach
                        </div>
                    @else
                        <div class="news-r-t">
                            <h2>{{$cat->name}}</h2>
                        </div>
                        <ul class="side_class3">
                            @foreach($articles as $article)
                                <li>
                                    <div class="limg">
                                        <a href="/detail/{{$article->id}}" target="_blank" >
                                            <img src="{{env('IMG_URL')}}/{{$article->thumbPic}}" alt="{{$article->meta_description}}" >
                                        </a>
                                    </div>
                                    <div class="rtext">
                                        <div class="side3_title"><a href="/detail/{{$article->id}}" target="_blank" >{{$article->title}}
                                            </a></div>
                                        <div class="side3_redu">{{rand(9,1111)}}</div>
                                    </div>
                                    <div style="clear:both"></div>
                                </li>
                                <div style=" clear:both"></div>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection