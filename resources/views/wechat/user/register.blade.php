@extends('wechat.layout')

@section('title')
绑定地址
@stop

@section('content')
	<div class="w-entry">
		<div class="w-logo-wrap"><img src="/img/wechat/logo.png" alt=""></div>
	</div>

	<form class="w-input-group mui-input-group" method="POST" action='/wechat/user'>{!! csrf_field() !!}
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
	    	<input type="text" class="" placeholder="选择学校" value="武汉理工大学">
	    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

			<!-- 学校下拉框 -->
			<div id="popover" class="popover-school w-popover mui-popover">

				<div class="w-search mui-input-row mui-search">
					  <input type="text" placeholder="手动输入">
				</div>

  				<ul class="mui-table-view mui-table-view-radio">
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">武汉理工大学</span>
					</li>
					<li class="mui-table-view-cell mui-selected">
						<span class="mui-navigate-right">武汉师范大学</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">武汉华夏学院</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">武汉纺织大学</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">华中科技大学</span>
					</li>
				</ul>
			</div>

		

    	<div class="mui-input-row" id="school-area">
	        <label>校区:</label>
	    	<input type="text" class="" placeholder="选择校区">
	    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>



    	<div class="mui-input-row" id="school-room">
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
	        <input type="text" class="mui-input-clear" placeholder="输入手机号">
	    </div>
	</form>

	<button type="button" class="w-entry-btn mui-btn mui-btn-danger">完成</button>



@include('wechat.partial.buttomNav')

@stop
