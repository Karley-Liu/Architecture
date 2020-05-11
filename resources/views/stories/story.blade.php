<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>下周去米兰看设计 -红河塔</title>
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
    <img src="{{$story['s_cover']}}" alt="" class="dingwei2">
  </div>
  

  <div class="content col-md-10 col-md-offset-1">
    <div class="content-left row col-md-4">
      <div class="content-panel1 col-md-12">
        <p>{{$story['s_title']}}</p>
        <span class="info_tag">2019.12.03</span>
        <div class="summary">{{$story['s_introduce']}}</div><br>
        <div class="edit">编辑 | {{$story['s_editors']}}</div><br>
        <div class="edit">摄影师 | {{$story['s_shooter']}}</div>
        <div class="source_tag">
          <a href="">{{$story['s_tags']}}</a>
          <!-- <a href="">米兰时装周</a>
          <a href="">米兰时装周</a>
          <a href="">米兰时装周</a>
          <a href="">米兰时装周</a>
          <a href="">米兰时装周</a> -->
        </div>
      </div>
    </div>
    <div class="content-right col-md-8">
      <div class="content-panel3">
          {{$story['s_content']}}
      </div>
    </div>
  </div>
  @include('public.footer')
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
  var html=$('.content-panel3').text();
  $('.content-panel3').val("");
  $('.content-panel3').html(html);
</script>
</html>