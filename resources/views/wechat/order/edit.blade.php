@extends('wechat.layout')

@section('title')
订单管理
@stop

@section('content')
 			<div class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted " id="sliderSegmentedControl">
	        	<a href="#item1mobile" class="mui-control-item mui-active">我的订单</a>
	        	<a href="#item2mobile" class="mui-control-item">我的带餐</a>
	        	<a href="#item3mobile" class="mui-control-item">我已带到</a>
	        </div> 
		        
		        <div class="w-slider-group mui-slider-group">
		        	<div id="item1mobile" class="mui-slider-item  mui-control-content mui-active">
		        		<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="menu-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">已配送</span></li>
							    <li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept">确认收货</button></li>
							</ul>
						</div>
		        	</div>


		        	<div id="item2mobile" class="mui-slider-item  mui-control-content">
		        		<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="menu-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">配送中</span></li>
							    <li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept">确认送达</button></li>
							</ul>
						</div>
		        	</div>
		        	
		        	<div id="item3mobile" class="mui-slider-item mui-control-content">
		        		<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="menu-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">已配送</span></li>
							    <li class="mui-table-view-cell"><div class="teleShow">联系电话: <a href="tel:15586879654">15586879654</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept mui-disabled">等待确认</button></li>
							</ul>
						</div>

		        	</div>
		        </div>

@stop