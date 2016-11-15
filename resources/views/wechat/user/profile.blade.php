@extends('wechat.layout')

@section('title')
个人中心
@stop

@section('content')

		<section class="w-self-top">
			<div class="self-img"><img src="{{ $user->avatar }}" alt=""></div>
			<div class="sign-in"><a href="">{{ $user->nickname }}</a></div>
			<div class="cash-main-left">
				<p class="yue cash-num">256</p>
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
@include('wechat.partial.buttomNav')
@stop

@section('js')
<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
<script src="/lib/pusher/main.js"></script>
@stop