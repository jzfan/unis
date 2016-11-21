@extends('wechat.layout')

@section('title')
我的收藏
@stop

@section('content')
		 
		<div id="pullrefresh" class="win-scroll-wrapper mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
        		<ul class="w-tab-view mui-table-view" style="margin-top: 0px;">
				    
				</ul>
		    </div>
	    </div>

@stop

@section('js')
<script src="/lib/pusher/main.js"></script>

	<!-- <script>
	 /*刷新功能开始*/
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
			        	var flove = data.data;
			        	for(var i=0;i<flove.length;i++){
			        		$('.w-tab-view').prepend('<li class="mui-table-view-cell mui-media"><div class="mui-slider-right mui-disabled" data-id='+flove[i].id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+flove[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+flove[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+flove[i].sold+'&nbsp;&nbsp;点赞:'+flove[i].id+'</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+flove[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+flove[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div></li>');
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
				var urlajax = "/wechat/ajax/favorite/";
				$.ajax({
					url:urlajax,
					dataType:'json',
					async:true,
					type:'GET',
					success:function(data){
						var fFood =data.data;
						for( var i=0;i<fFood.length;i++){
							var li = document.createElement('li');
							var table = document.body.querySelector('.w-tab-view');
							li.className  ="mui-table-view-cell mui-media";
							li.innerHTML = '<div class="mui-slider-right mui-disabled" data-id='+fFood[i].id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+fFood[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+fFood[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+fFood[i].original_price+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+fFood[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+fFood[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div>';
							table.appendChild(li);
	
						}
					}
				});
	
			}, 1000);
		}
	</script>  -->



	<script>/*进入页面开始加载*/
		$(function(){
			$.ajax({
				url:'/wechat/ajax/favorite/',
				dataType:'json',
				async:true,
				type:'GET',
				success:function(data){
					var favFood = data.data;
					for(var i=0;i<favFood.length;i++){
						var li = document.createElement('li');
						li.className = "mui-table-view-cell mui-media";
						li.innerHTML = '<div class="mui-slider-right mui-disabled" data-id='+favFood[i].id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+favFood[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+favFood[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+favFood[i].original_price+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+favFood[i].price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+favFood[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div>';
						var table = document.body.querySelector('.w-tab-view');
						table.appendChild(li);
					}
				}
			});
		});
	</script>



	<script>
		//滑动删除收藏功能
		$(function(){
		 	$(document).on('touchstart','.w-tab-view li .mui-disabled',function(){
		 		$(this).parents('li.mui-media').fadeOut();
		 		var food_id = $(this).attr('data-id');
		 		var ajaxUrl ='/wechat/favorite/cancel/'+food_id;
		 		$.ajax({
		 			url:ajaxUrl,
					dataType:'json',
					async:true,
					data:{},
					type:'GET',
					success:function(data){
						layer.open({
						    content: '删除成功'
						    ,skin: 'msg'
						    ,time: 2 //2秒后自动关闭
						  });
						}
		 			})
		 		});
		});
	</script>



	<script>
	/*添加到购物车，从购物车取消功能*/
	$(function(){
		function collect(){
			$(document).on('touchstart','.add-icon',function(){
				var boolName = $(this).find('span').hasClass('jiahao108');
				if(boolName){
					$(this).find('span').removeClass('jiahao108').addClass('duigou506');
					var foodId = $(this).parents('li.mui-table-view-cell').find('div.mui-disabled').attr('data-id');
					var furl = '/wechat/cart/add/'+foodId;
					$.ajax({
						url:furl,
						dataType:'json',
						async:true,
						type:'GET',
						success:function(data){
							layer.open({
						    content: '添加成功'
						    ,skin: 'msg'
						    ,time: 2 //2秒后自动关闭
						  });
						}
					});
				}

				else{
					$(this).find("span").removeClass('.duigou506').addClass('.jiahao108');
					var foodId = $(this).parents('li.mui-table-view-cell').find('div.mui-disabled').attr('data-id');
					var furl = '/wechat/cart/cancel/'+foodId;
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
				
			});
		};
	});
	</script>



@stop