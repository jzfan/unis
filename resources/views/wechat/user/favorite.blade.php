@extends('wechat.layout')

@section('title')
我的收藏
@stop

@section('content')
		
		    
		<div id="pullrefresh" class="win-scroll-wrapper mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
		        		<ul class="w-tab-view mui-table-view">
						    <!-- <li class="mui-table-view-cell mui-media">
						    		<div class="<mu></mu>i-slider-right mui-disabled">
						    			<span class="mui-btn mui-btn-red">删除</span>
						    		</div>
						    		<div class="mui-slider-handle">
							    		<a href="javascript:;">
							    		<img class="mui-media-object mui-pull-left" src="/img/wechat/xcr.png">
							    		<div class="w-box">
							            	<div class="w-menu-left">
							            		<p class="menu-name">农家小炒肉</p>
							            		<small class="menu-address">教工食堂</small>
							            		<p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
							            		<p class="menu-footer">
							            			<span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
							            		</p>
							            	</div>

							            	<div class="w-menu-right">
							            		<div class="shan-icon"><span class=""></span></div>
							            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
							            	</div>
						    			</div>
						        		</a>
						    		</div>
						    </li> -->
	
						</ul>
		    </div>
	    </div>

@stop

@section('js')
<script src="/lib/pusher/main.js"></script>

	


	
	<script>/*刷新功能开始*/
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

			/*下拉刷新具体业务实现*/
			function pulldownRefresh() {
				setTimeout(function() {
						var urlajax = "/wechat/ajax/favorite/";
						$.ajax({
						url:urlajax,
						dataType:'json',
						async:true,
						type:'GET',
				        success:function(data){
				        	var foodlove = data;
				        	var fd = eval(foodlove.data);
				        	for(var i=0;i<fd.length;i++){
				        		$('.w-tab-view').prepend('<li class="mui-table-view-cell mui-media"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+fd[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+fd[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+fd[i].sold+'&nbsp;&nbsp;点赞:'+fd[i].id+'</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+fd[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+fd[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div></li>');
				        	}
				        	
							mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //去掉旋转雪花
				        }
					});

				}, 1000);
			}

			var count = 0;

			/* 上拉加载具体业务实现 */
			function pullupRefresh() {
				setTimeout(function() {
					mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
					$.ajax({
						url:'',
						dataType:'json',
						async:true,
						data:{},
						type:'GET',
						success:function(data){
							var fFood =data;
							var fF = eval(fFood.data);
							console.log(fF);
							for( var i=0;i<fF.length;i++){
								var li = document.createElement('li');
								var table = document.body.querySelector('.w-tab-view');
								li.className  ="mui-table-view-cell mui-media";
								li.innerHTML = '<div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+fF[i]+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+fF[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+fF[i].original_price+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+fF[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+fF[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div>';
								table.appendChild(li);

							}
						}
					});
					
					
				}, 1000);
			}
		</script>



		<script>/*进入页面开始加载*/
		$(function(){
			$.ajax({
				url:'/wechat/ajax/favorite/',
				dataType:'json',
				async:true,
				data:{'page':1},
				type:'GET',
				success:function(data){
					var favFood = eval(data.data);
					console.log(favFood[1].img);
					for(var i=0;favFood.length;i++){
							console.log(favFood[i].name);
						var li = document.createElement('li');
						li.className = "mui-table-view-cell mui-media";
						li.innerHTML = '<div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+favFood[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+favFood[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+favFood[i].original_price+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+favFood[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+favFood[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div>';
						var table = document.body.querySelector('.w-tab-view');
						table.appendChild(li);
					}

				}
			});
		})
	</script>

@stop