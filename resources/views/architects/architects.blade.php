<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>建筑库 - 红河塔</title>
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
	<link rel="stylesheet" href="{{asset('css/architects.css')}}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
    .dingwei{
      width: 100%; 	/*100vw 代表横向占满   100vh 代表纵向占满*/
			height: 100%; /* 宽比高  比例为3：10 */
			overflow: hidden;
    }
  </style>
</head>
<body class="body">
	@include('public.header')
	<img src="{{asset('images/architects2.jpg')}}" alt="" />
	<div class="square">
		<div class="square-1"></div>
		<div class="square-2"></div>
		<h2 class="square-3">建筑库</h2>
	</div>
	<div class="content">
		<div class="content-left">
			<form action="" id="searchForm">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">项目地点</p>
							<input type="text" class="form-control" id="input1" placeholder="按区域搜索"/>
							<div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="欧洲" >
									<label class="form-check-label" for="exampleRadios1">
										欧洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="亚洲" >
									<label class="form-check-label" for="exampleRadios1">
										亚洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="北美洲" >
									<label class="form-check-label" for="exampleRadios1">
										北美洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="非洲" >
									<label class="form-check-label" for="exampleRadios1">
										非洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="南极洲" >
									<label class="form-check-label" for="exampleRadios1">
										南极洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="南美洲" >
									<label class="form-check-label" for="exampleRadios1">
										南美洲
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="area" id="exampleRadios1" value="澳洲" >
									<label class="form-check-label" for="exampleRadios1">
										澳洲
									</label>
								</div>
							</div>
					</div>
				</div>
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">项目类型/功能 <br /><p style="font-weight: bold;color:#666;">所有</p></p>
							<br />
							<div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="商业建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									商业建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="住宅建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									住宅建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="工业建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									工业建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="公共空间" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									公共空间
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="园林景观" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									园林景观
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="城市设计与规划" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									城市设计与规划
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="文化建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									文化建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="政府与医疗建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									政府与医疗建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="教育建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									教育建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="交通与市政设施" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									交通与市政设施
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="宗教建筑" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									宗教建筑
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="改造项目" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									改造项目
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="娱乐休闲设施" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									娱乐休闲设施
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="室内与工业设计" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									室内与工业设计
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="平面" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									平面
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="参数化设计" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									参数化设计
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="subject" type="radio" value="all" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									全部
									</label>
								</div>
								<!-- <div class="button-group">
									<input type="button" value="搜索" class="btn" id="btn"/>
									<input type="reset" value="重置" class="btn" id="btn"/>
								</div> -->
							</div>
					</div>
				</div>
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">建筑材料 <br /><p style="font-weight: bold;color:#666;">所有</p></p>
							<br />
							<div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="石材" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										石材
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="混凝土" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										混凝土
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="钢筋混凝土" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										钢筋混凝土
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="玻璃" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										玻璃
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="金属" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										金属
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="涂料及抹灰" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										涂料及抹灰
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="钢" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										钢
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="砖" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
									砖
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="木材" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										木材
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="瓦及屋面" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										瓦及屋面
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="竹" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										竹
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="陶瓷" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										陶瓷
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="膜" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										膜
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="砌块" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										砌块
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="纸" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										纸
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="陶板" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										陶板
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="不锈钢" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										不锈钢
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="亚克力" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										亚克力
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="双层玻璃幕墙" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										双层玻璃幕墙
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="塑料" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										塑料
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="大理石" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										大理石
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="工业橡胶" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										工业橡胶
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="有机玻璃" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										有机玻璃
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="树脂" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										树脂
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="水磨石" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										水磨石
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="沙" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										沙
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="沥青" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										沥青
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="瓷砖" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										瓷砖
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="织物" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										织物
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="聚碳酸酯" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										聚碳酸酯
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="锈蚀钢板" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										锈蚀钢板
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="马赛克" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										马赛克
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="合成及生态材料" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										合成及生态材料
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="material" type="radio" value="混合结构" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										混合结构
									</label>
								</div>
							</div>
					</div>
				</div>
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">项目状态<br /><p style="font-weight: bold;color:#666;">所有</p></p>
							<br />
							<div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="概念方案" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										概念方案
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="计划建造" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										计划建造
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="正在建造" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										正在建造
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="已建成" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										已建成
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="已拆除" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										已拆除
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="竟赛作品" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										竟赛作品
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="status" type="radio" value="临时建造" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										临时建造
									</label>
								</div>
							</div>
					</div>
				</div>				
			</form>

		</div>
		<div class="content-right row">
		<p id="sessionId" style="display:none">{{Session::get('user.id')}}</p>
		@foreach($architects as $architect)
			<div class="content-panel" id="a{{$architect['ar_id']}}">
					<a href="/architects/architect/ar_id={{$architect['ar_id']}}">
						
							<img src="{{$architect['ar_imgs']}}" alt="">
						
						
						<div class="content-box row">
							<p class="col-md-12">{{$architect['ar_zh_name']}}</p>
							<p class="col-md-12">{{$architect['ar_country']}}，{{$architect['ar_city']}}/{{$architect['ar_year']}}</p>
							<p class="col-md-12">{{$architect['ar_user_name']}}</p>
						</div>
					</a>
					@if(Session::get('user.user_type_id')==4)
						<p class="col-md-4 detail delPoject1" id="{{$architect['ar_id']}}">删除</p>
					@elseif($architect['ar_user_id']==Session::get('user.id'))
						<p class="col-md-4 detail delPoject2" id="{{$architect['ar_id']}}">删除</p>
					@endif
			</div>
		@endforeach
	</div>
