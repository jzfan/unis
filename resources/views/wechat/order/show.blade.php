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
					var li = document.createElement('li');
					li.className = "mui-table-view-cell mui-media";
					li.innerHTML = '<a href="javascript:;"><img class="mui-media-object mui-pull-left" src='+orderItem[i].food.img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+orderItem[i].food.name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+orderItem[i].food.sold+'&nbsp;&nbsp;点赞:'+orderItem[i].food.recommend+'</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+orderItem[i].food.price+'</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon-a"><span class="num-menu-num">份数：'+orderItem[i].amount+'</span></div></div></div></a>';
					var ul = document.body.querySelector('.w-tab-view');
					ul.appendChild(li);
				}

				var div = document.createElement('div');
				div.className  = 'w-finshed-menu';
				div.innerHTML  = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">'+order.total+'元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：'+order.order_no+'<span class="w-hold mui-pull-right">'+order.status+'</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654"></a></div></li><li class="mui-table-view-cell">联系姓名：</li><li class="mui-table-view-cell">配送地址：'+order.address+'</li></ul>';
				 document.body.appendChild(div);
			});
		})
	</script>
		
@stop