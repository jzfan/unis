@extends('wechat.layout')

@section('title')
订单详情
@stop

@section('content')
						
					<div class="menu-detail">
						<ul class="w-tab-view mui-table-view">
						    <li class="mui-table-view-cell mui-media">
						        <a href="javascript:;">
						            <img class="mui-media-object mui-pull-left" src="img/xcr.png">
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
						            		<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
						            		<div class="add-icon-a"><span class="num-menu-num">份数：1</span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						    
						    <li class="mui-table-view-cell mui-media">
						        <a href="javascript:;">
						            <img class="mui-media-object mui-pull-left" src="img/sls.png">
						            <div class="w-box">
						            	<div class="w-menu-left">
						            		<p class="menu-name">酸辣土豆丝</p>
						            		<small class="menu-address">教工食堂</small>
						            		<p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
						            		<p class="menu-footer">
						            			<span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
						            		</p>
						            	</div>
						            	<div class="w-menu-right">
						            		<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
						            		<div class="add-icon-a"><span class="num-menu-num">份数：2</span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>

						</ul>

						<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="w-home-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">待接单</span></li>
							    <li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>
						</div>
				</div>	

	@stop

	@section('js')
		<!-- <script>
			$(function(){
				$.get('/api/order/show/583112ca',function(data){
						console.log(data);
				});
			});

		</script> -->
	@stop