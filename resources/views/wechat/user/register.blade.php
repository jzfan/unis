@extends('wechat.layout')

@section('content')
	<div class="w-entry">
		<div class="w-logo-wrap"><img src="/img/wechat/logo.png" alt=""></div>
	</div>
	<form class="w-input-group mui-input-group" method="POST" action='/wechat/user'>
	{!! csrf_field() !!}
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
	    	<input type="text" class="" placeholder="选择学校" value="武汉理工大学">
	    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


		<div id="popover" class="mui-popover">
	  		<ul class="mui-table-view mui-table-view-radio">
				<li class="mui-table-view-cell">
					<a class="mui-navigate-right">Item 1</a>
				</li>
				<li class="mui-table-view-cell mui-selected">
					<a class="mui-navigate-right">Item 2</a>
				</li>
				<li class="mui-table-view-cell">
					<a class="mui-navigate-right">Item 3</a>
				</li>
			</ul>
		</div>

		

    	<div class="mui-input-row">
	        <label>校区:</label>
	    	<input type="text" class="" placeholder="选择校区">
	    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

    	<div class="mui-input-row">
	        <label>宿舍:</label>
	    	<input type="text" class="" placeholder="选择宿舍楼">
	    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


	    <div class="w-clear mui-input-row">
	        <label>寝室:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入寝室号">
	    </div>

	    <div class="w-clear mui-input-row">
	        <label>手机:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入手机号" value="13587459654">
	    </div>
	<button type="submit" class="w-entry-btn mui-btn mui-btn-danger">完成</button>
	</form>


	<!--底部nav切换-->
		<nav class="win-bar mui-bar mui-bar-tab">
			<a id="defaultTab" class="mui-tab-item mui-active" href="/wechat/index">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">首页</span>
			</a>
			<a class="mui-tab-item" href="/wechat/myOrder">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">我的订单</span>
			</a>
			<a class="mui-tab-item" href="/wechat/cart">
				<span class="mui-icon mui-icon-contact"><span class="mui-badge">1</span></span>
				<span class="mui-tab-label">购物车</span>
			</a>


			<a href="http://www.baidu.com" class="mui-tab-item" >
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">个人中心</span>
			</a>
		</nav>
	<!--底部nav切换-->

@stop
