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
			<a class="cash-out" href="#">提现</a>
		</section>


<div id="pullrefresh" class="yu-scroll-wrapper mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
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
		</section>

	</div>
</div>
@stop

@section('js')
	<script>
		mui.init({
				swipeBack: false,
				pullRefresh: {
					container: '#pullrefresh',
					down: {
						callback: pulldownRefresh
					},
					up: {
						contentrefresh: '正在加载...',
						callback: pullupRefresh
					}
				}
			});
			/**
			 * 下拉刷新具体业务实现
			 */
			function pulldownRefresh() {
				setTimeout(function() {
					var table = document.body.querySelector('.w-cash-aaa');
					var cells = document.body.querySelectorAll('.mui-table-view');
					for (var i = cells.length, len = i + 3; i < len; i++) {
						var ul = document.createElement('ul');
						ul.className = 'mui-table-view';
						ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div><div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div></div></li>';
						//下拉刷新，新纪录插到最前面；
						table.insertBefore(ul, table.firstChild);
					}
					mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
				}, 1000);
			}
			var count = 0;
			/**
			 * 上拉加载具体业务实现
			 */
			function pullupRefresh() {
				setTimeout(function() {
					mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
					var table = document.body.querySelector('.w-cash-aaa');
					var cells = document.body.querySelectorAll('.mui-table-view-cell');
					for (var i = cells.length, len = i + 20; i < len; i++) {
						var ul = document.createElement('ul');
						ul.className = 'mui-table-view';
						ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div><div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div></div></li>';
						table.appendChild(ul);
					}
				}, 1000);
			}
		</script>


		<script>
		/*进入页面请求刷新*/
			/*$(function(){
				$.ajax({
					url:'',
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(){
						var div =document.createElement('ul');
						ul.className = "mui-table-view";
						ul.innerHTML ='<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div><div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div></div></li>';l
						$('.w-cash-aaa').append(ul);
					}
				})
			})*/
		</script>
@stop