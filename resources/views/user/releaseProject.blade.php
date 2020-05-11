<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>建筑中心 -红河塔</title>
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
	<link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
	@include('vendor.ueditor.assets')
</head>
<body class="body">
	@include('public.header')
	<img src="{{asset('images/header_underway.jpg')}}" alt="" />
	<div class="content">
	<p id="idValue" style="display:none">{{Session::get('user.id')}}</p>
		<form action="" id="projectForm">
			<div class="content-left">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">发布项目</p>
						<div class="form-group">
							<input type="text" class="form-control" name="title" id="title" value="" placeholder="请输入项目名称"/>
						</div>	
						<div class="form-group">
							<input type="text" class="form-control" name="place" id="place" placeholder="地点">
						</div>
						<div class="form-group">
              <select name="type" class="form-control">
                  <option value="0">建筑类型</option>
                  <option value="1">商业建筑</option>
                  <option value="2">住宅建筑</option>
                  <option value="3">工业建筑</option>
                  <option value="4">公共空间</option>
                  <option value="5">景观</option>
                  <option value="6">城市设计与规划</option>
                  <option value="7">文化建筑</option>
                  <option value="8">政府与医疗建筑</option>
                  <option value="9">教育建筑</option>
                  <option value="10">交通与市政设施</option>
                  <option value="11">宗教建筑</option>
                  <option value="12">改造项目</option>
                  <option value="13">娱乐休闲设施</option>
                  <option value="14">室内与工业设计</option>
                  <option value="15">平面</option>
                  <option value="16">参数化设计</option>
                </select>
						</div>
						<div class="class-group">
							<input type="text" name="jiafang" class="form-control" value="{{Session::get('user.name')}}">
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
	<!-- 实例化编辑器 -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
<script>
	layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers'], function () {
        var $ = layui.jquery
            ,layer= layui.layer;
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var id=$('#idValue').text();
	$('#ajaxSubmit').click(function(){
		var formdata=$('#projectForm').serialize();
		var text=UE.getEditor('container').getContent();

    var imgURL = '';
			text.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/, function (match, capture) {
				imgURL =  capture;
      });

		var fd=formdata+'&imgURL='+imgURL;
		// console.log(str);
		$.ajax({
			type:'POST',
			url:"/user/releaseproject/id="+id,
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
				$('#projectForm input').val("");
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