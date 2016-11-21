@extends('wechat.layout')

@section('title')
我的余额
@stop

@section('content')
		<section class="w-cash-leave">
			<div class="self-cash-leave">
				<div class="cash-leave-num"><span class="cash-rmb">￥</span></div>
				<div class="cash-leave-text">当前余额</div>
			</div>
			<a class="cash-out" href="#">提现</a>
		</section>


<div id="pullrefresh" class="yu-scroll-wrapper mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
		<section class="w-cash-aaa w-self-main">
			
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
						// ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div><div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div></div></li>';
						//下拉刷新，新纪录插到最前面；
						// table.insertBefore(ul, table.firstChild);
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
						// ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：8546974125412475<span class="my-song mui-pull-right">+34.5元</span></div><div class="right-del">下单时间：2016-10-17 11:48<span class="my-song mui-pull-right">已完成</span></div></div></li>';
						// table.appendChild(ul);
					}
				}, 1000);
			}
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
						$('.w-cash-leave').attr('data-id',data.wechat_openid);
					}
				});
			})
		</script>
		
		<script>
		/*获取余额*/
			$(function(){
				var openId = $('.w-cash-leave').attr('data-id');
				var urlajax = '/api/user/balance?openid='+openId;
				$.ajax({
					url:urlajax,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						console.log(data);
						$('.cash-leave-num').html('<span class="cash-rmb">￥</span>'+data);
					}
				})
			})
		</script>


		
		<script>
			$(function(){
				var urlajax = '/wechat/ajax/order';   
				$.ajax({
					url:urlajax,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						for(var i=0;i<data.length;i++){
							var ul = document.createElement('ul');
							ul.className = 'mui-table-view';
							ul.innerHTML = ' <li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">+'+data[i].total+'元</span></div><div class="right-del">下单时间：'+data[i].created_at+'<span class="my-song mui-pull-right">'+data[i].orderer.status+'</span></div></div></li>';
							var parent = $('.w-cash-aaa');
							parent.append(ul);
						}
					}
				})
			})
		</script>
@stop