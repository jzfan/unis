@extends('wechat.layout')

@section('title')
收货地址
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">选择收货地址</h1>
		      <small class="w-address-save mui-pull-right">保存地址</small>
	</header>

	<section class="w-address-check">
		<div class="w-address-wrap">
			<form class="mui-input-group">
			    <div class="mui-input-row">
			        <label>武汉</label>
			    <input type="text" class="w-address-input mui-input-clear" placeholder="请输入收获地址">
			    </div>
			</form>
		</div>
	</section>

	<section>
		<div class="present-location"><span></span>点击定位当前位置</div>
		<div class="present-address-all">
			<span>以往地址</span> <span class="mui-pull-right">完成</span>
		</div>

		<div>
			<ul class="w-location-group mui-table-view">
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge mui-badge-primary">11</span>
			    </li>
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge mui-badge-success">22</span>
			    </li>
			    <li class="mui-table-view-cell">华中师范大学教师公寓7C314 
			        <span class="mui-badge">33</span>
			    </li>
			</ul>
		</div>
	</section>

@stop