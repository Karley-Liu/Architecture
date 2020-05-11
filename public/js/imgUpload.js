window.onload = function(){
  var input = document.getElementById("file_input");
  var result;
  var dataArr = []; // 储存所选图片的结果(文件名和base64数据)
  var fd;  //FormData方式发送请求
  var oSelect = document.getElementById("select");
  var oAdd = document.getElementById("add");
  var oSubmit = document.getElementById("submit");
  var oInput = document.getElementById("file_input");

  if(typeof FileReader==='undefined'){
      alert("抱歉，你的浏览器不支持 FileReader");
      input.setAttribute('disabled','disabled');
  }else{
      input.addEventListener('change',readFile,false);
  }　　　　　//handler


  function readFile(){
      fd = new FormData();
      var iLen = this.files.length;
      for(var i=0;i<iLen;i++){
          if (!input['value'].match(/.jpg|.gif|.png|.jpeg|.bmp/i)){　　//判断上传文件格式
              return alert("上传的图片格式不正确，请重新选择");
          }
          var reader = new FileReader();
          fd.append(i,this.files[i]);
          reader.readAsDataURL(this.files[i]);  //转成base64
          reader.fileName = this.files[i].name;

          reader.onload = function(e){
              var imgMsg = {
                  name : this.fileName,//获取文件名
                  base64 : this.result   //reader.readAsDataURL方法执行完后，base64数据储存在reader.result里
      }
              dataArr.push(imgMsg);
              result = '<div class="delete">delete</div><div class="result"><img class="subPic" src="'+this.result+'" alt="'+this.fileName+'"/></div>';
              var div = document.createElement('div');
              div.innerHTML = result;
              div['className'] = 'float';
              $('.imgBox').prepend(div);
//            document.getElementsByTagName('body')[0].appendChild(div);　　//插入dom树
              var img = div.getElementsByTagName('img')[0];
              img.onload = function(){
                  var nowHeight = ReSizePic(this); //设置图片大小
                  this.parentNode.style.display = 'block';
                  var oParent = this.parentNode;
                  if(nowHeight){
                      oParent.style.paddingTop = (oParent.offsetHeight - nowHeight)/2 + 'px';
                  }
              }
              div.onclick = function(){
                  $(this).remove();                  // 在页面中删除该图片元素
              }
          }
      }
  }

  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  var id=$('#idValue').text();

  function send(){

    var formdata=new FormData($('#releaseBuilding')[0]);
    //多选框
    var checkbox=document.getElementsByName("material");
    var thisLength=checkbox.length;
    var str=new Array();
    for(var i=0;i<thisLength;i++){
        if(checkbox[i].checked==true){
                str[i]=checkbox[i].value;
        }
    }
    var checkedbox="";
    for(var j in str){
        checkedbox+=str[j]+',';
    }
    console.log(checkedbox);
    formdata.append('checkedbox',checkedbox);
    //图片
      var submitArr = [];
      $('.subPic').each(function () {
              submitArr.push({
                  name: $(this).attr('alt'),
                  base64: $(this).attr('src')
              });
          }
      );
      formdata.append('submit',JSON.stringify(submitArr));
      console.log(formdata);
      $.ajax({
          url : "/user/releasebuliding/id="+id,
          type : 'POST',
          data : formdata,
          dataType: 'json',
          async:true,
          //processData: false,   用FormData传fd时需有这两项
          //contentType: false,
          headers: {
            'X-CSRF-TOKEN': csrf_token,
            // 'Content-Type': 'application/json',
            // "Content-type":"application/x-www-form-urlencoded"
            // "Content-Type":"multipart/form-data"
          },
          success : function(data){
              console.log('返回的数据：'+JSON.stringify(data))
        　},
        error:function(res){
            console.log('asdfasfd');
        }
      })
  };




  // oSelect.onclick=function(){
  //     oInput.value = "";   // 先将oInput值清空，否则选择图片与上次相同时change事件不会触发
  //     //清空已选图片
  //     $('.float').remove();
  //     oInput.click();
  // }


  oAdd.onclick=function(){
      oInput.value = "";   // 先将oInput值清空，否则选择图片与上次相同时change事件不会触发
      oInput.click();
  }


  // oSubmit.onclick=function(){
  //     if(!dataArr.length){
  //         return alert('请先选择文件');
  // }
  //     send();
  // }
}
/*
用ajax发送fd参数时要告诉jQuery不要去处理发送的数据，
不要去设置Content-Type请求头才可以发送成功，否则会报“Illegal invocation”的错误，
也就是非法调用，所以要加上“processData: false,contentType: false,”
* */


function ReSizePic(ThisPic) {
  var RePicWidth = 200; //这里修改为您想显示的宽度值

  var TrueWidth = ThisPic.width; //图片实际宽度
  var TrueHeight = ThisPic.height; //图片实际高度

  if(TrueWidth>TrueHeight){
      //宽大于高
      var reWidth = RePicWidth;
      ThisPic.width = reWidth;
      //垂直居中
      var nowHeight = TrueHeight * (reWidth/TrueWidth);
      return nowHeight;  //将图片修改后的高度返回，供垂直居中用
  }else{
      //宽小于高
      var reHeight = RePicWidth;
      ThisPic.height = reHeight;
  }
}