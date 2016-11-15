@extends('wechat.layout')

@section('content')
		<div id="offCanvasWrapper" class="canvas-main mui-off-canvas-wrap mui-draggable mui-slide-in">
			<!--侧滑菜单部分开始-->
			<aside id="offCanvasSide" class="w-canvas-left mui-off-canvas-left">
		      <div id="offCanvasSideScroll" class="mui-scroll-wrapper">
		        <div class="mui-scroll">
		          <h1 class="w-classify">食堂窗口</h1>
		          
		          <ul class="w-canvas-list">
		          @foreach($shops as $shop)
		          	<a href=""><li>{{ $shop->name }}</li></a>
		          @endforeach
		          </ul>
		        </div>
		      </div>
		    </aside>
			<!--侧滑菜单部分结束-->

	<!--主界面部分开始-->
	<div class="mui-inner-wrap">
		<header class="w-bar mui-bar mui-bar-nav">
			<a href="#offCanvasSide" class="mui-icon iconfont caidanlan101 mui-pull-left"></a>
			<h1 class="mui-title"><span class="mui-icon iconfont dingwei104"></span>&nbsp;&nbsp;<span class="address-name">{{ $selected_canteen->name }}</span>&nbsp;&nbsp;<span class="mui-icon  iconfont youjiantou003" id="arrow"></span></h1>
		</header>


		<!--教工食堂下拉框开始-->
		    <div id="popover" class="w-popover mui-popover">
  				<ul class="mui-table-view mui-table-view-radio">
  				@foreach($canteens as $canteen)
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right"><a href="/wechat/index/{{ $canteen->id }}" class="selectDown">{{ $canteen->name }}</a></span>
					</li>
				@endforeach
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
								
		
							</div>
						</div>
					</div>


					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								
					<!-- 带餐数据列表开始 -->
					<!-- @foreach($orders as $order)
						@foreach($order->order_items as $item)
						<ul class="w-tab-view mui-table-view">
						    <li class="mui-table-view-cell mui-media">
						        <a href="javascript:;">
						            <img class="mui-media-object mui-pull-left" src="{{ $item->food->img }}">
						            <div class="w-box">
						            	<div class="w-menu-left">
						            		<p class="menu-name">{{ $item->food->name }}</p>
						            		<small class="menu-address">{{ $item->food->shop->canteen->name }}</small>
						            		<p class="menu-number"><span>月售:{{ $item->food->sold }}</span></p>
						            		<p class="menu-footer">
						            			<span class="vule-icon">￥</span><span class="vue-number">{{ $item->food->priceAfterDiscount() }}</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:{{ $item->food->price }}元</span>
						            		</p>
						            	</div>
						            	<div class="w-menu-right">
						            		<div class="love-icon"><span class=""></span></div>
						            		<div class="add-icon-a"><span class="num-menu-num">份数：{{ $item->amount }}</span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						    
					
						</ul>
						@endforeach
						<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">{{ $order->total + 2 }}元(含服务费)</span></li>
							</ul>
					
							<ul class="w-home-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：{{ $order->order_no }} <span class="w-hold mui-pull-right">待接单</span></li>
							    <li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">{{ $order->orderer->phone }}</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：{{ $order->orderer->name }}</li>
							    <li class="mui-table-view-cell">配送地址：{{ $order->address }}</li>
							</ul>
					
							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：{{ $order->created_at }}&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>
					
							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><a href="/wechat/order/index"><button class="w-want-accept">我要带餐</button></a></li>
							</ul>
						</div>
					@endforeach -->


							<!-- 带餐数据列表结束 -->

							</div>
						</div>
					</div>
					
				</div>

			</div>
		</div>

			<div class="mui-off-canvas-backdrop"></div>
	</div>
<!--主界面部分结束-->
</div>
</div>
@include('wechat.partial.buttomNav')
	
@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
<script src="/js/wechat/jquery-3.1.1.min.js"></script>
<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>

