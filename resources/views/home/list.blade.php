@extends('layouts.main')

@section('title')
    <title>{{$category->meta_title}}-马陆葡萄网</title>
    <meta name="keywords" content="{{$category->meta_keyword}}" />
    <meta name="description" content="{{$category->meta_description}}" />
@endsection
@section('content')
    @include('layouts.header')
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">
                <div class="BreadNav">
                    <a href="/">首页</a>／<a href="/index{{$category->id}}.html">{{$category->name}}</a>
                </div>
                <ul class="side_class4">
                    @foreach($articles as $article)
                    <li>
                        <div class="limg">
                            <a href="/thread-{{$article->id}}.html" target="_blank" >
                                <img src="{{env('IMG_URL')}}/{{$article->thumbPic}}" alt="{{$article->title}}"/>
                            </a>
                        </div>
                        <div class="rtext">
                            <div class="side3_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->title}}
                                </a></div>
                            <div class="side2_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{(mb_strlen($article->meta_description)>=130)?mb_substr($article->meta_description,0,130).'...':$article->meta_description}}
                                </a></div>
                            <div class="side3_redu">{{$article->visit_num}}</div>
                        </div>
                        <div style="clear:both"></div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="pagination">
                <?php
                    echo htmlspecialchars_decode($pageSize);
                ?>
            </div>
        </div>
        <div class="news-r">
            <div class="news-r-n">
                @foreach($categories as $k=>$cat)
                    <?php
                        $articles = \App\Models\Article::where('category_id',$cat->id)->where('status',3)->select('id','title','thumbPic')->orderBy('created_at','desc')->limit(3)->get();
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
                                    <div class="side3_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->title}}
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
@section('css')
    <link rel="stylesheet" href="/css/details.css">
    <link rel="stylesheet" href="/css/list.css">
@endsection