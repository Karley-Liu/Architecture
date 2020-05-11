<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>管理用户</title>
  <link rel="stylesheet" href="{{asset('css/project.css')}}" />
	<link rel="stylesheet" href="{{asset('css/architectors.css')}}" />
  <link rel="stylesheet" href="{{asset('css/manager.css')}}">
  <style>

  </style>
</head>
<body class="body">
@include('public.header')
    <img src="{{asset('images/header_underway.jpg')}}" alt="" />
    <div class="content">
		<div class="square">
			<div class="square-1"></div>
			<div class="square-2"></div>
			<h2 class="square-3">管理员管理</h2>
			<div class="square-4">
		</div>
		</div>
    <div class="content-left">
      <ul class="list-group">
        <li id="userchoice" class="list-group-item active">新用户管理</li>
        <li id="projectchoice" class="list-group-item">项目审核</li>
        <li id="buildingchoice" class="list-group-item">建筑审核</li>
      </ul>
    </div>
    <div class="box">
				<div class="col-md-offset-2">
          <div class="user project22" id="userchoicebox" style="display:block;margin-top:-185px;">
          @foreach($users as $user)
            <div class="panel" id="a{{$user['id']}}">
              <div class="logo"><img src="{{asset('')}}{{$user['logo']}}" alt=""></div>
              @if($user['user_type_id']==1)
              <div class="left-top">甲方</div>
              @elseif($user['user_type_id']==2)
              <div class="left-top">建筑师</div>
              @else
              <div class="left-top">媒体人</div>
              @endif
              <div class="detail2">
                <div class="name">{{$user['name']}}</div>
                <div class="email2">邮箱：{{$user['email']}}</div>
                <div class="tag_user2">擅长领域：{{$user['tag_user']}}</div>
                <div class="continent2">地区：{{$user['continent']}} {{$user['country']}} {{$user['city']}} {{$user['address']}}</div>
                <div class="phone2">电话：{{$user['phone']}}</div>
                <br>
                <div class="com_url2">官网：{{$user['com_url']}}</div>
                <div class="introduce2">介绍：{{$user['introduce']}}</div>
                <div class="avatar"><a href="/download/id={{$user['id']}}" target="_blank">审核文件下载</a></div>
                <select name="pass" id="{{$user['id']}}" class="form-control usercontrol">
                  <option value="">是否通过审核</option>
                  <option value="1">放行</option>
                  <option value="2">打回</option>   
                </select>
              </div>
            </div>
          @endforeach
          </div>

          <div class="project project22" id="projectchoicebox" style="width:80%;margin-top:-185px;display:none;">
          @foreach($projects as $project)
            <div class="panel" id="b{{$project['p_id']}}">
              <div class="img"><img src="{{$project['p_imgURL']}}" alt=""></div>
      
              <div class="detail3">
                <div class="name" style="width:400px;">{{$project['p_name']}}</div>

                
              </div>            
                <div class="details">
                  <p style="width:300px">设计地址：{{$project['p_area']}} <span style="margin-left:80px">建筑类型：{{$project['p_type']}}</span></p>
                  <p style="width:300px">甲方：{{$project['p_jiafang']}}<br></p>
                  
                  <select name="pass" id="{{$project['p_id']}}" class="form-control projectcontrol">
                    <option value="">是否通过审核</option>
                    <option value="1">放行</option>
                    <option value="2">打回</option>
                  </select>
                </div>

            </div>
          @endforeach
					</div>

          <div class="building project22" id="buildingchoicebox" style="width:80%;margin-top:-185px;display:none;">
          @foreach($buildings as $building)
            <div class="panel" id="c{{$building['ar_id']}}">
              <div class="img"><img src="{{$building['ar_imgs']}}" alt=""></div>
      
              <div class="detail3">
                <div class="name" style="width:400px;">{{$building['ar_zh_name']}}</div>

                
              </div>            
                <div class="details">
                  <p style="width:300px">设计方：{{$building['ar_user_name']}} <span style="margin-left:80px">建筑状态：{{$building['ar_status']}}</span></p>
                  <p style="width:300px">建筑类型：{{$building['ar_type']}} <span style="margin-left:80px">时间：{{$building['ar_year']}}</span> <br>
                  </p>
                  <p style="width:700px">建筑材料：{{$building['ar_material']}}</p>
                  
                  <select name="pass" id="{{$building['ar_id']}}" class="form-control buildingcontrol">
                    <option value="">是否通过审核</option>
                    <option value="1">放行</option>
                    <option value="2">打回</option>
                  </select>
                </div>

            </div>
          @endforeach
					</div>

				</div>

				</div>
			</div>
  </div>
