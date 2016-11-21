@extends('wechat.layout')
@section('content')
@section('js')
<div id="offCanvasWrapper" class="canvas-main mui-off-canvas-wrap mui-draggable mui-slide-in">
	<!--侧滑菜单部分开始-->
	<aside id="offCanvasSide" class="w-canvas-left mui-off-canvas-left">
		<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<h1 class="w-classify">食堂窗口</h1>
				<ul class="w-canvas-list">
				</ul>
			</div>
		</div>
	</aside>
	<!--侧滑菜单部分结束-->

	<!--主界面部分开始-->
	<div class="mui-inner-wrap">
		<header class="w-bar mui-bar mui-bar-nav">
			<a id='left_menu' href="#offCanvasSide" class="mui-icon iconfont caidanlan101 mui-pull-left"></a>
			<h1 class="mui-title">
				<span class="mui-icon iconfont dingwei104">
				</span>&nbsp;&nbsp;
				<span class="address-name" id="addName">
				</span>&nbsp;&nbsp;
				<span class="mui-icon  iconfont youjiantou003" id="arrow">
				</span>
			</h1>
		</header>

		<!--教工食堂下拉框开始-->
		<div id="popover" class="w-popover mui-popover">
			<ul class="mui-table-view mui-table-view-radio" id="canteen-li">

			</ul>
		</div>
		<!--教工食堂下拉框结束-->

		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item mui-active" href="#item1mobile">点餐</a>
					<a class="mui-control-item" href="#item2mobile">带餐</a>
				</div>

				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="w-tab-view mui-table-view">
									<li class="mui-table-view-cell mui-media" data-id="95">
										<img class="mui-media-object mui-pull-left" data-lazyload="/uploads/food/1479312308yn.jpg">
										<div class="w-box">
											<div class="w-menu-left">
												<p class="menu-name">卤皮蛋</p><small class="menu-address">教工食堂</small>
												<p class="menu-number"><span>月售:0&nbsp;&nbsp;点赞:5</span></p>
												<p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">9</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:10.0元</span></p>
											</div>
											<div class="w-menu-right">
												<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
												<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<input type="hidden" class="openId">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mui-off-canvas-backdrop"></div>
	</div>
</div>
<!--主界面部分结束-->

<!--底部nav切换开始-->
<nav class="win-bar mui-bar mui-bar-tab">
	<a id="defaultTab" class="mui-tab-item mui-active" href="/wechat/index">
		<span class="mui-icon iconfont xuanshouye201"></span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item" href="/wechat/order/status">
		<span class="mui-icon iconfont dingdan111"></span>
		<span class="mui-tab-label">我的订单</span>
	</a>
	<a class="mui-tab-item" href="/wechat/cart">
		<span class="mui-icon iconfont xuangouwuche203"><span class="w-badge mui-badge"></span></span>
		<span class="mui-tab-label">购物车</span>
	</a>
	<a class="mui-tab-item" href="/wechat/profile">
		<span class="mui-icon iconfont xuangerenzhongxin204"></span>
		<span class="mui-tab-label">个人中心</span>
	</a>
</nav>
<!--底部nav切换结束-->

<script src="/lib/pusher/main.js"></script>
<script src="/js/wechat/jquery-3.1.1.min.js"></script>
<script>
	mui('body').on('tap', 'a', function() {
		document.location.href = this.href;
	});
</script>

<script>
	(function($) {
		$(document).imageLazyload({
			placeholder: '/img/wechat/defalut.jpg'
		});
	})(mui);
</script>
@stop