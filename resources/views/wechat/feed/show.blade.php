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
		<span class="info-no"></span></div>
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
		})
	</script>

	<script>
	$(function(){

		 var url = window.location.href;
	     var diver = url.indexOf('message/'); 
	     var feed_id = url.slice(diver+8);
	     var openId = $('.w-about-uniserve').attr('data-id');
	     var urlajax = '/api/feed/'+feed_id+'?openid='+openId;
			$(function(){
				$.get( urlajax,function(data){
					var info = data.feed;
					console.log(info);
					// $('.info-title').text(data.title);
					// $('.info-text').text(data.text);
					$('.info-no').html('订单编号：'+info.order_id);
				})
			});
	})
	</script>
@stop