@include('public.footer')
</body>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>
  $(function(){
    $('.list-group li').click(function(){
      $(this).addClass('active');
      $(this).siblings('.list-group-item').removeClass('active');

      var thisid=$(this).attr('id');
      var testid=thisid+'box';
      $('#'+testid).css({
        'display':'block'
      }).siblings('.project22').css({
        'display':'none'
      });
    });
  });

  layui.config({
					base: '/layui/' //layui自定义layui组件目录
			}).use(['form','croppers'], function () {
					var $ = layui.jquery
							// ,form = layui.form
							// ,croppers = layui.croppers
							,layer= layui.layer;

	});	

  var csrf_token = $('meta[name="csrf-token"]').attr('content');    
		$(document).on("change", '.usercontrol', function(){  //用户管理
      var idvalue=$(this).find('option:checked').val();
      var id=$(this).attr('id');
      console.log(id+","+idvalue);
      if(idvalue==2){
      layer.prompt({title:'请告诉用户账号不通过的原因',formType:2},function(text,index){
			layer.close(index);
        if(text){               //项目不通过
            $.ajax({
              type:'POST',
              url:"/user/usermanage/id="+id,
              data:{
                  idvalue:idvalue,
                  text:text
              },
			        dataType:"json",
              async:true,//异步
              processData:true,
			        contentType : "application/json",
              headers: {
                'X-CSRF-TOKEN': csrf_token,
                "Content-type":"application/x-www-form-urlencoded"
              },
              success:function(res){
                if(res.code==2){
                  layer.msg(res.msg,{icon:1})
                }
              },
              error:function(res){
                console.log('asdf');
              }
            })
        }
      })
      }
      else{
        $.ajax({            //项目通过
                type:'POST',
                url:"/user/usermanage/id="+id,
                data:{
                    idvalue:idvalue
                },
                dataType:"json",
                async:true,//异步
                processData:true,
                contentType : "application/json",
                headers: {
                  'X-CSRF-TOKEN': csrf_token,
                  "Content-type":"application/x-www-form-urlencoded"
                },
                success:function(res){
                  if(res.code==1){
                    layer.msg(res.msg,{icon:1});
                    $("#a"+res.id).remove();
                  }
                },
                error:function(res){
                  console.log('asdf');
                }
              })
      }
});

$(document).on("change", '.projectcontrol', function(){  //项目管理
      var idvalue=$(this).find('option:checked').val();
      var p_id=$(this).attr('id');
      if(idvalue==2){
      layer.prompt({title:'请告诉甲方项目不通过的原因',formType:2},function(text,index){
			layer.close(index);
        if(text){               //项目不通过
            $.ajax({
              type:'POST',
              url:"/user/projectmanage/p_id="+p_id,
              data:{
                  idvalue:idvalue,
                  text:text
              },
			        dataType:"json",
              async:true,//异步
              processData:true,
			        contentType : "application/json",
              headers: {
                'X-CSRF-TOKEN': csrf_token,
                "Content-type":"application/x-www-form-urlencoded"
              },
              success:function(res){
                if(res.code==2){
                  layer.msg(res.msg,{icon:1})
                }
              },
              error:function(res){
                console.log('asdf');
              }
            })
        }
    })
  }
  else{
    $.ajax({            //项目通过
            type:'POST',
            url:"/user/projectmanage/p_id="+p_id,
            data:{
                idvalue:idvalue
            },
			      dataType:"json",
            async:true,//异步
            processData:true,
			      contentType : "application/json",
            headers: {
              'X-CSRF-TOKEN': csrf_token,
              "Content-type":"application/x-www-form-urlencoded"
            },
            success:function(res){
              if(res.code==1){
                layer.msg(res.msg,{icon:1});
                $("#b"+res.p_id).remove();
              }
            },
            error:function(res){
              console.log('asdf');
            }
          })
  }
});

$(document).on("change", '.buildingcontrol', function(){  //建筑管理
      var idvalue=$(this).find('option:checked').val();
      var ar_id=$(this).attr('id');
      if(idvalue==2){
      layer.prompt({title:'请告诉乙方项目不通过的原因',formType:2},function(text,index){
			layer.close(index);
        if(text){               //项目不通过
            $.ajax({
              type:'POST',
              url:"/user/buildingmanage/ar_id="+ar_id,
              data:{
                  idvalue:idvalue,
                  text:text
              },
			        dataType:"json",
              async:true,//异步
              processData:true,
			        contentType : "application/json",
              headers: {
                'X-CSRF-TOKEN': csrf_token,
                "Content-type":"application/x-www-form-urlencoded"
              },
              success:function(res){
                if(res.code==2){
                  layer.msg(res.msg,{icon:1})
                }
              },
              error:function(res){
                console.log('asdf');
              }
            })
        }
    })
  }
  else{
    $.ajax({            //项目通过
            type:'POST',
            url:"/user/buildingmanage/ar_id="+ar_id,
            data:{
                idvalue:idvalue
            },
			      dataType:"json",
            async:true,//异步
            processData:true,
			      contentType : "application/json",
            headers: {
              'X-CSRF-TOKEN': csrf_token,
              "Content-type":"application/x-www-form-urlencoded"
            },
            success:function(res){
              if(res.code==1){
                layer.msg(res.msg,{icon:1});
                $("#c"+res.ar_id).remove();
              }
            },
            error:function(res){
              console.log('asdf');
            }
          })
  }
});
</script>
</html>