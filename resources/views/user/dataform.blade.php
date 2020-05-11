<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>资料提交</title>
	<link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
	<link rel="stylesheet" href="{{asset('css/dataform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}"> -->
	<link href="{{asset('css/tagit/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('css/examples.css')}}" rel="stylesheet" type="text/css"> -->
  <!-- <link href="{{asset('css/master.css')}}" rel="stylesheet" type="text/css"> -->
  <link href="{{asset('css/tagit/tagit.ui-zendesk.css')}}" rel="stylesheet" type="text/css">

</head>
<body class="body">
	@include('public.header')
	<img src="{{asset('images/22.jpg')}}" alt="">
	
	<div class="square">
		<div class="designer">
			<p id="idValue" style="display:none">{{Session::get('user.id')}}</p>
			<form class="row" id="dataform">
			{{csrf_field()}}
			@if(!Session::get('user.phone'))
				<h3 class="text-center">亲爱的建筑人，欢迎来到红河塔</h3><br />
				<h4 class="text-center">完善表格能更快通过审核</h4>
			@else
			<h3 class="text-center">编辑资料</h3>
			@endif
				<div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
					<!-- <div class="form-group">
							<label>头像</label>
							<div class="layui-upload">
								<div class="layui-upload-list">
									<img class="layui-upload-img" id="demo1" style="width: 100px;height: 100px;" src="{{asset('')}}{{Session::get('user.logo')}}">
									<p id="demoText"></p>
								</div>
								<button type="button" class="layui-btn" id="test1" data-src="{$find.admin_logo}">上传图片</button>
							</div>
					</div> -->
					@include('user.logoupload')
					@if(Session::get('user.user_type_id')==2)
						<div class="form-group">
							<label for="" class="control-label">擅长领域:(最多输入5个标签)</label>
							<!-- <input type="text" id="tag" name="tag_user" class="form-control" placeholder="按下Enter键形成标签,最多能输入5个标签"/>
							<div class="tag"></div> -->
								<ul id="myTags">
									<!-- Existing list items will be pre-added to the tags -->
									<li>商业建筑</li>
									<li>园林景观</li>
								</ul>
						</div>
					@endif

					<div class="form-group row">
						<div class="col-md-3">
						<label for="continent">大洲</label>
							<select name="continent" id="continent" class="col-md-2 form-control">
								<!-- <option value="{{Session::get('user.continent','')}}"></option> -->
							</select>
						</div>
						<div class="col-md-5">
						<label for="country">国家</label>
							<select name="country" id="country" class="form-control">
								<!--<option value=""></option>-->
							</select>
						</div>
						<div class="col-md-4">
						<label for="city">城市</label>
							<select name="city" id="city" class="form-control col-md-5">
								<!--<option value=""></option>-->
							</select>
						</div>
					</div>
					<!--洲际、国家、城市用接口-->
					<div class="form-group">
						<label for="address">地址：</label>
						<input type="address" name="address" class="form-control" placeholder="具体地址" value="{{Session::get('user.address','')}}"/>
					</div>
					<div class="form-group">
						<label for="">电话:</label><br />
						<input type="phone" id="phone" name="phone" class="form-control" value="{{Session::get('user.phone','')}}"/>
						<!-- <div style="display: flex;">
							<button class="layui-btn">发送短信验证码</button>&nbsp;&nbsp;
							<input type="text" name="check" class="form-control" placeholder="输入短信验证码"/>							
						</div> -->

					</div>
					<!--电话用+86那些接口-->
					<div class="form-group">
						<label for="">官网网址:</label>
						<input type="url" name="com_url" class="form-control" value="{{Session::get('user.com_url','')}}"/>
					</div>
					<div class="form-group">
						<label for="">公司简介:</label>
						<textarea name="introduce" required lay-verify="required" placeholder="请输入" class="layui-textarea">
						{{Session::get('user.introduce','')}}
						</textarea>
					</div>
					<button type="button" class="layui-btn" id="ajaxsubmit">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</form>
		</div>
	</div>
	@include('public.footer')
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/intlTelInput.js')}}"></script>
	<script src="http://www.jq22.com/jquery/jquery-ui-1.11.0.js"></script>
	<script src="{{asset('js/tagit/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>
	<!-- <script src="{{asset('layui/layui.js')}}"></script> -->
	<script src="{{asset('js/continent.js')}}"></script>
	<script src="{{asset('js/dataform.js')}}"></script>
	<script>
	
    layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers'], function () {
        var $ = layui.jquery
            ,form = layui.form
            ,croppers = layui.croppers
            ,layer= layui.layer;

        //创建一个头像上传组件
        croppers.render({
            elem: '#test1'
            ,saveW:150     //保存宽度
            ,saveH:150   //保存高度
            ,mark:1/1    //选取比例
            ,area:'900px'  //弹窗宽度
            ,url: "/user/img_save"  //图片上传接口返回和（layui 的upload 模块）返回的JOSN一样
            ,done: function(data){ //上传完毕回调
                if(data.code==1){
                    $('#demo1').attr('src', data.url);
                    $('#test1').attr('data-src', data.url);  //成功返回路径存到数据库
                }else {
                    return layer.msg('上传失败');
                }
               /* $("#inputimgurl").val(url);
                $("#srcimgurl").attr('src',url);*/
            }
        });

    });

	$(document).ready(function() {
		$("#myTags").tagit();
	});
	
	$("#phone").intlTelInput({
      	
	});
    </script>
</body>
</html>