<script>/*菜品刷新加载*/
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$(function() {
					//循环初始化所有下拉刷新，上拉加载。
					
						$('.mui-slider-group #item1mobile .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/api/foods_of_canteen/{{ $selected_canteen->id }}";
									setTimeout(function() {
											$.ajax({
												url:urlajax,
												dataType:'json',
												data:{'page':1},
												async:true,
												type:'GET',
												success:function(data){
													var foodAll = data.data;
													for(var i=0;i<foodAll.length;i++){
														ul = document.createElement('ul');
														ul.className = "w-tab-view mui-table-view";
														ul.innerHTML = '<li class="mui-table-view-cell mui-media"><img class="mui-media-object mui-pull-left" src='+foodAll[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+foodAll[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodAll[i].sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodAll[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+foodAll[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></li>';
														var table =document.body.querySelector('#item1mobile .mui-scroll')
															table.appendChild(ul);
													}
												}

											})
										self.endPullDownToRefresh();
									}, 1000);
								}
							},


							up: {
								callback: function() {
									var urlajax= '/api/foods_of_canteen/{{ $selected_canteen->id }}';
									var self = this;
									setTimeout(function() {
										$.ajax({
												url:urlajax,
												dataType:'json',
												data:{'page':1},
												async:true,
												type:'GET',
												success:function(data){
													var foodAll = data.data;
													for(var i=0;i<foodAll.length;i++){
														ul = document.createElement('ul');
														ul.className = "w-tab-view mui-table-view";
														ul.innerHTML = '<li class="mui-table-view-cell mui-media"><img class="mui-media-object mui-pull-left" src='+foodAll[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+foodAll[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodAll[i].sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodAll[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+foodAll[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></li>';
														var main =document.body.querySelector('#item1mobile .mui-scroll')
														var table =document.body.querySelector('#item1mobile .mui-pull-bottom-tips')
															main.insertBefore(ul,table);
													}
												}

											})
										self.endPullUpToRefresh();
									}, 1000);
								}
							}


						});
					
					
				});
			})(mui);
		</script>







		<script>/*带餐上拉刷新下拉加载开始*/
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$(function() {
					//循环初始化所有下拉刷新，上拉加载。
					
						$('.mui-slider-group #item2mobile .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/order/ordered";
									setTimeout(function() {
											$.ajax({
												url:urlajax,
												dataType:'json',
												data:{'page':1},
												async:true,
												type:'GET',
												success:function(data){
													console.log(data);
													var takeFood = data.data
													for(var i=0;i<takeFood.length;i++){
														console.log(takeFood[i].status);
														div = document.createElement('div');
														div.className = "w-finshed-menu";
														div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+takeFood[i].total+'元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+takeFood[i].order_no+'<span class="w-hold mui-pull-right">'+takeFood[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">13511787497</a></div></li><li class="mui-table-view-cell">联系姓名：Abigale Parisian</li><li class="mui-table-view-cell">配送地址：'+takeFood[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+takeFood[i].created_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+takeFood[i].updated_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index"><button class="w-want-accept">我要带餐</button></a></li></ul>';
													var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
													var par = document.body.querySelector('.mui-slider-group #item2mobile .mui-scroll');
                    									par.insertBefore(div,table); 
													}
												}

											})
										self.endPullDownToRefresh();
									}, 1000);
								}
							},


							up: {
								callback: function() {
									var urlajax= '/wechat/order/ordered';
									var self = this;
									setTimeout(function() {
										$.ajax({
												url:urlajax,
												dataType:'json',
												data:{'page':1},
												async:true,
												type:'GET',
												success:function(data){
													var takeUp = data.data
													for(var i=0;i<takeUp.length;i++){
														console.log(takeUp[i].status);
														div = document.createElement('div');
														div.className = "w-finshed-menu";
														div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+takeUp[i].total+'元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+takeUp[i].order_no+'<span class="w-hold mui-pull-right">'+takeUp[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">13511787497</a></div></li><li class="mui-table-view-cell">联系姓名：Abigale Parisian</li><li class="mui-table-view-cell">配送地址：'+takeUp[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+takeUp[i].created_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+takeUp[i].updated_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index"><button class="w-want-accept">我要带餐</button></a></li></ul>';
													var parent = document.body.querySelector('#item2mobile .mui-scroll');
													var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
														parent.insertBefore(div,table);
													}
												}

											})
										self.endPullUpToRefresh();
									}, 1000);
								}
							}


						});
					
					
				});
			})(mui);
		</script>



		<script>/*添加喜欢，取消喜欢*//*添加到购物车，取消*/
			$(function(){
				function collect(coName,ifName,haveName,coText1,coText2,typeA){
					$(document).on('touchstart',coName,function(){
						var boolName = $(this).find('span').hasClass(ifName);
						if(boolName){
							$(this).find('span').removeClass(ifName).addClass(haveName);
							var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');
							var furl = '/wechat/'+typeA+'/add/'+foodId;
							$.ajax({
								url:furl,
								dataType:'json',
								async:true,
								type:'GET',
								success:function(data){
									layer.open({
								    content: coText1
								    ,skin: 'msg'
								    ,time: 2 //2秒后自动关闭
								  });
								}
							});
						}

						else{
							$(this).find("span").removeClass(haveName).addClass(ifName);
							var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');
							var furl = '/wechat/'+typeA+'/cancel/'+foodId;
							$.ajax({
								url:furl,
								dataType:'json',
								async:true,
								type:'GET',
								success:function(data){
									layer.open({
								    content: coText2
								    ,skin: 'msg'
								    ,time: 2 //2秒后自动关闭
								  });
								}
							});
						}
						
					})
				};
				collect('.love-icon','dianzan105','dianzan106','收藏成功','取消收藏','favorite');
				collect('.add-icon','jiahao108','duigou506','添加成功','取消添加','cart');
			});
		</script>




		<script>
		/*进入加载点菜食品*/
			$(function(){
				$.ajax({
					url:'/api/foods_of_canteen/{{ $selected_canteen->id }}',
					dataType:'json',
					async:true,
					type:'GET',
					success:function(data){
							var foodAll = data.data;
							for(var i=0;i<foodAll.length;i++){
								ul = document.createElement('ul');
								ul.className = "w-tab-view mui-table-view";
								ul.innerHTML = '<li class="mui-table-view-cell mui-media"><img class="mui-media-object mui-pull-left" src='+foodAll[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+foodAll[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodAll[i].sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodAll[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+foodAll[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></li>';
								var parent =document.body.querySelector('#item1mobile .mui-scroll');
									table =document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
									parent.insertBefore(ul,table);
							}
						}

				})
			})
		</script>



		<script>
		/*进入加载带餐*/
			$(function(){
				$.ajax({
					url:'/wechat/order/ordered',
					dataType:'json',
					async:true,
					type:'GET',
					success:function(data){
						var takeFood = data.data;
						console.log(takeFood);
						for(var i=0;i<takeFood.length;i++){
							console.log(takeFood[i].order_no);
							div = document.createElement('div');
							div.className = "w-finshed-menu";
							div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+takeFood[i].total+'元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+takeFood[i].order_no+'<span class="w-hold mui-pull-right">'+takeFood[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">13511787497</a></div></li><li class="mui-table-view-cell">联系姓名：Abigale Parisian</li><li class="mui-table-view-cell">配送地址：'+takeFood[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+takeFood[i].created_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+takeFood[i].updated_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index"><button class="w-want-accept">我要带餐</button></a></li></ul>';
							var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
							var parent = document.body.querySelector('#item2mobile .mui-scroll');
							parent.insertBefore(div,table); 
						}
					}

				})
			})
		</script>



@stop
