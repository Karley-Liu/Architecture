<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>建筑师/团队 - 红河塔</title>
	<!--<link rel="stylesheet" href="./css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
</head>
<body class="body">
	@include('public.header')
	<img src="./images/architects.jpg" alt="" />
		<div class="square">
			<div class="square-1"></div>
			<div class="square-2"></div>
			<h2 class="square-3">建筑师/团队</h2>
		</div>
		
		<div class="content">
			<div class="content-left">
			<form action="" id="searchForm">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">用户位置</p>
						<input type="text" name="search" class="form-control" id="input1" placeholder="按区域搜索"/>
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
						<p class="userLocation">专业/学科 <br /><p style="font-weight: bold;color:#666;">所有</p></p>
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
			</form>

			</div>
			
			<div class="content-right row">
			@foreach($users as $item)
				<div class="content-panel">
					<a href="/architectors/architector/id={{$item['id']}}">
						<div class="content-box">
							<img src="{{$item['logo']}}" alt="头像" class="col-md-3" style="border-radius: 50%;"/>
							<div class="details">
								<div class="details-div col-md-8">
									<p>{{$item['name']}}</p>
									<p>建筑</p>
									<p>{{$item['country']}} / {{$item['city']}}</p>
								</div>
								
								<div class="follow-row col-md-8">
									<div class="col-md-12" style="padding-left:0px;">
										<a href="">
											<button class="btn btn-primary" id="btn2">关注</button>
										</a>
									</div>
									<div class="col-md-12">
										<h5 class="text-left">2</h5>
										<span>关注度</span>
									</div>
									<div class="col-md-12">
										<h5 class="text-left">3</h5>
										<span>项目</span>
									</div>
								</div>
							</div>
							<div class="show-panel">
								<img src="{{asset('images/contentpanel1.jpg')}}" alt="" class="col-md-4"/>
								<img src="{{asset('images/contentpanel2.jpg')}}" alt="" class="col-md-4"/>
								<img src="{{asset('images/contentpanel3.jpg')}}" alt="" class="col-md-4"/>
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
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	$('#searchForm').change(function(){
		var formdata=$('#searchForm').serialize();
		var country=$('#input1').val();
		var continent=$('input:radio[name="area"]:checked').val();
		var subject=$('input:radio[name="subject"]:checked').val();
    console.log(formdata);
		$.ajax({
			type:'POST',
			url:"/architectors",
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
						return item.continent==continent;
					})					
				}
				if(country){
					currentData=currentData.filter((item)=>{
						return item.country ==country;
					})					
				}
				if(subject){
					currentData=currentData.filter((item)=>{
						return item.tag_user.match(subject);
					})					
				}

				console.log(currentData);
				$('.content-right').html('');
				for(var i=0;i<currentData.length;i++){
					var html="<div class=\"content-panel\">\n"+
					"	<a href=\"/architectors/architector/id="+currentData[i].id+"\">\n"+
							"<div class=\"content-box\">\n"+
								"<img src=\""+currentData[i].logo+"\" alt=\"头像\" class=\"col-md-3\" style=\"border-radius: 50%;\"/>\n"+
								"<div class=\"details\">\n"+
									"<div class=\"details-div col-md-8\">\n"+
										"<p>"+currentData[i].name+"</p>\n"+
										"<p>建筑</p>\n"+
										"<p>"+currentData[i].country+" / "+currentData[i].city+"</p>\n"+
									"</div>\n"+
									
									"<div class=\"follow-row col-md-8\">\n"+
										"<div class=\"col-md-12\" style=\"padding-left:0px;\">\n"+
											"<a href=\"\">\n"+
												"<button class=\"btn btn-primary\" id=\"btn2\">关注</button>\n"+
											"</a>\n"+
										"</div>\n"+
										"<div class=\"col-md-12\">\n"+
											"<h5 class=\"text-left\">2</h5>\n"+
											"<span>关注度</span>\n"+
										"</div>\n"+
										"<div class=\"col-md-12\">\n"+
											"<h5 class=\"text-left\">3</h5>\n"+
											"<span>项目</span>\n"+
										"</div>\n"+
									"</div>\n"+
								"</div>\n"+
								"<div class=\"show-panel\">\n"+
									"<img src=\"{{asset('images/contentpanel1.jpg')}}\" alt=\"\" class=\"col-md-4\"/>\n"+
									"<img src=\"{{asset('images/contentpanel2.jpg')}}\" alt=\"\" class=\"col-md-4\"/>\n"+
									"<img src=\"{{asset('images/contentpanel3.jpg')}}\" alt=\"\" class=\"col-md-4\"/>\n"+
								"</div>\n"+
							"</div>\n"+
						"</a>\n"+
					"</div>";			
				$(".content-right").append(html);		
				}
				// console.log(data);
			},
			error:function(res){
				alert('sdfas');
			}
		})	
	})
</script>
</html>