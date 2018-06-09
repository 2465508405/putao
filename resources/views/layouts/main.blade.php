<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	@yield('title')
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/base.css">
	<script src="/js/jquery.min.js"></script>
	<!--文字滚动 start-->
	{{--<script type="text/javascript">--}}
		{{--var speed=40--}}
		{{--window.onload=function(){--}}
			{{--var demo=document.getElementById("demo");--}}
			{{--var demo2=document.getElementById("demo2");--}}
			{{--var demo1=document.getElementById("demo1");--}}
			{{--demo2.innerHTML=demo1.innerHTML--}}
			{{--function Marquee(){--}}
				{{--if(demo.scrollTop>=demo1.offsetHeight){--}}
					{{--demo.scrollTop=0;--}}
				{{--}--}}
				{{--else{--}}
					{{--demo.scrollTop=demo.scrollTop+1;--}}
				{{--}--}}
			{{--}--}}
			{{--var MyMar=setInterval(Marquee,speed)--}}
			{{--demo.onmouseover=function(){clearInterval(MyMar)}--}}
			{{--demo.onmouseout=function(){MyMar=setInterval(Marquee,speed)}--}}
		{{--}--}}
	{{--</script>--}}
</head>
<body>
@yield('content')
@include('layouts.footer')
@yield('css')
@yield('script')
<style>
	.footer .links{
		width:1200px;
	}

	.footer .c-info{
		width:1200px;
	}
</style>
</body>
</html>