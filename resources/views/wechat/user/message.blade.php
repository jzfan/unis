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
<script src="/lib/pusher/main.js"></script>

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
						var  msg = data.feeds;
						console.log(msg);
						for(var i=0;i<msg.length;i++){
							var div =document.createElement('div');
							div.className = "w-card mui-card";
							div.innerHTML ='<a href="/wechat/message/'+msg[i].id+'"><ul class="mui-table-view"><li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled" data-id='+msg[i].id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">'+msg[i].created_at+'</small></div><div class="w-card-info">订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...</div></div></li></ul></a>';
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
		 	$(document).on('touchstart','.w-card li .mui-disabled',function(){
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


	<!-- 

	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
			      <h1 class="mui-title">交易订单信息</h1>
		</header>

		<section class="w-sale-wrap">
			<div class="w-sale-text"><span class="info-title">订单已签收！</span><br>
			<span class="info-text">您购买的[酸辣土豆丝]已签收，欢迎再次订餐！</span><br>
			<span class="info-no">订单编号：408436454569854747</span></div>
		</section>




	var url = window.location.href;
	     var len = url.length;
	     var diver = url.indexOf('?'); 
	     var feed_id = url.substr(diver+1,len)


		$(function(){
			$.get( '/api/feed?openid=xxx',function(data){
				console.log(data);
				$('.info-title') = data.title;
				$('.info-text') = data.text;
				$('.info-no') = data.no;
			})
		})









	     -->
@stop