</div>
	@include('public.footer')
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
var userId=$('#sessionId').text();
	$(document).on("change",'#searchForm',function(){
		var formdata=$('#searchForm').serialize();
		var country=$('#input1').val();
		var continent=$('input:radio[name="area"]:checked').val();
		var subject=$('input:radio[name="subject"]:checked').val();
		var material=$('input:radio[name="material"]:checked').val();
		var status=$('input:radio[name="status"]:checked').val();
    console.log(formdata);
var userId=$('#sessionId').text();
		$.ajax({
			type:'POST',
			url:"/architects",
			// dataType:"formdata",
			data:formdata,
			async:true,//异步
      processData:false,
      contentType:false,
      headers: {
        'X-CSRF-TOKEN': csrf_token,
        "Content-type":"application/x-www-form-urlencoded"
      },
			success:function(result){
				var data=result;
				console.log(data);
				var currentData=data;
				if(continent){
					currentData=currentData.filter((item) =>{
						return item.ar_continent==continent;
					})					
				}
				if(country){
					currentData=currentData.filter((item)=>{
						return item.ar_country ==country;
					})					
				}
				if(subject){
					currentData=currentData.filter((item)=>{
						return item.ar_type==subject;
					})					
				}
				if(material){
					currentData=currentData.filter((item)=>{
						return item.ar_material.match(material);
					})					
				}
				if(status){
					currentData=currentData.filter((item)=>{
						return item.ar_status ==status;
					})					
				}

				console.log(currentData);
				$('.content-right').html('');
				for(var i=0;i<currentData.length;i++){

					var html="<div class=\"content-panel\">\n"+
					"<a href=\"/architects/architect/ar_id="+currentData[i].ar_id+"\">\n"+
						
							"<img src=\""+currentData[i].ar_imgs+"\" alt=\"\">\n"+
						
						
						"<div class=\"content-box row\">\n"+
							"<p class=\"col-md-12\">"+currentData[i].ar_zh_name+"</p>\n"+
							"<p class=\"col-md-12\">"+currentData[i].ar_country+"，"+currentData[i].ar_city+"/"+currentData[i].ar_year+"</p>\n"+
							"<p class=\"col-md-12\">"+currentData[i].ar_user_name+"</p>\n"+
						"</div>\n"+
					"</a>\n"+
			"</div>";

				$(".content-right").append(html);
console.log(userId);
if(currentData[i]==userId){
var yonghu="<p class=\"col-md-4 detail delPoject2\" id=\""+currentData[i]+"\">删除</p>\n";
	$("#a"+currentData[i].ar_id).prepend(yonghu);
}

				}
				// console.log(data);
			},
			error:function(res){
				alert('sdfas');
			}
		})	
	});

	layui.config({
					base: '/layui/' //layui自定义layui组件目录
			}).use(['form','croppers'], function () {
					var $ = layui.jquery
							// ,form = layui.form
							// ,croppers = layui.croppers
							,layer= layui.layer;

	});	

	$(document).on("click", ".delPoject2", function(){
		var ar_id=$(this).attr('id');
			// function ajaxDelete(){
				console.log(ar_id);
				// return false;
				$.ajax({
					type:'POST',
					url:"/architects/architectdelete/ar_id="+ar_id,
					dataType:"json",
					data:{
						ar_id:ar_id
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
						console.log(res.ar_id);
						$("#a"+res.ar_id).remove();
					},
					error:function(res){
						console.log('asdf');
					}
				})
			// }

		});
		$(document).on("click", ".delPoject1", function(){
		var ar_id=$(this).attr('id');
			// function ajaxDelete(){
		layer.prompt({title:'请告诉建筑师该建筑不通过的原因',formType:2},function(text,index){
			layer.close(index);
			if(text){
				console.log(ar_id);
				// return false;
				$.ajax({
					type:'POST',
					url:"/architects/architectdelete/ar_id="+ar_id,
					dataType:"json",
					data:{
						ar_id:ar_id,
						text:text
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
						console.log(res.ar_id);
						$("#a"+res.ar_id).remove();
					},
					error:function(res){
						console.log('asdf');
					}
				})				
			}
		});
		})
</script>
</html>