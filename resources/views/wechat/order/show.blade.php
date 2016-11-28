@extends('wechat.layout')

@section('title')
我的订单详情页
@stop

@section('content')
		<div class="menu-detail">
			<ul class="w-tab-view mui-table-view" style="margin-top: 0px;">

			</ul>

						
		</div>	
@stop

@section('js')
 
	<script>
	/*获取用户openId*/
		$(function(){
			$.ajax({
				url:'/wechat/user',
				dataType:'json',
				async:false,
				data:{},
				type:'GET',
				success:function(data){
					$('.menu-detail').attr('data-id',data.wechat_openid);
				}
			});
		})


		$(function(){

	     var url = window.location.href;
	     var diver = url.indexOf('show/'); 
	     var order_id = url.slice(diver+5);
	     var openId = $('.menu-detail').attr('data-id');
	     var urlajax = '/api/order/show/'+order_id+'?openid='+openId;
			$.get( urlajax,function(data){
				var order = data.order;
				var orderItem = order.order_items;
				for(var i=0;i<orderItem.length;i++){
					var price = parseFloat(orderItem[i].price*0.01);
					var original = parseFloat(orderItem[i].food.price);
					var li = document.createElement('li');
					li.className = "mui-table-view-cell mui-media";
					li.innerHTML = '<a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+orderItem[i].food.img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+orderItem[i].food.name+'</p><small class="menu-address">诗香苑</small><p class="menu-number"><span>月售:'+orderItem[i].food.sold+'</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:'+original+'元</span></p></div><div class="w-menu-right"><div class="love-icon" data-id='+orderItem[i].food.id+'><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon-a"><span class="num-menu-num">份数：'+orderItem[i].amount+'</span></div></div></div></a>';
					var ul = document.body.querySelector('.w-tab-view');
					ul.appendChild(li);

					if(localStorage.getItem('loveFoodId') != null) {
						//提取本地保存的收藏数据跟加载的数据比对---开始
						var compare = JSON.parse(localStorage.getItem('loveFoodId'));
						for(var f = 0; f < compare.length; f++) {
							if(compare[f] == orderItem[i].food.id) {
								 jQuery(ul).find('span.dianzan105').removeClass('dianzan105').addClass('dianzan106');
							}
						}
					}

				}

				var total = parseFloat(order.total*0.01);
				var div = document.createElement('div');
				div.className  = 'w-finshed-menu';
				div.innerHTML  = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+total+'元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+order.order_no+'<span class="w-hold mui-pull-right">'+order.status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：'+order.orderer.phone+'<a href="tel:15586879654"></a></div></li><li class="mui-table-view-cell">联系姓名：'+order.orderer.name+'</li><li class="mui-table-view-cell">配送地址：'+order.address+'</li></ul>';
				 document.body.appendChild(div);
			});
		})
	</script>



	<script>
	/*添加喜欢，取消喜欢*/
	$(function() {
		$(document).on('touchstart', '.love-icon', function() {
			var boolName = $(this).find('span').hasClass('dianzan105');
			if(boolName) {
				$(this).find('span').removeClass('dianzan105').addClass('dianzan106');
				var foodId = $(this).attr('data-id');

				if(localStorage.getItem('loveFoodId') == null) {
					var loveFood = new Array(); //定义购物车里食品id数组
					loveFood.push(foodId);
					localStorage.setItem('loveFoodId', JSON.stringify(loveFood));
				} else {
					var loveFood = JSON.parse(localStorage.getItem('loveFoodId'));
					loveFood.push(foodId);
					localStorage.setItem('loveFoodId', JSON.stringify(loveFood));
				}

				layer.open({
					content: '收藏成功',
					skin: 'msg',
					time: 2 //2秒后自动关闭
				});

			} else {
				$(this).find("span").removeClass('dianzan106').addClass('dianzan105');
				
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
				
				//var show = JSON.parse(localStorage.getItem('loveFoodId'));

				layer.open({
					content: '取消收藏',
					skin: 'msg',
					time: 2 //2秒后自动关闭
				});
			}
		});
	});
</script>
		
@stop