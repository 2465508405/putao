<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<meta name="keywords" content="马陆葡萄,马陆葡萄采摘园,马陆葡萄价格,马陆葡萄品种," />
	<meta name="description" content="马陆葡萄网（隶属于上海徽尚电子商务有限公司），采用自产自销的方式销售自己种植的优质马陆葡萄！同时联合多家经“马陆”牌葡萄商标管理单位“嘉定区马陆镇农业综合服务站”供货，让市民能吃上正宗的马陆葡萄。" />
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/base.css">
	<script src="/js/jquery.min.js"></script>
	<!--文字滚动 start-->
	<script type="text/javascript">
		var speed=40
		window.onload=function(){
			var demo=document.getElementById("demo");
			var demo2=document.getElementById("demo2");
			var demo1=document.getElementById("demo1");
			demo2.innerHTML=demo1.innerHTML
			function Marquee(){
				if(demo.scrollTop>=demo1.offsetHeight){
					demo.scrollTop=0;
				}
				else{
					demo.scrollTop=demo.scrollTop+1;
				}
			}
			var MyMar=setInterval(Marquee,speed)
			demo.onmouseover=function(){clearInterval(MyMar)}
			demo.onmouseout=function(){MyMar=setInterval(Marquee,speed)}
		}
	</script>
</head>
<body>
@yield('content')
@include('layouts.footer')
@yield('css')
@yield('script')
</body>
</html>