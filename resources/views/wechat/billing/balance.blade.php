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
			<a class="cash-out" href="#"></a>
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

			/* 下拉刷新具体业务实现*/
			var page = 1;
			function pulldownRefresh() {
				setTimeout(function() {
					var table = document.body.querySelector('.w-cash-aaa');
					var openid = $('.w-cash-leave').attr('data-id');
					page =1;
					var urlajax = '/api/order/completed_sale?openid='+openid+'&page=1&limit=10';   
					$.ajax({
						url:urlajax,
						dataType:'json',
						async:true,
						type:'GET',
						success:function(data){
							jQuery('.mui-table-view').remove();
							var menu = data.data;
							for (var i = 0; i<menu.length; i++) {
								var total = parseFloat(menu[i].total*0.01);
								var ul = document.createElement('ul');
								ul.className = 'mui-table-view';
								ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：'+menu[i].order_no+'<span class="my-song mui-pull-right">+'+total+'元</span></div><div class="right-del">下单时间：'+menu[i].created_at+'<span class="my-song mui-pull-right">'+menu[i].status+'</span></div></div></li>';
								table.append(ul);
							}
						}
					});
					mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
				}, 1000);
			}
			

			/* 上拉加载具体业务实现*/
			
			function pullupRefresh() {
				setTimeout(function() {
					var newpage =page+1;
					var table = document.body.querySelector('.w-cash-aaa');
					var openid = $('.w-cash-leave').attr('data-id');
					var urlajax = '/api/order/completed_sale?openid='+openid+'&page='+newpage+'&limit=10';   
					$.ajax({
						url:urlajax,
						dataType:'json',
						async:true,
						type:'GET',
						success:function(data){
							page++;
							mui('#pullrefresh').pullRefresh().endPullupToRefresh((page>data.last_page));//到最后一页时显示没有更多数据了
							var menu = data.data;
							for (var i = 0; i<menu.length; i++) {
								var total = parseFloat(menu[i].total*0.01);
								var ul = document.createElement('ul');
								ul.className = 'mui-table-view';
								ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div>订单编号：'+menu[i].order_no+'<span class="my-song mui-pull-right">+'+total+'元</span></div><div class="right-del">下单时间：'+menu[i].created_at+'<span class="my-song mui-pull-right">'+menu[i].status+'</span></div></div></li>';
								table.appendChild(ul);
							}
						}
					});
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
					var cash = parseFloat(data*0.01);
						$('.cash-leave-num').html('<span class="cash-rmb">￥</span>'+cash);
					}
				})
			})
		</script>


		<!-- 进入页面加载数据 -->
		<script>
			$(function(){
				var openid = $('.w-cash-leave').attr('data-id');
				var urlajax = '/api/order/completed_sale?openid='+openid+'&page=1&limit=10';   
				$.ajax({
					url:urlajax,
					dataType:'json',
					async:true,
					type:'GET',
					success:function(data){
						var data = data.data;
						for(var i=0;i<data.length;i++){
							var total = parseFloat(data[i].total*0.01);
							var ul = document.createElement('ul');
							ul.className = 'mui-table-view';
							ul.innerHTML = ' <li class="mui-table-view-cell"><div class="mui-slider-handle"><div>订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">+'+total+'元</span></div><div class="right-del">下单时间：'+data[i].created_at+'<span class="my-song mui-pull-right">'+data[i].status+'</span></div></div></li>';
							var parent = $('.w-cash-aaa');
							parent.append(ul);
						}
					}
				})
			})
		</script>
@stop