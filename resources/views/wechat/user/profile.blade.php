@extends('wechat.layout')

@section('title')
个人中心
@stop

@section('content')

		<section class="w-self-top">
			<div class="self-img"><img src="" alt="" class="useImg"></div>
			<div class="sign-in"><a href=""></a></div>
			<div class="cash-main-left">
				<p class="yue cash-num"></p>
				<p class="cash-leave">当前余额</p>
			</div>
		</section>
		<section class="w-self-main">
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
			    	<span class="person-ico mui-icon iconfont wodedingdan411"></span>
			    	<a href="/wechat/order/index" class="mui-navigate-right">我的订单</a>	    	
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
			    	<span class="person-ico mui-icon iconfont yue412"></span>
			    	<a href="/wechat/balance" class="mui-navigate-right">我的余额</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
			    	<span class="person-ico mui-icon iconfont wodeshoucang413"></span>
			    	<a href="/wechat/favorite" class="mui-navigate-right">我的收藏</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
			    	<span class="person-ico mui-icon iconfont dizhi414"></span>
			    	<a href="/wechat/address" class="mui-navigate-right">我的地址</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
				    <span class="person-ico mui-icon iconfont xiaoxi415"></span>
				    <a href="/wechat/message" class="mui-navigate-right">我的消息</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
				    <span class="person-ico mui-icon iconfont fankui416"></span>
				    <a href="/wechat/report" class="mui-navigate-right">意见反馈</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell">
				    <span class="person-ico mui-icon iconfont guanyu417"></span>
				    <a href="/wechat/about" class="mui-navigate-right">关于我们</a>
			    </li>
			</ul>

		</section>


<!--底部nav切换开始-->
		<nav class="win-bar mui-bar mui-bar-tab">
			<a id="defaultTab" class="mui-tab-item " href="/wechat/index">
				<span class="mui-icon iconfont xuanshouye201"></span>
				<span class="mui-tab-label">首页</span>
			</a>
			<a class="mui-tab-item" href="/wechat/order/status">
				<span class="mui-icon iconfont dingdan111"></span>
				<span class="mui-tab-label">我的订单</span>
			</a>
			<a class="mui-tab-item" href="/wechat/cart">
				<span class="mui-icon iconfont xuangouwuche203"><span class="w-badge mui-badge">0</span></span>
				<span class="mui-tab-label">购物车</span>
			</a>
			<a class="mui-tab-item mui-active" href="/wechat/profile">
				<span class="mui-icon iconfont xuangerenzhongxin204"></span>
				<span class="mui-tab-label">个人中心</span>
			</a>
		</nav>
	<!--底部nav切换结束-->

@section('js')
<script src="/lib/pusher/main.js"></script>

<script>
	mui('body').on('tap','a',function(){
		document.location.href=this.href;
	});
</script>

<script>
	if(localStorage.getItem('buyCart') == null) {
		localStorage.setItem('buyCart', '0');
	}

	$('.w-badge').text(parseInt(localStorage.getItem('buyCart')));
</script>

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
						$('.w-self-top').attr('data-id',data.wechat_openid);
						$('.sign-in a').html(data.name);
						var imgUrl = data.avatar;
						$('.useImg').eq(0).attr('src',imgUrl);
					}
				});
			})
		</script>
		
		<script>
		/*获取余额*/
			$(function(){
				var openId = $('.w-self-top').attr('data-id');
				var urlajax = '/api/user/balance?openid='+openId;
				$.ajax({
					url:urlajax,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						$('.yue').text(data);
					}
				})
			})
		</script>
@stop