$(function(){
    loadContinent();//初始化加载大洲
//	alert('aaa');
	$("#continent").change(function(){
		$('#country option').remove();
		loadCountry();//加载国家
	});
	$("#country").change(function(){
		$('#city option').remove();
		loadCity();//加载城市
	});

	function loadContinent(){
		$.ajax({
			type:"GET",
			url:"/region/get_continent_list",
			dataType:"json",
			async:false,//同步
			success:function(result){
//				console.log(result);
				var cont_list=result;
//				console.log(cont_list);
				var str="";
				for(var i=0;i<cont_list.length;i++){
					str+='<option value='+cont_list[i].area_id+'>'+cont_list[i].area_name+'</option>'	
				}
				$("#continent").prepend(str);
				loadCountry();
			},
			error:function(){
				console.log("获取大洲失败");
			}
		});
	}
	function loadCountry(){
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		var continent_id=$("#continent").val();
		$.ajax({
			type:"POST",
			url:"/region/get_country_list",
			data:{
				continent_id:continent_id,
			},
			dataType:"json",
			async:true,
			contentType : "application/json",
			processData:true,
			headers: {
        'X-CSRF-TOKEN': csrf_token,
				'Content-Type': 'application/x-www-form-urlencoded'
           	},
			success:function(result){
//				console.log(result);
				var str="";
				var coun_list=result;
				for(var i=0;i<coun_list.length;i++){
					str+='<option value='+coun_list[i].area_id+'>'+coun_list[i].area_name+'</option>'	
				}
				$("#country").prepend(str);
				loadCity();
			},
			error:function(){
				console.log("获取国家失败");
			}
		});
	}
	function loadCity(){
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		var country_id=$('#country').val();
		$.ajax({
			type:"POST",
			url:"/region/get_city_list",
			async:true,
			contentType : "application/json",
			processData:true,
			headers: {
        'X-CSRF-TOKEN': csrf_token,
				'Content-Type': 'application/x-www-form-urlencoded'
           	},
			data:{
				country_id:country_id
			},
			dataType:"json",
			success:function(result){
//				console.log(result);
				var str="";
				var city_list=result;
				for(var i=0;i<city_list.length;i++){
					str+='<option value='+city_list[i].area_id+'>'+city_list[i].area_name+'</option>'
				}
				$('#city option').remove();
				$('#city').prepend(str);
			},
			error:function(){
				console.log("加载城市失败");
			}
		})
	}
});
