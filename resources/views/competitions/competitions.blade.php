<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>竞赛 - 红河塔</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/architectors.css" />
	<link rel="stylesheet" href="./css/competitions.css" />
</head>
<body class="body">
	@include('public.header')
	<img src="./images/competition_1.jpg" alt=""/>
	<div class="square">
		<div class="square-1"></div>
		<div class="square-2"></div>
		<h2 class="square-3">竞赛</h2>
	</div>
	<div class="content">
		<div class="content-left">
			<div class="content-left-1">
				<div class="littleBox">
					<p class="userLocation">竞赛类型<br /><p style="font-weight: bold;color:#666;">所有</p></p>
						<br />
						<div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    开放竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    场景设计竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    建造竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    概念竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    建造大赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    国内竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    学生竞赛
							  </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
							    国际竞赛
							  </label>
							</div>
							<div class="button-group">
								<input type="button" value="搜索" class="btn" id="btn"/>
								<input type="reset" value="重置" class="btn" id="btn"/>
							</div>
						</div>					
				</div>
			</div>			
		</div>
		<div class="content-right row">
			<div class="content-panel">
				<a href="{{$url}}">
					<img src="./images/FT2020.jpg" alt="" />
						<div class="content-box row">
							<h4 class="text-left">竞赛召集：2020年童话竞赛</h4>
								<p class="list-p">世界范围 | 国际竞赛 | 2019.11.12-2019.11.21</p>
								<p class="text-left cor">主办方：XXXX | 合作方：XXXX</p>
						</div>
				</a>
			</div>
			<div class="content-panel">
				<a href="">
					<img src="./images/FT2020.jpg" alt="" />
						<div class="content-box row">
							<h4 class="text-left">竞赛召集：2020年童话竞赛</h4>
								<p class="list-p">世界范围 | 国际竞赛 | 2019.11.12-2019.11.21</p>
								<p class="text-left cor">主办方：XXXX | 合作方：XXXX</p>
						</div>
				</a>
			</div>
			<div class="content-panel">
				<a href="">
					<img src="./images/FT2020.jpg" alt="" />
						<div class="content-box row">
							<h4 class="text-left">竞赛召集：2020年童话竞赛</h4>
								<p class="list-p">世界范围 | 国际竞赛 | 2019.11.12-2019.11.21</p>
								<p class="text-left cor">主办方：XXXX | 合作方：XXXX</p>
						</div>
				</a>
			</div>
			<div class="content-panel">
				<a href="">
					<img src="./images/FT2020.jpg" alt="" />
						<div class="content-box row">
							<h4 class="text-left">竞赛召集：2020年童话竞赛</h4>
								<p class="list-p">世界范围 | 国际竞赛 | 2019.11.12-2019.11.21</p>
								<p class="text-left cor">主办方：XXXX | 合作方：XXXX</p>
						</div>
				</a>
			</div>
			<div class="content-panel">
				<a href="">
					<img src="./images/FT2020.jpg" alt="" />
						<div class="content-box row">
							<h4 class="text-left">竞赛召集：2020年童话竞赛</h4>
								<p class="list-p">世界范围 | 国际竞赛 | 2019.11.12-2019.11.21</p>
								<p class="text-left cor">主办方：XXXX | 合作方：XXXX</p>
						</div>
				</a>
			</div>
		</div>
	</div>
	@include('public.footer')
</body>
</html>