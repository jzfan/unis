@extends('wechat.layout')

@section('title')
收货地址
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">选择收货地址</h1>
		      <span class="w-address-save mui-pull-right">保存地址</span>
	</header>

	<section class="w-address-check">
				<form class="w-address-wrap mui-input-group">
				    <div class="mui-input-row">
				        <label>武汉</label>
				        <input type="text" class="mui-input-clear" placeholder="请输入内容">
				    </div>
				</form>
	</section>

	<section>
		<div class="present-location"><span class="mui-icon iconfont dingwei104"></span>&nbsp;点击定位当前位置</div>
		<div class="present-address-all">
			<span><span class="mui-icon iconfont zhinanzhen503"></span>&nbsp;以往地址</span> <span class="write-del mui-pull-right"><span class="mui-icon iconfont bianji504"></span>&nbsp;编辑</span>
		</div>

		<div>
			<ul class="w-location-group mui-table-view">
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge"><span class="location-ico mui-icon iconfont  mui-pull-right"></span></span>
			    </li>
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge"><span class="location-ico mui-icon iconfont  mui-pull-right"></span></span>
			    </li>
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge"><span class="location-ico mui-icon iconfont duigou506 mui-pull-right"></span></span>
			    </li>
			</ul>
		</div>
	</section>

@stop
@section('js')
<script src="/lib/pusher/main.js"></script>
@stop