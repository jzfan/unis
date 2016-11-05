@extends('wechat.layout')

@section('title')
我的订单
@stop

@section('content')
		<div class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted " id="sliderSegmentedControl">
	        	<a href="#item1mobile" class="mui-control-item mui-active">我的订单</a>
	        	<a href="#item2mobile" class="mui-control-item">我的带餐</a>
	        	<a href="#item3mobile" class="mui-control-item">我已带到</a>
	        </div> 
		        
		        <div class="w-slider-group mui-slider-group">
		        	<div id="item1mobile" class="mui-slider-item  mui-control-content mui-active">
		        		<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="my-song mui-pull-right">配送中</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已送达</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>
		        	</div>


		        	<div id="item2mobile" class="mui-slider-item  mui-control-content">
		        		<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">配送中</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">等待确认</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>
		        	</div>
		        	
		        	<div id="item3mobile" class="mui-slider-item mui-control-content">
		        		<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						<ul class="my-menu mui-table-view">
						    <li class="mui-table-view-cell">订单编号：8546974125412475<span class="my-song mui-pull-right">已完成</span></li>
						    <li class="mui-table-view-cell">联系电话：15586879654</li>
						    <li class="mui-table-view-cell">联系姓名：毛毛</li>
						    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
						    <li class="mui-table-view-cell">合计总额：32元</li>
						</ul>

						
		        	</div>
		        </div>

		        
		        
		        <!--顶部tab切换结束-->



				<!--订单管理开始-->
				<nav class="bottom-bar mui-bar mui-bar-tab">
					<div class="my-managent"><a href="/"></a>订单管理</div>
				</nav>
				<!--订单管理结束-->

@stop

