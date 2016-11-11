@extends('wechat.layout')

@section('title')
绑定地址
@stop

@section('content')
	<div class="w-entry">
		<div class="w-logo-wrap"><img src="/img/wechat/logo.png" alt=""></div>
	</div>
	<form class="w-input-group mui-input-group" id="info" action="" method="post">
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
		    	<input type="text" class="" placeholder="选择学校" value="武汉理工大学" tabIndex="1">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

		<ul class="mui-table-view mui-table-view-radio" id="school-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉理工大学</span>
			</li>
			<li class="mui-table-view-cell">
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


    	<div class="mui-input-row" id="school-area">
	        <label>校区:</label>
		    	<input type="text" class="" placeholder="选择校区" tabIndex="2">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

    	<ul class="mui-table-view mui-table-view-radio" id="area-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉理工大学武昌校区</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉师范大学汉口校区</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉华夏学院东湖校区</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉纺织大学武昌校区</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">华中科技大学武昌校区</span>
			</li>
		</ul>


    	<div class="mui-input-row" id="school-room">
	        <label>宿舍:</label>
		    	<input type="text" class="" placeholder="选择宿舍楼" tabindex="3">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


    	<ul class="mui-table-view mui-table-view-radio" id="room-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉理工大学男生宿舍</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉师范大学女生宿舍</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉华夏学院男生宿舍</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">武汉纺织大学女生宿舍</span>
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-navigate-right">华中科技大学女生宿舍</span>
			</li>
		</ul>


	    <div class="w-clear mui-input-row">
	        <label>寝室:</label>
	        <input type="number" class="mui-input-clear" placeholder="输入寝室号" tabindex="4">
	    </div>

	    <div class="w-clear mui-input-row">
	        <label>手机:</label>
	        <input type="number" class="mui-input-clear" placeholder="输入手机号" tabindex="5" id="telephone">
	    </div>
	    <button type="button" class="w-entry-btn mui-btn mui-btn-danger">完成</button>
	</form>

	



@include('wechat.partial.buttomNav')

@stop

@section('js')
	<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
	<script>
		$('.w-entry-btn')on('touchstart',function(){
				$('#info').submit(
					$.ajax({
						cache: true,
						type: "POST",
						url:ajaxCallUrl,
						data:$('#info').serialize(),//form id
						async: false,
						error: function(request) {
							alert("提交失败");
						},
						success: function(data) {
							alert('提交成功');
						}
					});
				);
			});
	</script>
@stop
