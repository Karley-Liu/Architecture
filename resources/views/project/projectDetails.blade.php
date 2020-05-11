<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>建筑师/团队 - 红河塔</title>
  <link rel="stylesheet" href="{{asset('css/architect.css')}}">
  <link rel="stylesheet" href="{{asset('css/story.css')}}">
  <style>
    .dingwei{
      width: 100%; 	/*100vw 代表横向占满   100vh 代表纵向占满*/
			height: 23vw; /* 宽比高  比例为3：10 */
			overflow: hidden;
    }
  </style>
</head>
<body class="body">
  @include('public.header')
  <div class="dingwei">
    <img src="{{$project['p_imgURL']}}" alt="" />
  </div>
		
  <p id="idValue" style="display:none">{{$project['p_user_id']}}</p>
		
		<div class="content col-md-10 col-md-offset-1">
    <div class="content-left row col-md-4">
      <div class="content-panel1 col-md-12">
        <p>{{$project['p_name']}}</p>
        <span class="info_tag">{{$project['p_date']}}</span>&nbsp;
				<span class="info_tag">{{$project['p_area']}}</span>&nbsp;
				<span class="info_tag">{{$project['p_type']}}</span>&nbsp;
        <span class="info_tag">{{$project['p_jiafang']}}</span>
        <p id="mail"><a href="#">对这个项目？发个邮件通知一下</a></p>
      </div>
    </div>
    <div class="content-right col-md-8">
      <div class="content-panel3" id="content">
          {{$project['p_content']}}
      </div>
    </div>
  </div>
	@include('public.footer')
</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
      layui.config({
        base: '/layui/' //layui自定义layui组件目录
    }).use(['form','croppers'], function () {
        var $ = layui.jquery
            ,form = layui.form
            ,croppers = layui.croppers
            ,layer= layui.layer;
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
  var id=$('#idValue').text();
  $('#mail').click(function(){
    $.ajax({
      type:'POST',
			url:"/mail/id="+id,
			dataType:"json",
			data:{
        id:id,
      },
			async:false,//异步
      processData:false,
      contentType:false,
      headers: {
        'X-CSRF-TOKEN': csrf_token,
        "Content-type":"application/x-www-form-urlencoded"
      },
      success:function(res){
        if(res.code==1){
          layer.msg(res.msg,{icon:1});
        }
        
      },
      error:function(res){
        console.log('sadfasd');
      }
    })
  })
});
</script>
<script>
var html=$('.content-panel3').text();
$('.content-panel3').val("");
$('.content-panel3').html(html);
</script>