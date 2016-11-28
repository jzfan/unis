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

<script>/*进入页面开始加载*/
	$(function(){
		var loveFood = JSON.parse(localStorage.getItem('loveFoodId'));

		$.each(loveFood,function(name,value){
			var ajaxUrl = '/api/food/'+value;
			$.ajax({
				url:ajaxUrl,
				dataType:'json',
				async:true,
				type:'GET',
				success:function(data){
					var favFood = data.data;
					var price = parseFloat(favFood.price*0.01);
					var table = document.body.querySelector('.w-tab-view');
					var li = document.createElement('li');
					li.className = "mui-table-view-cell mui-media";
					li.innerHTML = '<div class="mui-slider-right mui-disabled" data-id='+favFood.id+'><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle"><a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+favFood.img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+favFood.name+'</p><small class="menu-address">'+favFood.canteen+'</small><p class="menu-number"><span>月售:'+favFood.sold+'</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+favFood.original_price+'元</span></p></div><div class="w-menu-right"><div class="shan-icon"><span class=""></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></a></div>';
					
					table.appendChild(li);

					if(localStorage.getItem('cartFoodId') != null) {
						//提取本地保存的数据跟加载的数据比对---开始
						var comWith = JSON.parse(localStorage.getItem('cartFoodId'));
						for(var k = 0; k < comWith.length; k++) {
							if(comWith[k] == favFood.id) {
								$('.add-icon').find('span.jiahao108').removeClass('jiahao108').addClass('duigou506');
							}
						}
					}

				}
			});
		})	

	});
</script>



	<script>
		//滑动删除收藏功能
		$(function(){
		 	$(document).on('touchstart','.w-tab-view li .mui-disabled',function(){
		 		$(this).parents('li.mui-media').fadeOut();
		 		var foodId = $(this).attr('data-id');
				var loveFood = JSON.parse(localStorage.getItem('loveFoodId'));

				Array.prototype.removeByValue = function(val) {
					for(var i = 0; i < this.length; i++) {
						if(this[i] == val) {
							this.splice(i, 1);
							break;
						}
					}
				} //给数组构造一个方法，删除数组中指定的元素

				loveFood.removeByValue(foodId);
				localStorage.setItem('loveFoodId', JSON.stringify(loveFood));

				layer.open({
					content: '取消收藏',
					skin: 'msg',
					time: 2 //2秒后自动关闭
				});
		 		});
		});
	</script>


	<script>
	/*添加到购物车，从购物车取消功能*/
	$(function(){
		$(document).on('touchstart','.add-icon',function(){
			var boolName = $(this).find('span').hasClass('jiahao108');
			if(boolName){
				$(this).find('span').removeClass('jiahao108').addClass('duigou506');
				var foodId = $(this).parents('li.mui-table-view-cell').find('div.mui-disabled').attr('data-id');

				if(localStorage.getItem('cartFoodId') != null) {
				cartFood = JSON.parse(localStorage.getItem('cartFoodId'));
				}
			
				cartFood.push(foodId);

				localStorage.setItem('buyCart', cartFood.length);
				localStorage.setItem('cartFoodId', JSON.stringify(cartFood));

				$('.w-badge').text(cartFood.length);

				layer.open({
							content: '添加成功',
							skin: 'msg',
							time: 2 //2秒后自动关闭
						});
			} 
			else{
				$(this).find('span').removeClass('duigou506').addClass('jiahao108');
				var foodId = $(this).parents('li.mui-table-view-cell').find('div.mui-disabled').attr('data-id');

				var cartFood = JSON.parse(localStorage.getItem('cartFoodId'));

				Array.prototype.removeByValue = function(val) {
					for(var i = 0; i < this.length; i++) {
						if(this[i] == val) {
							this.splice(i, 1);
							break;
						}
					}
				} //给数组构造一个方法，删除数组中指定的元素

				cartFood.removeByValue(foodId);
				localStorage.setItem('buyCart', cartFood.length);
				$('.w-badge').text(cartFood.length);
				localStorage.setItem('cartFoodId', JSON.stringify(cartFood));

				layer.open({
							content: '取消添加',
							skin: 'msg',
							time: 2 //2秒后自动关闭
						});
				}

			}); 
			
	});
	</script>



@stop