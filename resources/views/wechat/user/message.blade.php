@extends('wechat.layout')

@section('title')
我的消息
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">交易订单信息</h1>
	</header>

	<div class="w-card mui-card">
		<!--页眉，放置标题-->
		<div class="w-card-header mui-card-header">通知信息<small class="w-card-time mui-pull-right">16/10/18</small></div>
		<!--内容区-->
		<div class="w-card-content mui-card-content">您的订单已被接单</div>
	</div>

	<div class="w-card mui-card">
		<!--页眉，放置标题-->
		<div class="w-card-header mui-card-header">交易订单消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
		<!--内容区-->
		<div class="w-card-content mui-card-content">订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...</div>
	</div>

	<div class="w-card mui-card">
		<!--页眉，放置标题-->
		<div class="w-card-header mui-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
		<!--内容区-->
		<div class="w-card-content mui-card-content">亲爱的用户，大U邀请您前来品尝精选美食，众多美...</div>
	</div>

	<div class="w-card mui-card">
		<!--页眉，放置标题-->
		<div class="w-card-header mui-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
		<!--内容区-->
		<div class="w-card-content mui-card-content">亲爱的用户，大U邀请您前来品尝精选美食，众多美...</div>
	</div>

@stop