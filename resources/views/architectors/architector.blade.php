<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$user['name']}} -红河塔</title>
  <link rel="stylesheet" href="{{asset('css/architector.css')}}">
</head>
<body class="body">
  @include("public.header")
  <p id="idValue" style="display:none">{{$user['id']}}</p>
  <img src="{{asset('images/homeImg5.png')}}" alt="" style="height:358px;">
  <div class="profile">
    <div class="panel row" id="row">
      <img src="{{asset('')}}{{$user['logo']}}" alt="" style="width:80px;height:80px;float:left;">
      <div class="detail col-md-3">
        <p>{{$user['name']}}</p>
        <p>{{$user['tag_user']}}</p>
        <div>
          <ul>
            <!-- <li>{{$user['email']}}</li> -->
            <li>{{$user['com_url']}}</li>
            <li>{{$user['country']}}，{{$user['city']}}</li>
            <li>{{$user['phone']}}</li>
          </ul>
          @if($user['user_type_id']==2)
          <p id="mail"><a href="#">对这个建筑师感兴趣？发个邮件通知一下</a></p>
          @endif
        </div>
      </div>
      <div class="introduce col-md-8">
        <p>{{$user['introduce']}}</p>
      </div>
    </div>
  </div>
  <div class="project-show">
    <div class="project-title">
      <p class="border-section">项目 <span>{{$sum}}</span></p>
    </div>
    <div class="project row">
    @foreach($buildings as $building)
    <a href="/architects/architect/ar_id={{$building['ar_id']}}">
     	<div class="img col-md-4">
	    	<img src="{{$building['ar_imgs']}}" alt="" style="width:386px;height:231px;z-index:-1">
	      <p class="project-title2">{{$building['ar_zh_name']}}</p>	
    	</div>   
    </a>
    @endforeach
    </div>
  </div>
  <div class="article-show">
    <div class="project-title"><p class="border-section">文章 <span>{{$count}}</span></p></div>
    <div class="project row">
    @foreach($stories as $story)
      <a href="/stories/story/s_id={{$story['s_id']}}">
        <div class="img col-md-4">
          <img src="{{$story['s_cover']}}" alt="" style="width:386px;height:231px;z-index:-1">
          <p class="project-title2">{{$story['s_title']}}</p>
        </div>        
      </a>
    @endforeach
    </div>
  </div>
  @include('public.footer')
</body>
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
</html>