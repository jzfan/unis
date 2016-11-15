@extends('wechat.layout')

@section('title')
我的订单
@stop

@section('content')
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item mui-active" href="#item1mobile">我的订单</a>
					<a class="mui-control-item" href="#item2mobile">我的带餐</a>
					<a class="mui-control-item" href="#item3mobile">我已带到</a>
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
								


							</div>
						</div>
					</div>


					<div id="item3mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								


							</div>
						</div>
					</div>
					
				</div>

			</div>
		</div>
@stop

@section('js')
	<script>
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});

				$.ready(function() {
					//循环初始化所有下拉刷新，上拉加载。
					$.each(document.querySelectorAll('.mui-slider-group  #item1mobile  .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order";
									$.ajax({
										url:urlajax,
										dataType:'json',
										async:true,
										type:'GET',
								        success:function(data){
								        	console.log(data);
								        	var createFragment = function(ul, index, count, reverse) {
												var length = ul.querySelectorAll('li').length;
												var fragment = document.createDocumentFragment();
												var li;
												var foodData =data.data;
												for (var i = 0; i < foodData.length; i++) {
													li = document.createElement('li');
													console.log(foodData);
													li.className = 'mui-table-view-cell mui-media';
													li.innerHTML = '<img class="mui-media-object mui-pull-left" src='+foodData[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+foodData[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodData[i].sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodData[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+foodData[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div>';
													fragment.appendChild(li);
												}

												return fragment;
											};

											var ul = self.element.querySelector('.mui-table-view');
											ul.insertBefore(createFragment(ul, index, 10, true), ul.firstChild);
											self.endPullDownToRefresh();
								        }
									});
								}
							},


							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul= self.element.querySelector('.mui-table-view');
										ul.appendChild(createFragment(ul, index, 5));
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});
					var createFragment = function(ul, index, count, reverse) {
						var length = ul.querySelectorAll('li').length;
						var fragment = document.createDocumentFragment();
						var li;
						for (var i = 0; i < count; i++) {
							ul = document.createElement('ul');
							ul.className = 'my-menu mui-table-view';
							ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle">订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div></div></li>';
							fragment.appendChild(ul);
						}
						return fragment;
					};
				});
			})(mui);
		</script>


	 <script>
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$.ready(function() {
					//循环初始化所有下拉刷新，上拉加载。
					$.each(document.querySelectorAll('.mui-slider-group #item2mobile .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							down: {
								callback: function() {
									
									
								}
							},
							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul= self.element.querySelector('.mui-table-view');
										ul.appendChild(createFragment(ul, index, 5));
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});
					var createFragment = function(ul, index, count, reverse) {
						var length = ul.querySelectorAll('li').length;
						var fragment = document.createDocumentFragment();
						var li;
						for (var i = 0; i < count; i++) {
							ul = document.createElement('ul');
							ul.className = 'my-menu mui-table-view';
							ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle">订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div></div></li>';
							fragment.appendChild(ul);
						}
						return fragment;
					};
				});
			})(mui);
		</script>


		<script>
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$.ready(function() {
					//循环初始化所有下拉刷新，上拉加载。
					$.each(document.querySelectorAll('.mui-slider-group #item3mobile  .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							down: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul = self.element.querySelector('.mui-table-view');//选择当前循环元素,返回指定的第一个子元素
										ul.insertBefore(createFragment(ul, index, 10, true), ul.firstChild);//在选择的元素前插入新元素
										self.endPullDownToRefresh();
									}, 1000);//定时器执行结束

									$.ajax({
											url:'/wechat/ajax/order',
											dataType:'json',
											async:true,
											data:{'page':1},
											type:'GET',
									        success:function(data){
								        	console.log(data[0].address);
								        	for( var i=0;i<data.length;i++){

								        			}

									        }//success:执行结束
									        
										});//ajax执行结束
								}
							},

							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul= self.element.querySelector('.mui-table-view');
										ul.appendChild(createFragment(ul, index, 5));
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});

					var createFragment = function(ul, index, count, reverse) {
						var length = ul.querySelectorAll('li').length;
						var fragment = document.createDocumentFragment();
						var li;
						for (var i = 0; i < count; i++) {
							ul = document.createElement('ul');
							ul.className = 'my-menu mui-table-view';
							ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle">订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div></div></li>';
							fragment.appendChild(ul);
						}
						return fragment;
					};
				});
			})(mui);
		</script>



<!-- 页面加载所有订单列表 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order',
	   	 		dataType:'json',
	   	 		data:{'page':'1'}
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var ul = document.createElement('ul');
	   	 				    ul.className = "my-menu mui-table-view";
	   	 				    ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>';
	   	 				table = document.body.querySelector('#item1mobile .mui-scroll');
	   	 				bot = document.body.querySelector('#item1mobile .mui-scroll .mui-pull-bottom-tips');
                    	table.insertBefore(ul,bot); 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>


<!-- 页面加载我的带餐列表 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/uncompleted',
	   	 		dataType:'json',
	   	 		data:{'page':'1'}
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data[1].address);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var ul = document.createElement('ul');
	   	 				    ul.className = "my-menu mui-table-view";
	   	 				    ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>';

	   	 				table = document.body.querySelector('#item2mobile .mui-scroll');
	   	 				bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
                    	table.insertBefore(ul,bot); 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>

	<!-- 页面加载我已带到列表 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/completed',
	   	 		dataType:'json',
	   	 		data:{'page':'1'}
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data[1].address);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var ul = document.createElement('ul');
	   	 				    ul.className = "my-menu mui-table-view";
	   	 				    ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>';

	   	 				table = document.body.querySelector('#item2mobile .mui-scroll');
	   	 				bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
                    	table.insertBefore(ul,bot); 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>



@stop