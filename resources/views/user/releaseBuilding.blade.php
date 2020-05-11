<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>建筑中心 -红河塔</title>
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
	<link rel="stylesheet" href="{{asset('css/releaseBuilding.css')}}" />
	<link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
	<style>
		.checkbox-inline{
			margin-right:10px;
		}
		.checkbox-inline+.checkbox-inline{
			margin-left:0px !important;
		}
	</style>
</head>
<body class="body">
@include('vendor.ueditor.assets')
	@include('public.header')
		<img src="{{asset('images/architects2.jpg')}}" alt="" />
	
	<div class="content">
	<p id="idValue" style="display:none">{{Session::get('user.id')}}</p>
		<form action="" id="releaseBuilding">
			{{csrf_field()}}
			<div class="content-left">
				<div class="content-left-1">
					<div class="littleBox">
						<p class="userLocation">发布建筑</p>
						<div class="form-group">
							<input type="text" name="ar_zh_name" class="form-control" placeholder="建筑名称"/>
						</div>
						<div class="form-group">
							<select name="ar_type" class="form-control">
								<option value="0">建筑类型</option>
								<option value="商业建筑">商业建筑</option>
								<option value="住宅建筑">住宅建筑</option>
								<option value="工业建筑">工业建筑</option>
								<option value="公共空间">公共空间</option>
								<option value="园林景观">园林景观</option>
								<option value="城市设计与规划">城市设计与规划</option>
								<option value="文化建筑">文化建筑</option>
								<option value="政府与医疗建筑">政府与医疗建筑</option>
								<option value="教育建筑">教育建筑</option>
								<option value="交通与市政设施">交通与市政设施</option>
								<option value="宗教建筑">宗教建筑</option>
								<option value="改造项目">改造项目</option>
								<option value="娱乐休闲设施">娱乐休闲设施</option>
								<option value="室内与工业设计">室内与工业设计</option>
								<option value="平面">平面</option>
								<option value="参数化设计">参数化设计</option>
							</select>
						</div>
						<div class="form-group">
								<p>建筑主材</p>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="石材">石材</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="混凝土">混凝土</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="钢筋混凝土">钢筋混凝土</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="玻璃">玻璃</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="金属">金属</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="涂料及抹灰">涂料及抹灰</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="钢">钢</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="砖">砖</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="木材">木材</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="瓦及屋面">瓦及屋面</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="竹">竹</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="陶瓷">陶瓷</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="膜">膜</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="砌块">砌块</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="纸">纸</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="陶板">陶板</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="不锈钢">不锈钢</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="亚克力">亚克力</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="双层玻璃幕墙">双层玻璃幕墙</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="塑料">塑料</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="大理石">大理石</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="工业橡胶">工业橡胶</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="有机玻璃">有机玻璃</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="树脂">树脂</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="水磨石">水磨石</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="沙">沙</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="沥青">沥青</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="瓷砖">瓷砖</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="织物">织物</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="聚酯碳酸">聚酯碳酸</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="锈蚀钢板">锈蚀钢板</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="马赛克">马赛克</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="合成及生态材料">合成及生态材料</label>
							<label class="checkbox-inline"><input type="checkbox" name="material" id="inlineCheckbox1" value="混合结构">混合结构</label>
						</div>
						<div class="form-group">
							<select name="ar_status" class="form-control">
								<option value="0">项目状态</option>
								<option value="概念方案">概念方案</option>
								<option value="计划建造">计划建造</option>
								<option value="正在建造">正在建造</option>
								<option value="已建成">已建成</option>
								<option value="已拆除">已拆除</option>
								<option value="竟赛作品">竟赛作品</option>
								<option value="临时建造">临时建造</option>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-md-5">
							<label for="continent">大洲</label>
								<select name="continent" id="continent" class="col-md-2 form-control">
									<!--<option value=""></option>-->
								</select>
							</div>
							<div class="col-md-7">
							<label for="country">国家</label>
								<select name="country" id="country" class="form-control">
									<!--<option value=""></option>-->
								</select>
							</div>
							<div class="col-md-8">
							<label for="city">城市</label>
								<select name="city" id="city" class="form-control col-md-5">
									<!--<option value=""></option>-->
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>年份</label><br>
							<div class="layui-input-inline">
								<input type="text" name="ar_year" class="form-control" id="test2" placeholder="yyyy">
							</div>
						</div>
    			</div>
				</div>
				<div class="button">
					<button type="button" class="layui-btn" id="ajaxSubmit">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>			
				</div>
		</div>

			
			<script id="container" name="content" type="text/plain" style="margin-left:350px;height:700px;"></script>
		</form>
			
	</div>
	@include('public.footer')
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="{{asset('js/continent.js')}}"></script>
	<script src="{{asset('layui/layui.js')}}"></script>
		<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
	<script type="text/javascript">
			// var ue = UE.getEditor('container');
			// ue.ready(function() {
			// 		ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
			// });
			layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers','laydate'], function(){
			var laydate = layui.laydate
			var $	=layui.jquery
            ,layer= layui.layer;

			  //年选择器
			laydate.render({
				elem: '#test2'
				,type: 'year'
			});

				var csrf_token = $('meta[name="csrf-token"]').attr('content');
				var id=$('#idValue').text();
				$('#ajaxSubmit').click(function(){
				var formdata=$('#releaseBuilding').serialize();

				//jquery获取复选框值    
				var chk_value =[];//定义一个数组    
          $('input[name="material"]:checked').each(function(){//遍历每一个名字为interest的复选框，其中选中的执行函数    
          chk_value.push($(this).val());//将选中的值添加到数组chk_value中    
				});
				// console.log(chk_value);


				var text=UE.getEditor('container').getContent();

				var imgURL = '';
					text.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/, function (match, capture) {
						imgURL =  capture;
					});

				var str=UE.getEditor('container').getContentTxt();
				str=str.substring(0,200);
				var fd=formdata+'&introduce='+str+'&imgURL='+imgURL+'&material='+chk_value;

				$.ajax({
					type:'POST',
					url:"/user/releasebuliding/id="+id,
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
						$('#releaseBuilding input').val("");

						}
					},
					error:function(res){
						alert('错误');
					}
				})
			})

		});    
	</script>
	<script>
	</script>
</body>
</html>