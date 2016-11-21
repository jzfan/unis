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
        <span class="mui-icon iconfont xuangouwuche203"><span class="w-badge mui-badge">0</span></span>
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
	mui('.win-bar').on('tap','a',function(){
		document.location.href=this.href;
	});
</script>

<script>
	if(localStorage.getItem('buyCart') == null) {
		localStorage.setItem('buyCart', '0');
	}

	$('.w-badge').text(parseInt(localStorage.getItem('buyCart')));
</script>

	<!-- 进入加载页面 -->
	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/uncompleted_buy',//我的订单页面----我的订单选项
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			for(var i=0;i<data.length;i++){
	   	 				var tele = "";
	   	 				var name = "";
	   	 				if(data[i].deliver&&data[i].deliver.hasOwnProperty("phone")&&data[i].deliver.hasOwnProperty("name"))
	   	 				{
	   	 					tele = data[i].deliver.phone;
	   	 					name = data[i].deliver.name;
	   	 				}

	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+tele+'">'+tele+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="#"><button class="w-beget w-want-accept-native" data-id='+data[i].id+'>确认收货</button></a></li></ul>';

	   	 				   var table = document.body.querySelector('#item1mobile .mui-scroll');
						   var bot = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
							   table.insertBefore(div,bot);  
							if(data[i].status !='已送达'){
	   	 				    	$('.w-beget').attr('disabled','disabled');
	   	 				    } 

	   	 			}
	   	 		}
	   	 	})
	   })
	</script>
	

	<script>
	   $(function(){
	   	 	$.ajax({
	   	 		url:'/wechat/ajax/order/uncompleted_sale',//我的订单页面----我的带餐选项
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			console.log(data);
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-bearrive w-want-accept-native" data-id='+data[i].id+'>确认送达</button></li></ul>';

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
	   	 		url:'/wechat/ajax/order/completed_sale_today',//我的订单页面----我已带到选项
	   	 		dataType:'json',
	   	 		async:true,
	   	 		type:'GET',
	   	 		success:function(data){
	   	 			for(var i=0;i<data.length;i++){
	   	 				var div = document.createElement('div');
	   	 				    div.className = "w-finshed-menu";
	   	 				    div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+'<span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-s mui-disabled" data-id='+data[i].order_no+'>等待确认</button></li></ul>';

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
									var urlajax = "/wechat/ajax/order/uncompleted_buy";//我的订单页面----我的订单选项
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var tele = "";
								   	 				var name = "";
								   	 				if(data[i].deliver&&data[i].deliver.hasOwnProperty("phone")&&data[i].deliver.hasOwnProperty("name"))
								   	 				{
								   	 					tele = data[i].deliver.phone;
								   	 					name = data[i].deliver.name;
								   	 				}
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+tele+'">'+tele+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href=""><button class="w-beget w-want-accept-native" data-id='+data[i].id+'>确认收货</button></a></li></ul>'; 

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
									var urlajax = "/wechat/ajax/order/uncompleted_buy";//我的订单页面----我的订单选项
									setTimeout(function() {
										$.ajax({
											url:urlajax,
											dataType:'json',
											async:true,
											type:'GET',
									        success:function(data){
									        	for(var i=0;i<data.length;i++){
									        		var tele = "";
								   	 				var name = "";
								   	 				if(data[i].deliver&&data[i].deliver.hasOwnProperty("phone")&&data[i].deliver.hasOwnProperty("name"))
								   	 				{
								   	 					tele = data[i].deliver.phone;
								   	 					name = data[i].deliver.name;
								   	 				}
									        		var div = document.createElement('div');
									        			div.className = "w-finshed-menu";
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+tele+'">'+tele+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href=""><button class="w-beget w-want-accept-native" data-id='+data[i].id+'>确认收货</button></a></li></ul>'; 
									        			
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
									var urlajax = "/wechat/ajax/order/uncompleted_sale";//我的订单页面----我的带餐选项
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
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-bearrive w-want-accept-native" data-id='+data[i].id+'>确认送达</button></li></ul>'; 
									        			
									        			/*var table = document.body.querySelector('#item1mobile');
                    	    								table.appendChild(div);   */
                    	    							var table = document.body.querySelector('#item2mobile .mui-scroll');
														var bot = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
													   /*	$('#item2mobile .mui-scroll').html('');*/
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
									var urlajax = "/wechat/ajax/order/uncompleted_sale";//我的订单页面----我的带餐选项
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
									       			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-bearrive w-want-accept-native" data-id='+data[i].id+'>确认送达</button></li></ul>'; 
									        			
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



		<script>/*我已带到页面上拉刷新下拉加载*/
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
									var urlajax = "/wechat/ajax/order/completed_sale_today"; //我的订单页面----我已带到选项
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
									        			div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-native" data-id='+data[i].id+' disabled>等待确认</button></li></ul>'; 

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
									var urlajax = "/wechat/ajax/order/completed_sale_today";//我的订单页面----我已带到选项 
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
									         			div.innerHTML = '<ul class="w-cash-all mui-table-view" data-id='+data[i].order_no+'><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+data[i].total+'元(含服务费)</span></li></ul><ul class="menu-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+data[i].order_no+' <span class="w-hold mui-pull-right">'+data[i].status+'</span></li><li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:'+data[i].orderer.phone+''+data[i].orderer.phone+'">'+data[i].orderer.phone+'</a></div></li><li class="mui-table-view-cell">联系姓名：'+data[i].orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+data[i].address+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：'+data[i].paid_at+'&nbsp;&nbsp;&nbsp;&nbsp;预约时间：'+data[i].appointment_at+'</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-hold w-want-accept-native" data-id='+data[i].id+' disabled>等待确认</button></li></ul>'; 
									        			
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
					var btn = $(this);
					var openId = $('.mui-content').attr('data-id'); 
					var orderId = $(this).attr('data-id');
					var urlajax = '/api/order/received/'+orderId+'?openid='+openId;

					$.get(urlajax, function(data) {
						if(data == 'success') {
							btn.parent().parent().parent().parent().slideUp();
						}
					});
				})
			})
	</script>

	<script>
			/*我的订单状态确认送达*/
			$(function(){
				$(document).on('touchstart','.w-bearrive',function(){
					var btn = $(this);
					var openId = $('.mui-content').attr('data-id'); 
					var orderId = $(this).attr('data-id');
					var urlajax = '/api/order/delivered/'+orderId+'?openid='+openId;

					$.get(urlajax, function(data) {
						if(data == 'success') {
							btn.parent().parent().parent().slideUp();
						}
					});
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
						console.log(data);
					}
				});
			})
		</script>

@stop