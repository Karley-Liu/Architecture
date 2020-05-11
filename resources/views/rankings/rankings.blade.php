<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>排名 - 红河塔</title>
	<link rel="stylesheet" href="./css/rankings.css" />
</head>
<body class="body">
	@include('public.header')
	<img src="./images/rankingbg.jpg" alt="" style="width:1519px;height:358px;"/>
	<div class="square">
		<div class="square-1"></div>
		<div class="square-2"></div>
		<h2 class="square-3">建筑101</h2>
	</div>	
	<div class="content">
		<div class="panel">
			<div class="littleBox">
				<a href="{{$url}}">
					<img src="./images/FT2020.jpg"/>
					<p class="title">2019年中国最具影响力100位建筑设计精英</p>
				</a>
			</div>
		</div>
		<div class="panel">
			<div class="littleBox">
				<a href="">
					<img src="./images/FT2020.jpg"/>
					<p class="title">2019年中国最具影响力100位建筑设计精英</p>
				</a>
			</div>
		</div>
		<div class="panel">
			<div class="littleBox">
				<a href="">
					<img src="./images/FT2020.jpg"/>
					<p class="title">2019年中国最具影响力100位建筑设计精英</p>
				</a>
			</div>
		</div>
		<div class="panel">
			<div class="littleBox">
				<a href="">
					<img src="./images/FT2020.jpg"/>
					<p class="title">2019年中国最具影响力100位建筑设计精英</p>
				</a>
			</div>
		</div>
	</div>
	@include('public.footer')
</body>
</html>