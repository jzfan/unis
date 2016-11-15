@extends('wechat.layout')

@section('title')
我的订单状态
@stop

@section('content')

 			<div class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted " id="sliderSegmentedControl">
	        	<a href="#item1mobile" class="mui-control-item mui-active">我的订单</a>
	        	<a href="#item2mobile" class="mui-control-item">我的带餐</a>
	        	<a href="#item3mobile" class="mui-control-item">我已带到</a>
	        </div> 
		        
		        <div class="w-slider-group mui-slider-group">
		        	<div id="item1mobile" class="mui-slider-item  mui-control-content mui-active">
		        		<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								


							</div>
						</div>
		        	</div>


		        	<div id="item2mobile" class="mui-slider-item  mui-control-content">
		        		<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								


							</div>
						</div>
		        	</div>
		        	
		        	<div id="item3mobile" class="mui-slider-item mui-control-content">
		        		<div  class="mui-scroll-wrapper">
							<div class="mui-scroll">
								


							</div>
						</div>
		        	</div>
		        </div>


@stop

@section('js')
	<!-- 进入加载页面 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>';

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
	   	 		url:'/wechat/ajax/order/uncompleted',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data[1].address);
	   	 			for(var i=0;i<data.length;i++){
	   	 				console.log(data[i]);
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user_id+'</li><li class="mui-table-view-cell">配送地址：'++data[i].address++'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>';

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
	   	 		url:'/wechat/ajax/order/completed',
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].user+'</li><li class="mui-table-view-cell">配送地址：'++data[i].address++'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>';

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
									        	console.log(data);
									        	for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 

									        			var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   
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
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 
									        			
									        			var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   
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
									        	/*for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 

									        			var table = document.body.querySelector('#item2mobile');
                    	    								table.appendChild(div);   
									        	}*/
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
									        	console.log(data);
									        	/*for(var i=0;i<data.length.i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 
									        			
									        			var table = document.body.querySelector('#item2mobile');
                    	    								table.appendChild(div);   
									        	}*/
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
									var urlajax = "/wechat/ajax/order/completed";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	console.log(data);
									        	/*for(var i=0;i<data.length;i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 

									        			var table = document.body.querySelector('#item3mobile');
                    	    								table.appendChild(div);   
									        	}*/
									        }

											});
										self.endPullDownToRefresh();
									}, 1000);
								}
							},


							up: {
								callback: function() {
									var self = this;
									var urlajax = "/wechat/ajax/order/completed";
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	console.log(data);
									        	/*for(var i=0;i<data.length.i++){
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li><li class="mui-table-view-cell">联系姓名：毛毛</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].taken_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept-native">确认收货</button></li></ul>'; 
									        			
									        			var table = document.body.querySelector('#item3mobile');
                    	    								table.appendChild(div);   
									        	}*/
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


@stop