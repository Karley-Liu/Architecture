<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>建筑中心 -红河塔</title>
	<link rel="stylesheet" href="./../css/architectors.css" />
	<link rel="stylesheet" href="./../css/bootstrap.min.css" />
	@include('vendor.ueditor.assets')
</head>
<body class="body">
	@include('public.header')
	<img src="./../images/2.jpg" alt="" />
	<div class="content">
		<form action="">
			<div class="content-left">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">发布排名</p>
						<div class="form-group">
							<input type="text" class="form-control" name="title" id="title" value="" placeholder="请输入排名名称"/>
						</div>
						<div class="form-group">
							<input type="text" name="source" class="form-control" placeholder="来源"/>
						</div>						
					</div>

				</div>
			</div>
			<!-- 编辑器容器 -->
			<script id="container" name="content" type="text/plain" style="margin-left:350px;height:700px;"></script>

		</form>			
	</div>
	@include('public.footer')
	<!-- 实例化编辑器 -->
<script src="./../js/jquery.min.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

</body>
</html>