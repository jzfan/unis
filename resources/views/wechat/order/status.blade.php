@extends('wechat.layout')

@section('title')
我的订单状态
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
								<a href="#aim"></a>

	
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

<!--底部nav切换开始-->
    <nav class="win-bar mui-bar mui-bar-tab">
      <a id="defaultTab" class="mui-tab-item " href="/wechat/index">
        <span class="mui-icon iconfont xuanshouye201"></span>
        <span class="mui-tab-label">首页</span>
      </a>
      <a class="mui-tab-item mui-active " href="/wechat/order/status">
        <span class="mui-icon iconfont dingdan111"></span>
        <span class="mui-tab-label">我的订单</span>
      </a>
      <a class="mui-tab-item " href="/wechat/cart">
        <span class="mui-icon iconfont xuangouwuche203"></span>
        <span class="mui-tab-label">购物车</span>
      </a>
      <a class="mui-tab-item" href="/wechat/profile">
        <span class="mui-icon iconfont xuangerenzhongxin204"></span>
        <span class="mui-tab-label">个人中心</span>
      </a>
    </nav>
  <!--底部nav切换结束-->

@stop

@section('js')

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

 <script>mui('#').on('tap','a',function(){document.location.href=this.href;});</script>
	<!-- 进入加载页面 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/profile"><button class="w-beget w-want-accept-native" data-id='+data[i].order_no+'>确认收货</button></a></li></ul>';

	   	 				   var table = document.body.querySelector('#item1mobile .mui-scroll');
						   var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
							   table.insertBefore(div,bot);   

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>
	

	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/uncompleted_buy',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">配送中</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index#item2mobile"><button class="w-bearrive w-want-accept-native" data-id='+data[i].order_no+'>确认送达</button></a></li></ul>';

	   	 				var table = document.body.querySelector('#item2mobile .mui-scroll');
						var bot = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
							   table.insertBefore(div,bot);    

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>



	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/completed_sale',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-s mui-disabled" data-id='+data[i].order_no+'>等待确认</button></li></ul>';

	   	 				var table = document.body.querySelector('#item3mobile .mui-scroll');
						var bot = document.body.querySelector('#item3mobile .mui-pull-bottom-tips');
							   table.insertBefore(div,bot);  

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>





		<script>/*我的订单页面上拉刷新下拉加载*/
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
					
						$('.mui-slider-group  #item1mobile  .mui-scroll').pullToRefresh({

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
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/profile"><button class="w-beget w-want-accept-native" data-id='+data[i].order_no+'>确认收货</button></a></li></ul>'; 

									        			var table = document.body.querySelector('#item1mobile .mui-scroll');
														var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);  
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
									        	console.log(data);
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/profile"><button class="w-beget w-want-accept-native" data-id='+data[i].order_no+'>确认收货</button></a></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item1mobile .mui-scroll');
														var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);
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


		<script>/*我的带餐饮页面上拉刷新下拉加载*/
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
					
						$('.mui-slider-group  #item2mobile  .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order/uncompleted";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	console.log(data);
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index/#item2mobile"><button class="w-bearrive w-want-accept-native" data-id='+data[i].order_no+'>确认送达</button></a></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item2mobile .mui-scroll');
														var bot = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);
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
									var urlajax = "/wechat/ajax/order/uncompleted";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/order/index/#item2mobile"><button class="w-bearrive w-want-accept-native" data-id='+data[i].order_no+'>确认送达</button></a></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item2mobile .mui-scroll');
														var bot = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);
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


		<script>/*我已完成页面上拉刷新下拉加载*/
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
					
						$('.mui-slider-group  #item3mobile  .mui-scroll').pullToRefresh({

							down: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order/completed_buy";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-native" data-id='+data[i].order_no+' disabled>等待确认</button></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item3mobile .mui-scroll');
														var bot = document.body.querySelector('#item3mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);
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
									var urlajax = "/wechat/ajax/order/completed_buy";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-native" data-id='+data[i].order_no+' disabled>等待确认</button></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item3mobile .mui-scroll');
														var bot = document.body.querySelector('#item3mobile .mui-pull-bottom-tips');
															   table.insertBefore(div,bot);
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


	<script>
			/*我的订单状态确认收货*/
			$(function(){
				$(document).on('touchstart','.w-beget',function(){
					var openId = $('.mui-content').attr('data-id'); 
					var orderId = $(this).attr('data-id');
					var urlajax = '/api/order/received/'+orderId+'?openid='+openId; 
					$.ajax({
						url:urlajax,
						dataType:'json',
						async:true,
						data:{},
						type:'GET',
						success:function(data){
							console.log(data)
						}
					})
				})
			})
	</script>

	<script>
			/*我的订单状态确认送达*/
			$(function(){
				$(document).on('touchstart','.w-bearrive',function(){
					var openId = $('.mui-content').attr('data-id'); 
					var orderId = $(this).attr('data-id');
					var urlajax = '/api/order/delivered/'+orderId+'?openid='+openId;

					$.ajax({
						url:urlajax,
						dataType:'json',
						async:true,
						data:{},
						type:'GET',
						success:function(data){
							console.log(data)
						}
					})
				})
			})
	</script>


	<script>
		/*获取用户openId*/
			$(function(){
				$.ajax({
					url:'/wechat/user',
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						$('.mui-content').attr('data-id',data.wechat_openid);
					}
				});
			})
		</script>


@stop