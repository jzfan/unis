@extends('wechat.layout')

@section('title')
个人中心
@stop

@section('content')
		<section class="w-self-top">
			<div class="self-img"><img src="/img/wechat/person.png" alt=""></div>
			<div class="sign-in"><a href="">登陆</a>/<a href="">注册</a></div>
			<div class="cash-main-left">
				<p class="cash-num"><span></span>256</p>
				<p class="cash-leave">当前余额</p>
			</div>
		</section>
		<section class="w-self-main">
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
			    	<a href="/wechat/order" class="mui-navigate-right">我的订单</a>
			    	<span class="person-ico mui-icon iconfont dingdan111"></span>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/balance" class="mui-navigate-right">我的余额</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/favorite" class="mui-navigate-right">我的收藏</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/address" class="mui-navigate-right">我的地址</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/message" class="mui-navigate-right">我的消息</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/report" class="mui-navigate-right">意见反馈</a>
			    </li>
			</ul>

			<ul class="mui-table-view" style="margin-top:20px;">
			    <li class="mui-table-view-cell"><a href="/wechat/about" class="mui-navigate-right">关于我们</a>
			    </li>
			</ul>

		</section>

@stop

@section('js')
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
		document.getElementById("about").addEventListener('tap',function () {
			//获得主页面的webview
			var main = plus.webview.currentWebview().parent();
			//触发主页面的gohome事件
			mui.fire(main,'gohome');
		});
	</script>
@stop