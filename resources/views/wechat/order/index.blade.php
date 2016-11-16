@extends('wechat.layout')

@section('title')
我的订单
@stop

@section('content')
	
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item " href="#item1mobile">我的订单</a>
					<a class="mui-control-item mui-active" href="#item2mobile">我的带餐</a>
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
 <script>mui('#').on('tap','a',function(){document.location.href=this.href;});</script>
<script>
mui.init({
  gestureConfig:{
   tap: true, //默认为true
   doubletap: true, //默认为false
   longtap: true, //默认为false
   drag: true, //默认为true
   swipeleft:false,//默认为false，不监听
   swiperight:false//默认为false，不监听
  }
});

</script>


		<script>
		/*上拉刷新下拉加载我的订单列表*/
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
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 
												var table = document.body.querySelector('#item1mobile .mui-scroll');
								   	 			var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
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
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 

									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(ul);   */
                    	    						var table = document.body.querySelector('#item1mobile .mui-scroll');
								   	 				var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
								                    	table.insertBefore(ul,bot); 
									        	}
									        }

											});
										self.endPullUpToRefresh();
									}, 1000);
								}
							}


						});
					
					
				});
			})(mui);
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
					//循环初始化所有下拉刷新，上拉加载。
					
						$('.mui-slider-group #item2mobile .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	console.log(data);
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 

									        		var table = document.body.querySelector('#item2mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
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
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 

									        		var table = document.body.querySelector('#item2mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item2mobile .mui-scroll .mui-pull-bottom-tips');
								                    	table.insertBefore(ul,bot);   
									        	}
									        }

											});
										self.endPullUpToRefresh();
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
					//循环初始化所有下拉刷新，上拉加载。
					
						$('.mui-slider-group #item3mobile .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 

									        			/*var table = document.body.querySelector('#item3mobile');
                    	    								table.appendChild(ul); */  
                    	    						var	table = document.body.querySelector('#item3mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item3mobile .mui-scroll .mui-pull-bottom-tips');
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
									var urlajax = "/wechat/ajax/order";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var ul = document.createElement('ul');
									        			ul.className = "my-menu mui-table-view";
									        			ul.innerHTML = '<li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="my-song mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li><li class="mui-table-view-cell">合计总额：'+data[i].total+'元</li>'; 

									        		var	table = document.body.querySelector('#item3mobile .mui-scroll');
									   	 			var	bot = document.body.querySelector('#item3mobile .mui-scroll .mui-pull-bottom-tips');
								                    	table.insertBefore(ul,bot); 
									        	}
									        }

											});
										self.endPullUpToRefresh();
									}, 1000);
								}
							}


						});
					
					
				});
			})(mui);
		</script>




<!-- 页面加载所有订单列表 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order',
	   	 		dataType:'json',
	   	 		/*data:{'page':'1'},*/
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
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
	   	 		url:'/wechat/ajax/order',
	   	 		// url:'/wechat/ajax/order/uncompleted',
	   	 		dataType:'json',
	   	 		/*data:{'page':1}*/
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
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
	   	 		url:'/wechat/ajax/order',
	   	 		// url:'/wechat/ajax/order/completed',
	   	 		dataType:'json',
	   	 		/*data:{'page':1}*/
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
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