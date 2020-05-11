<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>故事 - 红河塔</title>
	<link rel="stylesheet" href="{{asset('css/stories.css')}}">
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<!-- <script>
		var a=["all","beautyhome","qushi","shiyong","discovery","art"]
		var b=["all2","beautyhome2","qushi2","shiyong2","discovery2","art2"]
		function clickone(index){
			for(var i=0;i<a.length;i++){
				for(var x=0;x<b.length;x++){
					if(index == i){
						if(index==0){
							document.getElementById(b[i]).style.display="block";
						}else{
							document.getElementById(a[i]).style.fontSize = "18px";
							document.getElementById(b[i]).style.display="block";
						}
					}else{
						document.getElementById(a[0]).style.fontSize = "30px";
						document.getElementById(a[i]).style.fontSize = "14px";
						document.getElementById(b[i]).style.display="none";
				}
			}
		}
	}
			
	</script> -->
</head>
<body class="body">
	@include('public.header')
	<img src="{{asset('images/22.jpg')}}" alt="">
		<div class="square">
			<div class="square-1"></div>
			<div class="square-2"></div>
			<h2 class="square-3" onclick="clickone(0)" id="all">故事</h2>
			<div class="tabbar">
				<p onclick="clickone(1)" id="beautyhome">美丽的家</p>
				<p onclick="clickone(2)" id="qushi">趋势</p>
				<p onclick="clickone(3)" id="shiyong">实用手册</p>
				<p onclick="clickone(4)" id="discovery">发现</p>
				<p onclick="clickone(5)" id="art">设计+艺术</p>
			</div>
		</div>

		<div class="content">
			<div id="all2">
			@foreach($stories as $item)
				<div class="block">
					<a href="/stories/story/s_id={{$item['s_id']}}" id="link">
						<img src="{{$item['s_cover']}}" alt="" id="cover">
						<div class="detail">
							@if($item['s_type_id']==1)
							<p>美丽的家</p>
							@elseif($item['s_type_id']==2)
							<p>趋势</p>
							@elseif($item['s_type_id']==3)
							<p>实用手册</p>
							@elseif($item['s_type_id']==4)
							<p>发现</p>
							@else
							<p>设计+艺术</p>
							@endif
							<p id="title">{{$item['s_title']}}</p>
							<p id="introduce">
								{{$item['s_introduce']}}
							</p>
							<div class="tag">
								<a href="">{{$item['s_tags']}}</a>
								<!-- <a href="">意大利</a>
								<a href="">展讯</a>
								<a href="">预热</a>
								<a href="">米兰</a> -->
							</div>
						</div>
					</a>
				</div>
			@endforeach
			</div>
		</div>
	@include('public.footer')
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
clickone(0);
	function clickone(s_type_id){
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			type:'POST',
			url:'/stories/ajax',
			dataType:'json',
			data:{
				's_type_id':s_type_id
			},
			async:true,//同步
			contentType : "application/json",
			processData:true,
			headers: {
        'X-CSRF-TOKEN': csrf_token,
				'Content-Type': 'application/x-www-form-urlencoded'
           	},
			success:function(result){
				// console.log(result);
				var data=result;
				var type="";
				$('#all2').html('');
				var arr=new Array();
				for(var i=0;i<result.length;i++){// for(var j in data){
						if(data[i].s_type_id==1){
								type="美丽的家";
						}else if(data[i].s_type_id==2){
							type="趋势";
						}else if(data[i].s_type_id==3){
							type="实用手册";
						}else if(data[i].s_type_id==4){
							type="发现";
						}else{
							type="设计+艺术";
						}
						var html="<div class=\"block\">"+
				"<a href=\"/stories/story/s_id="+data[i].s_id+"\" id=\"link\">\n"+
				"<img src=\""+data[i].s_cover+"\" alt=\"\" id=\"cover\">\n"+	
						"<div class=\"detail\">\n"+
						"<p>"+type+"</p>\n"+
							
							"<p id=\"title\">"+data[i].s_title+"</p>\n"+
							"<p id=\"introduce\">\n"+
								data[i].s_introduce+"\n"+
							"</p>\n"+
							"<div class=\"tag"+data[i].s_id+"\">\n"+
								//"<a href=\"\">"+data[i].s_tags+"</a>\n"+
							"</div>\n"+
						"</div>\n"+
					"</a>\n"+
				"</div>";

				$('#all2').append(html);
					arr=data[i].s_tags.split('×');
					for(var x in arr){
						var a="<a href="+">"+arr[x]+"</a>&nbsp;"
						$(".tag"+data[i].s_id+"").prepend(a);
					}
				}
			},
			error:function(res){
				console.log("获取失败");
			}
		})
	}
</script>
</html>