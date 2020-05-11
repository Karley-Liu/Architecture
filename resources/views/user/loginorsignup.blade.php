<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>登录注册 -红河塔</title>
	<link rel="stylesheet" href="{{asset('css/loginorsignup.css')}}" />
	<link rel="stylesheet" href="{{asset('css/vidbg.css')}}">
</head>
<body>
	@include("public.header")
	<!-- <img src="../images/userbg.gif"/> -->
	<div class="container">
		<div class="panel">
			<div class="front">
				<span class="turn text-center">
					<span class="denglu active">登录</span>
					<span>/</span>
					<span class="zhuce">注册</span>
				</span>
				<form action="" method="post" id="login">
					{{csrf_field()}}
					<div class="form-group">
						<label for="email">Email 邮箱</label>
						<input type="email" class="form-control" name="email" id="email1" required="required" placeholder="Email 邮箱">
					</div>
					<div class="form-group">
						<label for="password">密码</label>
						<input type="password" class="form-control" name="password" id="password1" required="required" placeholder="密码"/>
					</div>
					<div class="form-group">
						<label for="captcha">验证码</label><br/>
			      <input name="captcha" class="form-control" style="width:49%;display:inline-block" required="required" placeholder="验证码">
						<img src="{{captcha_src()}}" id="captcha1" alt="" style="width:45%;cursor: pointer;" onclick="this.src='{{captcha_src()}}'+Math.random()"/>
					</div>
					<div class="form-group">
						<button class="btn" type="button" id="signin">登录</button>
					</div>
			        
				</form>
			</div>
			
			<div class="back hide">
				<span class="turn text-center">
					<span class="denglu2">登录</span>
					<span>/</span>
					<span class="zhuce2 active">注册</span>
				</span>			
				<form id="signup" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">请选择账户类型</label>
						<select name="user_type_id" class="form-control" id="user_type_id">
							<option value="1">甲方业主</option>
							<option value="2">乙方建筑师/团队</option>
							<option value="3">自媒体</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">账户名称</label>
						<input type="text" class="form-control" name="name" id="name" required="required" placeholder="账户名称（注册后可更改）"/>
					</div>
					<div class="form-group">
						<label for="email">Email 邮箱</label>
						<input type="email" class="form-control" name="email" id="email" required="required" placeholder="Email 邮箱">
					</div>
					<div class="form-group">
						<label for="password">密码</label>
						<input type="password" class="form-control" name="password" id="password" required="required" placeholder="密码">
			    </div>
			    <div class="form-group">              
			      <input class="form-control" style="width:49%;display:inline-block" name="captcha" id="captcha" maxlength="5" required="required" placeholder="验证码">
						<img src="{{captcha_src()}}" alt="" style="width:45%;cursor: pointer;" onclick="this.src='{{captcha_src()}}'+Math.random()"/>                  
					</div>
					<div class="form-group">
			        <p style="color:white;">添加辅助证明：<input type="file" style="" name="avatar" id="avatar" multiple="multiple"/></p>
						<!-- <div class="upload-wrap" nv-file-drop="" uploader="uploader">
							<input class="file-ele" type="file" name="avatar" nv-file-select uploader="uploader" multiple />
							<div class="file-open">上传辅助证明</div>    
						</div> -->
					</div>
					<div class="form-group">
						<button id="register" class="btn" type="button">注册</button>
					</div>
				</form>			
			</div>			
		</div>
	</div>

	
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/vidbg.js')}}"></script>
	<script>
	  vidbg(document.body, [
    // {src: 'http://cf.cdn.vid.ly/3l6g3m/webm.webm', type: 'webm'},
    {src: "http://video-oss.archcollege.com/arch/UNStudio%20set%20to%20build%20Dubai%20tower%20with%20world's%20tallest%20ceramic%20facade.mp4", type: 'mp4'},
    // {src: 'http://cf.cdn.vid.ly/3l6g3m/ogv.ogv', type: 'ogg'}
	], true);
	// $('#captcha1').load(location.href+"#captcha");
		$(".turn .zhuce").click(function(){
			$('.back').removeClass("hide");
			$('.front').addClass("hide");
			$('.back').toggleClass("back-turn");
			$('.front').toggleClass("front-turn");
		})
		$(".turn .denglu2").click(function(){
			$('.front').removeClass("hide");
			$('.back').addClass("hide");
			$('.back').toggleClass("back-turn");
			$('.front').toggleClass("front-turn");
		})
		
		layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers'], function () {
        var $ = layui.jquery
            ,layer= layui.layer;

var csrf_token = $('meta[name="csrf-token"]').attr('content');
		$('#signin').click(function(){
			var formdata=new FormData($('#login')[0]);
			$.ajax({
				type:"POST",
				url:"/user/usersignin",
				data:formdata,
				async:false,
				processData:false,
				contentType:false,
				headers: {
          'X-CSRF-TOKEN': csrf_token
				},
				success:function(res){
					if(res.code==0){
						layer.msg(res.msg,{icon:0});
					}else if(res.code==1){
						layer.msg(res.msg,{icon:2});
					}else{
						layer.msg(res.msg,{icon:1});
						window.location.replace("/");
					}
				},
				error:function(res){
					alert("登录失败");
				}
			})
		})

		$('#register').click(function(){
		var formdata=new FormData($("#signup")[0]);
//		console.log($("#avatar")[0].files[0]);
			$.ajax({
				type:"POST",
				url:"/user/userregister",
				data:formdata,
				async:false,
				processData:false,
				contentType:false,
				headers: {
          'X-CSRF-TOKEN': csrf_token
        },
            	success:function(res){
								console.log(res);
            		if(res.code==0){
									layer.msg(res.msg,{icon:0});
								}else if(res.code==1){
									layer.msg(res.msg,{icon:2});
								}else if(res.code==2){
									layer.msg(res.msg,{icon:2});
								}else{
									layer.msg(res.msg, {icon: 1});
									window.location.reload();
								}
            	},
            	error:function(res){
            		alert("asdf");
          }
			})
		})
	});
	</script>
</body>
</html>