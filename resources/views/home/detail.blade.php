@extends('layouts.main')
@section('title')
    <title>{{$article->meta_title}}</title>
@endsection
@section('content')
    <link rel="stylesheet" href="/css/details.css">
    @include('layouts.header')
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">
                <div class="BreadNav">
                    <a href="/">首页</a>／<a href="/index{{$category->id}}.html" class="hover">{{$category->name}}</a>／<a href="/thread-{{$article->id}}.html">{{$article->title}}</a>
                </div>
                <h1>{{$article->title}}</h1>
                <div class="font2 adimg">
                    <span>发布日期：{{$article->created_at}}</span>
                    <span>出处：{{$article->source}}</span>
                    <span>作者：{{$article->author}}</span>
                    <span>阅读：{{$article->visit_num}}</span>
                </div>
                <div class="content">
                    <?php
                        echo htmlspecialchars_decode($article->content);
                    ?>
                </div>
                <div class="connext adimg">
                    @if($prevArticle)
                    <span class="nextup"><a href="/thread-{{$prevArticle->id}}.html">{{$prevArticle->title}}</a></span>
                    @endif
                    @if($nextArticle)
                    <span class="next"><a href="/thread-{{$nextArticle->id}}.html">{{$nextArticle->title}}</a></span>
                    @endif
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
                                <a href="/thread-{{$article->id}}.html">{{$article->title}}</a>
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
                                        <a href="/thread-{{$article->id}}.html" target="_blank" >
                                            <img src="{{env('IMG_URL')}}/{{$article->thumbPic}}" alt="{{$article->meta_description}}" >
                                        </a>
                                    </div>
                                    <div class="rtext">
                                        <div class="side3_title"><a href="/thread-/{{$article->id}}.html" target="_blank" >{{$article->title}}
                                            </a></div>
                                        <div class="side3_redu">{{$article->visit_num}}</div>
                                    </div>
                                    <div style="clear:both"></div>
                                </li>
                                <div style="clear:both"></div>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection