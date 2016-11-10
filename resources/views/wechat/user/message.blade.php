@extends('wechat.layout')

@section('title')
我的消息
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">交易订单信息</h1>
	</header>


	<div class="w-card mui-card">
		<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div class="w-card-header">通知信息<small class="w-card-time mui-pull-right">16/10/18</small></div>
						<div class="w-card-info">您的订单已被接单</div>
					</div>
				</li>
		</ul>
	</div>



	<div class="w-card mui-card">
		<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
						<div class="w-card-info">您的订单已被接单</div>
					</div>
				</li>
		</ul>
	</div>
	
	<div class="w-card mui-card">
		<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
						<div class="w-card-info">亲爱的用户，大U邀请您前来品尝精选美食，众多美...</div>
					</div>
				</li>
		</ul>
	</div>

	<div class="w-card mui-card">
		<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
					<span class="mui-btn mui-btn-red">删除</span>
					</div>
					<div class="mui-slider-handle">
						<div class="w-card-header">互动消息<small class="w-card-time mui-pull-right">16/10/18</small></div>
						<div class="w-card-info">订单已签收！您购买的[酸辣土豆丝]已签收，欢迎再...</div>
					</div>
				</li>
		</ul>
	</div>


	<button style="background-color: #fe4e4c; width: 70%; margin-left: 15%;" id="ajaxbtn">点击查看更多</button>






@stop

@section('js')
	<script>
			
			$(function(){
				$('#ajaxbtn').on('touchstart',function(){
					$.ajax({
						url:'/api/food',
						dataType:'json',
						async:true,
						data:{'page':1},
						type:'GET',
				        jsonp:"callback",
				        jsonpCallback:"success_jsonpCallback",
				        success:function(data){
				        	var datafood = data;
				        	/*console.log(eval(datafood.data)[1].img);*/
				        	var jsons = eval(datafood.data);
				        	for(var i=0;i<jsons.length;i++){
				        		console.log(jsons[i].img+'\n');
				        	}
				        }
					});


				})

			})


	</script>
@stop