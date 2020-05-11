<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$architect['ar_zh_name']}} -红河塔</title>
  <link rel="stylesheet" href="{{asset('css/architect.css')}}">
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
    <img src="{{$architect['ar_imgs']}}" alt="">
  </div>

  <div class="content col-md-10 col-md-offset-1">
    <div class="content-left row col-md-4">
      <div class="content-panel1 col-md-12">
        <p>{{$architect['ar_zh_name']}}</p>
        <p>{{$architect['ar_country']}},{{$architect['ar_city']}}</p>
      </div>
      <div class="content-panel2 col-md-12">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>设计方</th>
              <td><a style="color:#4a4a4a" href="{{asset('')}}architectors/architector/id={{$architect['ar_user_id']}}" target="_blank">{{$architect['ar_user_name']}}</a>	</td>
            </tr>
            <tr>
              <th>类型</th>
              <td>{{$architect['ar_type']}}</td>
            </tr>
            <tr>
              <th>材料</th>
              <td>{{$architect['ar_material']}}</td>
            </tr>
            <tr>
              <th>状态</th>
              <td>{{$architect['ar_status']}}</td>
            </tr>
            <tr>
              <th>时间</th>
              <td>{{$architect['ar_year']}}</td>
            </tr>
          </table>
        </div>
        <div id="collps" aria-expanded="false" class="col-xs-12 descripCollapse paddingZ">
          {{$architect['ar_introduce']}}
				</div>
      </div>
    </div>
    <div class="content-right col-md-8">
      <div class="content-panel3">

          {{$architect['ar_content']}}
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