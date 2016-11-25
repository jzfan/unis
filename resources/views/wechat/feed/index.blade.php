@extends('wechat.layout')

@section('title')
我的消息
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">交易订单信息</h1>
	</header>

	<div id="pullrefresh" class="win-scroll-wrapper mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
					
			</div>
	</div>

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
			})
		</script>


		<script>/*进入页面请求列表信息*/
			$(function(){
				var openId = $('.w-about-uniserve').attr('data-id');
				var ajaxUrl = '/api/feed?openid='+openId;
				$.ajax({
					url:ajaxUrl,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						var  msg = data;
						for(var i=0;i<msg.length;i++){
							var div =document.createElement('div');
							div.className = "w-card mui-card";
							div.innerHTML ='<ul class="mui-table-view"><li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled" data-id='+msg[i].id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="/wechat/message/'+msg[i].id+'"><div class="w-card-header">'+msg[i].title+'<small class="w-card-time mui-pull-right">'+msg[i].time+'</small></div><div class="w-card-info">'+msg[i].subject+'</div></a></div></li></ul>';
							var parent = $('.mui-scroll');
							parent.append(div);
						}
						
					}
				})
			})
		</script>

		<script>
		//滑动删除收藏功能
		$(function(){
		 	$(document).on('touchstart','.w-card .mui-disabled',function(){
		 		$(this).parents('div.w-card').fadeOut();
		 		var openId = $('.w-about-uniserve').attr('data-id');
		 		var feed_id = $(this).attr('data-id');
		 		var ajaxUrl ='/api/feed/'+feed_id+'?openid='+openId; 
		 		$.ajax({
		 			url:ajaxUrl,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						layer.open({
						    content: '删除成功'
						    ,skin: 'msg'
						    ,time: 2 //2秒后自动关闭
						  });
						}
		 			})
		 		});
		});
	</script>
@stop