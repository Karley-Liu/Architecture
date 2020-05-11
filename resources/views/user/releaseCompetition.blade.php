<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>建筑中心 -红河塔</title>
	<link rel="stylesheet" href="./../css/architectors.css" />
	<link rel="stylesheet" href="./../css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
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
						<p class="userLocation">发布竞赛</p>
						<div class="form-group">
							<input type="text" class="form-control" name="title" id="title" value="" placeholder="请输入竞赛名称"/>
						</div>	
						<div class="form-group">
							<select name="" class="form-control">
								<option>竞赛范围</option>
								<option value="1">世界范围</option>
								<option value="2">亚洲</option>
								<option value="3">欧洲</option>
								<option value="4">非洲</option>
								<option value="5">北美洲</option>
								<option value="6">南美洲</option>
								<option value="7">澳洲</option>
								<option value="8">南极洲</option>
							</select>
						</div>
						<div class="form-group">
							<select name="" class="form-control">
								<option>竞赛类型</option>
								<option value="1">开放竞赛</option>
								<option value="2">场景设计竞赛</option>
								<option value="3">概念竞赛</option>
								<option value="4">建造大赛</option>
								<option value="5">国内竞赛</option>
								<option value="6">学生竞赛</option>
								<option value="7">国际竞赛</option>
							</select>
						</div>
						<div class="form-group">
							<label class="">开始时间</label>
							<input type="text" class="form-control" id="test1" placeholder="yyyy-MM-dd">	
						</div>
						<div class="form-group">
							<label class="">结束时间</label>
							<input type="text" class="form-control" id="test2" placeholder="yyyy-MM-dd">	
						</div>
						<div class="form-group">
							<input type="text" name="host" class="form-control" placeholder="主办方"/>
						</div>
						<div class="form-group">
							<input type="text" name="partner" class="form-control" placeholder="合作方"/>
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
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
  layui.use('laydate',function(){
    var $ = layui.jquery;
    var element=layui.element;
    var laydate=layui.laydate;

    //执行一个laydate实例
    laydate.render({
      elem:'#test1' //指定元素
    });
    laydate.render({
    	elem:'#test2'
    });
  });    
</script>


</body>
</html>