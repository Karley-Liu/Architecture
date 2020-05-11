<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>项目 / 建筑设计垂直平台</title>
	<link rel="stylesheet" href="{{asset('css/project.css')}}" />
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script>
		function clickone(){
			document.getElementById("project222").style.display = "none";
			document.getElementById("project111").style.display = "block";
			document.getElementById("projecting").style.fontSize = "16px";
			document.getElementById("projected").style.fontSize = "14px";
		}
		function clicktwo(){
			document.getElementById("project111").style.display = "none";
			document.getElementById("project222").style.display = "block";
			document.getElementById("projected").style.fontSize = "16px";
			document.getElementById("projecting").style.fontSize = "14px";
		}
	</script>
</head>
<body class="body">
@include('public.header')
	<div class="content">
		<div class="square">
			<div class="square-1"></div>
			<div class="square-2"></div>
			<h2 class="square-3">项目发布</h2>
			<div class="square-4">
		</div>
		</div>
		<img src="{{asset('images/header_underway.jpg')}}" alt="" />
			<div class="box row" style="margin:0px;">
				<div class="col-md-offset-2">
					<!-- <div id="project111">
						@include('project.projectContent1')
					</div> -->
					<div id="project222">
					@foreach($projects as $item)
						<div id="a{{$item['p_id']}}">
							<a href="/project/projectdetails/p_id={{$item['p_id']}}">
								<div class="col-md-11 program2" style="padding:0 0 20px">
									<div>
										<img src="{{$item['p_imgURL']}}" alt="" />
									</div>
									<p class="programname2 col-md-12">{{$item['p_name']}}</p>
									<div class="programtext">
										<p class="col-md-5">{{$item['p_area']}}</p>
										<p class="col-md-6">类型： 改造翻建</p>
										<br /><br />
										<p class="col-md-8">甲方:{{$item['p_jiafang']}}</p>
										<p class="col-md-4 detail">详情>>></p><br>
									</div>
							</a>
								@if($item['p_user_id']==Session::get('user.id'))
									<p class="col-md-4 detail delPoject2" id="{{$item['p_id']}}">删除</p>
								@endif
							</div>
						</div>
					@endforeach
					</div>
					
				</div>
			</div>
			
	</div>
@include('public.footer')
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
			layui.config({
					base: '/layui/' //layui自定义layui组件目录
			}).use(['form','croppers'], function () {
					var $ = layui.jquery
							// ,form = layui.form
							// ,croppers = layui.croppers
							,layer= layui.layer;

	});	
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		$(document).on("click", ".delPoject2", function(){
			// function ajaxDelete(){
		var p_id=$(this).attr('id');
				console.log(p_id);
				// return false;
				$.ajax({
					type:'POST',
					url:"/project/projectdelete/p_id="+p_id,
					dataType:"json",
					data:{
						p_id:p_id
					},
					async:true,//异步
					processData:false,
					contentType:false,
					headers: {
						'X-CSRF-TOKEN': csrf_token,
						"Content-type":"application/x-www-form-urlencoded"
					},
					success:function(res){
						if(res.code==1){
							layer.msg(res.msg,{icon:1})
						}
						console.log(res.p_id);
						$("#a"+res.p_id).remove();
					},
					error:function(res){
						console.log('asdf');
					}
				})
			// }

		});
		// $(document).on("click", ".delPoject1", function(){
		// 	// function ajaxDelete(){
		// var p_id=$(this).attr('id');
		// layer.prompt({title:'请告诉甲方项目不通过的原因',formType:2},function(text,index){
		// 	layer.close(index);
		// 	if(text){
		// 		console.log(p_id);
		// 		// return false;
		// 		$.ajax({
		// 			type:'POST',
		// 			url:"/project/projectdelete/p_id="+p_id,
		// 			dataType:"json",
		// 			data:{
		// 				p_id:p_id,
		// 				text:text
		// 			},
		// 			async:true,//异步
		// 			processData:false,
		// 			contentType:false,
		// 			headers: {
		// 				'X-CSRF-TOKEN': csrf_token,
		// 				"Content-type":"application/x-www-form-urlencoded"
		// 			},
		// 			success:function(res){
		// 				if(res.code==1){
		// 					layer.msg(res.msg,{icon:1})
		// 				}
		// 				console.log(res.p_id);
		// 				$("#a"+res.p_id).remove();
		// 			},
		// 			error:function(res){
		// 				console.log('asdf');
		// 			}
		// 		})				
		// 	}
		// });
		// })
})

</script>
</html>

