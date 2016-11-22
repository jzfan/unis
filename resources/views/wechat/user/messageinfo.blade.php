@extends('wechat.layout')

@section('title')
我的消息
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
			      <h1 class="mui-title">交易订单信息</h1>
		</header>

	<section class="w-sale-wrap">
		<div class="w-sale-text"><span class="info-title">订单已签收！</span><br>
		<span class="info-text">您购买的[酸辣土豆丝]已签收，欢迎再次订餐！</span><br>
		<span class="info-no">订单编号：408436454569854747</span></div>
	</section>

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


		 var url = window.location.href;
	     var len = url.length;
	     var diver = url.indexOf('?'); 
	     var feed_id = url.substr(diver+1,len)


			$(function(){
				$.get( '/api/feed?openid=xxx',function(data){
					console.log(data);
					$('.info-title').text(data.title);
					$('.info-text').text(data.text);
					$('.info-no').text(data.no);
				})
			})
	</script>
@stop