<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>建筑中心 -红河塔</title>
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
	<link href="{{asset('css/tagit/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('css/examples.css')}}" rel="stylesheet" type="text/css"> -->
  <!-- <link href="{{asset('css/master.css')}}" rel="stylesheet" type="text/css"> -->
  <link href="{{asset('css/tagit/tagit.ui-zendesk.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">

	@include('vendor.ueditor.assets')
</head>
<body class="body">
	@include('public.header')
	<img src="{{asset('images/22.jpg')}}" alt="">
	
	<p id="idValue" style="display:none">{{Session::get('user.id')}}</p>
	<div class="content">
		<form action="" id="storySubmit">
			<div class="content-left">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">发布故事</p>
						<div class="form-group">
							<select name="type" class="form-control" placeholder="请选择发布文章选项">
								<option value="0">请选择发布文章选项</option>
								<option value="1">美丽的家</option>
								<option value="2">趋势</option>
								<option value="3">实用手册</option>
								<option value="4">发现</option>
								<option value="5">设计+艺术</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="title" id="title" value="" placeholder="请输入文章标题"/>
						</div>	
						<div class="form-group">
							<input type="text" class="form-control" name="author" placeholder="编辑值得拥有姓名"/>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="photographer" id="" value="" placeholder="摄影师值得拥有姓名"/>
						</div>
						<div class="form-group">
							<label for="" class="control-label">文章标签:(最多输入5个标签)</label>
							<!-- <input type="text" id="tag" name="tag_user" class="form-control" placeholder="按下Enter键形成标签,最多能输入5个标签"/>
							<div class="tag"></div> -->
								<ul id="myTags">
									<!-- Existing list items will be pre-added to the tags -->
									<li>Ralph Lauren</li>
									<li>巴黎时装周</li>
								</ul>
					</div>					
					</div>

				</div>
				<div class="button">
					<button type="button" class="layui-btn" id="ajaxSubmit">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>			
				</div>
			</div>
			<!-- 编辑器容器 -->
			<script id="container" name="content" type="text/plain" style="margin-left:350px;height:700px;"></script>

		</form>			
	</div>
	@include('public.footer')
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="http://www.jq22.com/jquery/jquery-ui-1.11.0.js"></script>
	<script src="{{asset('js/tagit/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>
	
	<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

<script>
	$(document).ready(function() {
		$("#myTags").tagit();
	});
	layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers'], function () {
        var $ = layui.jquery
            ,layer= layui.layer;
	
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var id=$('#idValue').text();
	$('#ajaxSubmit').click(function(){
		var formdata=$('#storySubmit').serialize();
		var tags=$('#myTags').text().replace(/\s*/g,"");
		var text=UE.getEditor('container').getContent();

    var imgURL = '';
			text.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/, function (match, capture) {
				imgURL =  capture;
      });
		// console.log('img:'+imgURL);

// console.log(img);

		var str=UE.getEditor('container').getContentTxt();
		str=str.substring(0,200);
		var fd=formdata+'&tags='+tags+'&introduce='+str+'&imgURL='+imgURL;
		// console.log(str);
		$.ajax({
			type:'POST',
			url:"/user/releasestory/id="+id,
			// dataType:"formdata",
			data:fd,
			async:true,//异步
      processData:false,
      contentType:false,
      headers: {
        'X-CSRF-TOKEN': csrf_token,
        "Content-type":"application/x-www-form-urlencoded"
      },
			success:function(res){
				if(res.code==0){
					layer.msg(res.msg,{icon:0});
				}else if(res.code==1){
					layer.msg(res.msg,{icon:0});
				}else if(res.code==2){
					layer.msg(res.msg,{icon:0});
				}else if(res.code==3){
					layer.msg(res.msg,{icon:0});
				}else{
				layer.msg(res.msg,{icon:1});
				$('#storySubmit input').val("");
				UE.getEditor('container').val("");
				
				

				}
			},
			error:function(res){
				alert('错误');
			}
		})	
	})
});
	</script>

</body>
</html>