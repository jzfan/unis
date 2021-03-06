@extends('wechat.layout')

@section('title')
收货地址
@stop

@section('content')
<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
	      <h1 class="mui-title">选择收货地址</h1>
	      <a href="/wechat/address/create"><span class="w-address-save mui-pull-right">新建地址</span></a>
</header>


<section>
	<div class="present-location"><!-- <span class="mui-icon iconfont dingwei104"></span>&nbsp;点击定位当前位置 --></div>
	<div class="present-address-all">
		<span><span class="mui-icon iconfont zhinanzhen503"></span>&nbsp;以往地址</span> <span class="write-del mui-pull-right"><span class="mui-icon iconfont bianji504"></span>&nbsp;编辑</span>
	</div>

	<div>
		<ul class="w-location-group mui-table-view">
 
		</ul>
	</div>
</section>



@stop
@section('js')

<script>
	/*获取用户openId*/
	$(function(){
		$.ajax({
			url:'/wechat/user',
			dataType:'json',
			async:false,
			data:{},
			type:'GET',
			success:function(data){
				$('.w-about-uniserve').attr('data-id',data.wechat_openid);
			}
		});
	});



/*请求地址列表*/
$(function(){
	var openId = $('.w-about-uniserve').attr('data-id');
	var urlajax ='/api/address?openid='+openId;

 $.ajax({
        url:urlajax,
        dataType:'json',
        async:true,
        type:'GET',
        success:function(data){
        	for(var i=0;i<data.length;i++){
        		var li = document.createElement('li');
              	  li.className = 'mui-table-view-cell';
              	  li.innerHTML = data[i].text+'<span class="mui-badge" data-id='+data[i].id+'><span class="location-ico mui-icon iconfont  mui-pull-right" data-id='+data[i].status+'></span></span>';
              	  ul = document.body.querySelector('.w-location-group');
              	  ul.appendChild(li);
              	  $('.mui-badge .location-ico').each(function(){
              	  		if($(this).attr('data-id') == 1){
              	  			$(this).addClass('duigou506');
              	  		}
              	  });
              	
        	}

        }
  	});
	});


/*拿用户信息*/
$(function(){
 $.ajax({
        url:'/wechat/wx_user',
        dataType:'json',
        async:true,
        type:'GET',
        success:function(data){
          $('#user').val(data.id);
          $('#email').val(data.email);
          $('#avatar').val(data.avatar);
          $('#nickname').val(data.nickname);
        }
  	});
	});
</script>



<script>

/*删除地址*/
$(function(){
	$(document).on('touchstart','.w-location-group .mui-table-view-cell',function(){
		var _this = $(this);
		$(this).find("span").removeClass('duigou506');
		if($(this).find("span").hasClass('shanchu505')){
			_this.fadeOut();
			var openId = $('.w-about-uniserve').attr('data-id');
			var addressId = $(this).find('span.mui-badge').attr('data-id');
			var urlajax = '/api/address/'+addressId+'?openid='+openId;
			$.ajax({
			url:urlajax,
			dataType:'json',
			async:true,
			type:'delete',
			success:function(data){
				if(data == 'success'){
					layer.open({
				    content: '删除成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				 	 });
				}
			}
		});

		}
	})
});


/*更换默认地址*/
$(function(){
	$(document).on('tap','.w-location-group .mui-table-view-cell',function(){
			$('.w-location-group .mui-badge .location-ico').removeClass('duigou506');
			$(this).find('span.location-ico').addClass('duigou506');
			var openId = $('.w-about-uniserve').attr('data-id');
			var addressId = $(this).find('span.mui-badge').attr('data-id');
			var urlajax = '/api/address/'+addressId+'?openid='+openId;
			$.ajax({
			url:urlajax,
			dataType:'json',
			async:true,
			type:'put',
			success:function(data){
				if(data == 'success'){
					layer.open({
				    content: '选择成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
				}
			}
		});

	})
});

</script>

@stop