// $(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
//   $.ajaxSetup({
//   });
// })
  var id=$('#idValue').text();
  console.log(id);
  $('#ajaxsubmit').click(function(){
    var formdata=$('#dataform').serialize();
    console.log(formdata);
    var tags=$('#myTags').text().replace(/\s*/g,"");
    // console.log(tags);
    var fd=formdata+'&tags='+tags;
    // console.log(fd);
		$.ajax({
			type:'POST',
			url:"/user/dataform/id="+id,
			// dataType:"formdata",
			data:fd,
			async:true,//异步
      processData:false,
      contentType:false,
      headers: {
        'X-CSRF-TOKEN': csrf_token,
        // 'Content-Type': 'application/json',
        "Content-type":"application/x-www-form-urlencoded"
        // "Content-Type":"multipart/form-data"
      },
			success:function(result){
				layer.msg(result.msg,{icon:1});
        $('#dataform input').val("");
			},
			error:function(res){
				alert('sdfas');
			}
		})	
	})