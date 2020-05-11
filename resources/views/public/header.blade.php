<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>红河塔 / 建筑设计垂直平台</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/chocolat.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
	<!-- Web-Fonts -->
<!-- Body-Font -->	 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' type='text/css'>
<!-- Logo-Font -->	 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Bree+Serif'		   type='text/css'>
<!-- Link-Font -->	 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,500,600'	   type='text/css'>
<!-- //Web-Fonts -->
<!--<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>-->
<!--<script type="text/javascript" src="../js/bootstrap.js"></script>-->
<!-- Banner-Slider-JavaScript -->
<!--<script type="text/javascript" src="../js/responsiveslides.min.js"></script>-->
		<!--<script>
			$(function () {
				$("#slider1, #slider2").responsiveSlides({
					auto: true,
					nav: true,
					speed: 1000,
					namespace: "callbacks",
					pager: true,
				});
			});
		</script>
		<!-- //Banner-Slider-JavaScript -->
		<!-- Smooth-Scrolling-JavaScript -->

		<!-- //Smooth-Scrolling-JavaScript -->
		<style type="text/css">
			/*.navbar-default{
				position: relative;
				top: 0;
				left: 0;
				background-color:#333333;
			}*/
			.circle{
			width:30px;
		      height:30px;
		      border-radius:50%;
		      /*background-color: transparent;*/
			}
			.dropdown-menu{
				min-width: 100px !important;
			}
		</style>
</head>
<body>
	<!-- Header -->
	<div class="header" id="home">
<p id="userid" style="display:none">{{Session::get('user.id')}}</p>
		<!-- Navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">RVT</a>
				</div>

				<div id="navbar" class="navbar-collapse navbar-right collapse hover-effect">
					<ul class="nav navbar-nav" style="display: flex;">
						<li><a href="/">首页</a></li>
						<li><a href="/project">项目发布</a></li>
						<li><a href="/architectors">建筑师/团队</a></li>
						<li><a href="/architects">建筑库</a></li>
						<li><a href="/stories">故事</a></li>
						<li><a href="/competitions">竞赛</a></li>
						<li><a href="/rankings">建筑101</a></li>&nbsp;&nbsp;
						<!--<li class="dropdown-toggle" data-toggle="dropdown">-->
							<div class="dropdown">
								<a href="/architectors/architector/id={{Session::get('user.id')}}" style="background-color: transparent;">
											<img src="{{asset('')}}{{Session::get('user.logo','logo/defaultlogo.jpg')}}" class="circle" alt="" /></a>
								<!--<button class="btn dropdown-toggle" data-toggle="dropdown"> 下拉按钮</button>-->
								<ul class="dropdown-menu">
									@if(!Session::get('user.name'))
									<li><a role="menuitem" tabindex="-1" href="/user">登录注册</a></li>
									@else
										@if(!Session::get('user.phone'))
									<li><a role="menuitem" tabindex="-1" href="/user/dataform/id={{Session::get('user.id')}}">完善表格</a></li>
										@elseif(Session::get('user.user_type_id')==1)
									<li><a role="menuitem" tabindex="-1" href="/user/dataform/id={{Session::get('user.id')}}">编辑资料</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/releaseproject/id={{Session::get('user.id')}}">发布项目</a></li>
										@elseif(Session::get('user.is_pass')==1)
									<li><a role="menuitem" tabindex="-1" href="/user/dataform/id={{Session::get('user.id')}}">编辑资料</a></li>
										@elseif(Session::get('user.user_type_id')==2)
									<li><a role="menuitem" tabindex="-1" href="/architectors/architector/id={{Session::get('user.id')}}">个人中心</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/dataform/id={{Session::get('user.id')}}">编辑资料</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/releasebuliding/id={{Session::get('user.id')}}">发布建筑</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/releasestory/id={{Session::get('user.id')}}">发布故事</a></li>
										@elseif(Session::get('user.user_type_id')==3)
									<li><a role="menuitem" tabindex="-1" href="/user/dataform/id={{Session::get('user.id')}}">编辑资料</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/releasestory/id={{Session::get('user.id')}}">发布故事</a></li>
										@else
									<li><a role="menuitem" tabindex="-1" href="/user/releasecompetition">发布竞赛</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/release101">发布排名</a></li>
									<li><a role="menuitem" tabindex="-1" href="/user/manager">管理</a></li><br />
										@endif
									<li><a role="menuitem" tabindex="-1" href="">设置</a></li><br />
									<li><a role="menuitem" tabindex="-1" href="/user/logout">退出</a></li>	
									
									@endif
								</ul>
							</div>
						<!--</li>-->
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- //Navbar -->
	</div>
	<!-- //Header -->
</body>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>
<script>
		$(function () {
	  	$('.dropdown').hover(function () {
	      $(this).addClass('open');
	      $('.dropdown-toggle').attr('aria-expanded', 'true');
	    },
    function () {
      $(this).removeClass('open');
      $('.dropdown-toggle').attr('aria-expanded', 'false');
    });
});

$(function(){
	layui.config({
						base: '/layui/' //layui自定义layui组件目录
				}).use(['form','croppers'], function () {
						var $ = layui.jquery
								// ,form = layui.form
								// ,croppers = layui.croppers
								,layer= layui.layer;

		});	
			
	// setInterval(function(){
	// 	var id=$('#userid').text();
	// 	$.ajax({
	// 		url:'/getreason/id='+id,
	// 		async:true,
	// 		type:'get',
	// 		success:function(res){
	// 			if(res.text){
	// 				layer.open({
	// 					type:1,
	// 					skin:'layui-layer-rim',
	// 					area:['420px','240px'],
	// 					content:res.text,
	// 					title:'抱歉，您的审核不通过'
	// 				});				
	// 			}else{
	// 				console.log('aaa');
	// 			}
	// 		}
	// 	})
	// }	,2000);
})



</script>
</html>