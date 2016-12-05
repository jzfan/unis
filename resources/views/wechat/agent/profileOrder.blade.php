@extends('wechat.layout')

@section('title')
我的订单
@stop

@section('content')
	
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item mui-active" href="#item2mobile">我的带餐</a>
					<a class="mui-control-item " href="#item3mobile">我已带到</a>
				</div>
	
				<div class="mui-slider-group">
					<div id="item2mobile" class="mui-slider-item mui-control-content mui-active">
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

	<!-- 个人中心页面加载我的订单列表 -->
	<script>
		mui('.mui-slider-group').on('tap', 'a', function() {
			document.location.href = this.href;
		});
	</script>

	<script>
	$(function(){
		$.ajax({
				url:'/wechat/user',
				dataType:'json',
				async:false,
				type:'GET',
				success:function(data){
					$('.mui-content').attr('data-id',data.wechat_openid);
				}
			});
	})
	</script> 

<!-- 个人中心页面加载我的带餐列表 -->
	<script>
	   $(function(){
	   	var openid = $('.mui-content').attr('data-id');
	   	var urlajax = '/api/order/uncompleted_sale?openid='+openid;//个人中心我的带餐
	   	 	$.ajax({
	   	 		url:urlajax, 
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			var data = data.data;
	   	 			for(var i=0;i<data.length;i++){
	   	 				var total = parseFloat(data[i].total);
	   	 				var ul = document.createElement('ul');
	   	 				    ul.className = "my-menu mui-table-view";
	   	 				    ul.innerHTML = '<a href="/wechat/order/show/'+data[i].id+'"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li></a><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><a href="/wechat/order/show/'+data[i].id+'"><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li></a>';

	   	 				table = document.body.querySelector('#item2mobile .mui-scroll');
	   	 				bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
                    	table.insertBefore(ul,bot); 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>

	<!-- 个人中心页面加载我已带到列表 -->
	<script>
	   $(function(){
	   		var openid = $('.mui-content').attr('data-id');
	   		var urlajax = '/api/order/completed_sale?openid='+openid+'&page=1&limit=15';//个人中心我已带到
	   	 	$.ajax({
	   	 		url:urlajax,//个人中心我已带到
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			var data = data.data;
	   	 			for(var i=0;i<data.length;i++){
	   	 				var total = parseFloat(data[i].total);
	   	 				var ul = document.createElement('ul');
	   	 				    ul.className = "my-menu mui-table-view";
	   	 				    ul.innerHTML = '<a href="/wechat/order/show/'+data[i].id+'"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li></a><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><a href="/wechat/order/show/'+data[i].id+'"><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li></a>';

	   	 				table = document.body.querySelector('#item3mobile .mui-scroll');
	   	 				bot = document.body.querySelector('#item3mobile .mui-scroll .mui-pull-bottom-tips');
                    	table.insertBefore(ul,bot); 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>

		<script>/*上拉刷新下拉加载我的带餐列表*/
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
					//初始化下拉刷新，上拉加载。
						$('.mui-slider-group #item2mobile .mui-scroll').pullToRefresh({
							down: {
								callback: function() {
									var self = this;
									var openid = jQuery('.mui-content').attr('data-id');
	   								var urlajax = '/api/order/uncompleted_sale?openid='+openid;//个人中心我的带餐
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	var data = data.data;
									        	jQuery('#item2mobile .mui-scroll ul').remove();
									        	for(var i=0;i<data.length;i++){
									        		var table = document.body.querySelector('#item2mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
									        		var total = parseFloat(data[i].total);
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li>'; 

								                    	table.insertBefore(ul,bot); 
									        	}
									        }

										});
										self.endPullDownToRefresh();
									}, 1000);
								}
							},


							up: {
								callback: function() {
									var self = this;
									var openid = jQuery('.mui-content').attr('data-id');
	   								var urlajax = '/api/order/uncompleted_sale?openid='+openid;//个人中心我的带餐
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	var data = data.data;
									        	self.endPullUpToRefresh(true);
									        	for(var i=0;i<data.length;i++){
									        		var table = document.body.querySelector('#item2mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
									        		var total = parseFloat(data[i].total);
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li>'; 

								                    	//table.insertBefore(ul,bot); //插入数据
									        	}
									        }

										});
										//self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
				});
			})(mui);
		</script>


		<script>/*上拉刷新下拉加载我已带到列表*/
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
					//循环初始化下拉刷新，上拉加载。
						var page = 1;
						$('.mui-slider-group #item3mobile .mui-scroll').pullToRefresh({
							down: {
								callback: function() {
									page = 1;
									var self = this;
									var openid = jQuery('.mui-content').attr('data-id');
	   								var urlajax = '/api/order/completed_sale?openid='+openid+'&page=1&limit=15';//个人中心我已带到
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	jQuery('#item3mobile .mui-scroll ul').remove();
									        	var data = data.data;
									        	for(var i=0;i<data.length;i++){
									        		var	table = document.body.querySelector('#item3mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item3mobile .mui-scroll .mui-pull-bottom-tips');
									        		var total = parseFloat(data[i].total);
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li>'; 
                    	    						
								                    		table.insertBefore(ul,bot); //插入数据
									        	}
									        }

										});
										self.endPullDownToRefresh();
									}, 1000);
								}
							},


							up: {
								callback: function() {
									var self = this;
									var newpage = page+1;
									var openid = jQuery('.mui-content').attr('data-id');
	   								var urlajax = '/api/order/completed_sale?openid='+openid+'&page='+newpage+'&limit=15';//个人中心我已带到
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	page++;
									        	self.endPullUpToRefresh(page>=data.last_page);
									        	var data = data.data;
									        	for(var i=0;i<data.length;i++){
									        		var	table = document.body.querySelector('#item3mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item3mobile .mui-scroll .mui-pull-bottom-tips');
									        		var total = parseFloat(data[i].total);
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+total+'元</li>'; 

								                    	table.insertBefore(ul,bot); 
									        	}
									        }

										});
										//self.endPullUpToRefresh();
									}, 1000);
								}
							}

						});	
				});
			})(mui);
		</script>


@stop