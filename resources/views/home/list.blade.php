@extends('layouts.main')

@section('title')
    <title>马陆葡萄_马陆葡萄采摘园_马陆葡萄价格品种</title>
@endsection
@section('content')
    @include('layouts.header')
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">
                <div class="BreadNav">
                    <a href="/">马陆葡萄网</a>&nbsp;/&nbsp;
                    <a href="/">养花精选</a>&nbsp;/&nbsp;<a href="/cyyh">创意养花</a>&nbsp;/&nbsp;
                    <a class="hover">吊兰文竹也能养成瀑布</a>
                </div>
                <ul class="side_class4">
                    @foreach($articles as $article)
                    <li>
                        <div class="limg">
                            <a href="/detail/{{$article->id}}" target="_blank" >
                                <img src="{{env('IMG_URL')}}/{{$article->thumbPic}}" alt="{{$article->meta_description}}"/>
                            </a>
                        </div>
                        <div class="rtext">
                            <div class="side3_title"><a href="/detail/{{$article->id}}" target="_blank" >{{$article->title}}
                                </a></div>
                            <div class="side2_title"><a href="" target="_blank" >{{$article->meta_description}}
                                </a></div>
                            <div class="side3_redu">{{rand(7,999)}}</div>
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
               <!--  <span class="pagination-curr">1</span>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
                <a href="">5</a>
                <span>…</span>
                <a href="" class="pagination-last" title="尾页">249</a>
                <a href="" class="pagination-next">下一页</a> -->
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
@section('css')
    <link rel="stylesheet" href="/css/details.css">
    <link rel="stylesheet" href="/css/list.css">
@endsection