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
					<div class="w-card mui-card">
						<a href="交易订单信息.html">
						<ul class="mui-table-view">
							    <li class="mui-table-view-cell">
									<div class="mui-slider-right mui-disabled">
									<span class="mui-btn mui-btn-red">删除</span>
									</div>
									<div class="mui-slider-handle">
										<div class="w-card-header">通知信息<small class="w-card-time mui-pull-right">16/10/18</small></div>
										<div class="w-card-info">您的订单已被接单</div>
									</div>
								</li>
						</ul>
						</a>
					</div>



					<div class="w-card mui-card">
						<a href="交易订单信息.html">
						<ul class="mui-table-view">
							    <li class="mui-table-view-cell">
									<div class="mui-slider-right mui-disabled">
									<span class="mui-btn mui-btn-red">删除</span>
									</div>
									<div class="mui-slider-handle">
										<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
										<div class="w-card-info">您的订单已被接单</div>
									</div>
								</li>
						</ul>
						</a>
					</div>
					
					<div class="w-card mui-card">
						<a href="交易订单信息.html">
						<ul class="mui-table-view">
							    <li class="mui-table-view-cell">
									<div class="mui-slider-right mui-disabled">
									<span class="mui-btn mui-btn-red">删除</span>
									</div>
									<div class="mui-slider-handle">
										<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
										<div class="w-card-info">亲爱的用户，大U邀请您前来品尝精选美食，众多美...</div>
									</div>
								</li>
						</ul>
						</a>
					</div>

					<div class="w-card mui-card">
						<a href="交易订单信息.html">
						<ul class="mui-table-view">
							    <li class="mui-table-view-cell">
									<div class="mui-slider-right mui-disabled">
									<span class="mui-btn mui-btn-red">删除</span>
									</div>
									<div class="mui-slider-handle">
										<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
										<div class="w-card-info">订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...</div>
									</div>
								</li>
						</ul>
						</a>
					</div>
			</div>
	</div>



@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
<!-- <script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
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
					var table = document.body.querySelector('.mui-scroll');
					var cells = document.body.querySelectorAll('.mui-table-view-cell');
					for (var i = cells.length, len = i + 3; i < len; i++) {
						var div = document.createElement('div');
						div.className = 'w-card mui-card';
						div.innerHTML = '<ul class="mui-table-view">'+'<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div><div class="w-card-info">'+'订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...'+'</div></div>'+'</li>'+'</ul>';
						//下拉刷新，新纪录插到最前面；
						table.insertBefore(div, table.firstChild);
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
					var table = document.body.querySelector('.mui-scroll');
					var cells = document.body.querySelectorAll('.mui-table-view-cell');
					for (var i = cells.length, len = i + 20; i < len; i++) {
						var div = document.createElement('div');
						div.className = 'w-card mui-card';
						div.innerHTML = '<ul class="mui-table-view">'+'<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div><div class="w-card-info">'+'订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...'+'</div></div>'+'</li>'+'</ul>';
						table.insertBefore(div, table.firstChild);
					}
				}, 1000);
			}
		</script>
 -->

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


		<script>/*进入页面请求刷新*/
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
						console.log(data);
						var div =document.createElement('div');
						div.className = "w-card mui-card";
						div.innerHTML ='<a href="交易订单信息.html"><ul class="mui-table-view"><li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div><div class="w-card-info">订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...</div></div></li></ul></a>';
					}
				})
			})
		</script>
@stop