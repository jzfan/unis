@extends('wechat.layout')

@section('title')
我的余额
@stop

@section('content')
		<section class="w-cash-leave">
			<div class="self-cash-leave">
				<div class="cash-leave-num"><span class="cash-rmb">￥</span>256</div>
				<div class="cash-leave-text">当前余额</div>
			</div>
		</section>
		<section class="w-cash-aaa w-self-main">
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
				</li>
			</ul>

			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
				</li>
			</ul>

			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
				</li>
			</ul>

			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
				</li>
			</ul>

			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
				</li>
			</ul>

			<ul class="mui-table-view mui-slider-handle">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div>
						<div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div>
					</div>
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