@extends('wechat.layout')

@section('title')
我的余额
@stop

@section('content')
	<section class="output">
		<form action="">
			<header class="out-wrap">
				<div class="out-title">转账到<span>微信钱包</span></div>
				<div class="out-input">
					<p class="out-sub">提现金额</p>
					<input type="number" id="inputNum">
					<p class="out-text">零钱余额￥<span class="out-out"></span>,<span>全部提现</span></p>
				</div>
			</header>

			<button class="out-btn">提现</button>
		</form>
	</section>
@stop

@section('js')

	<script>
	/*获取余额*/
		$(function(){
			var openId =  JSON.parse(localStorage.getItem('openid'));
			var urlajax = '/api/user/balance?openid='+openId;
			$.ajax({
				url:urlajax,
				dataType:'json',
				async:true,
				data:{},
				type:'GET',
				success:function(data){
				var cash = parseFloat(data*0.01);
					$('.out-out').text(cash);
				}
			})
		})
	</script>

	<script>
		$(function(){//提现
			$('.out-btn').on('touchstart',function(){
				var e = $('#inputNum').val();
				var openId =  JSON.parse(localStorage.getItem('openid'));
				var cash = parseFloat($('.out-out').text(cash));
				var ajaxUrl = '/wechat/withdraw?openid='+openId;
				if(true){
						$.ajax({
							url:ajaxUrl,
							dataType:'json',
							data:{cashnumber:parseInt(e*100)},
							async:true,
							type:'POST',
							success:function(data){
								if(data.message == 'success'){
									layer.open({
										content: '提现申请成功！',
										skin: 'msg',
										time: 2 //2秒后自动关闭
									});
									setTimeout(function(){
										window.location.href = '/wechat/profile';
									},1000);
								}else if(data.message == 'failed'){
									layer.open({
										content: '提现申请失败！',
										skin: 'msg',
										time: 2 //2秒后自动关闭
									});
								}
								
							}
						});
				}else{
					layer.open({
						content: '余额不足！',
						skin: 'msg',
						time: 2 //2秒后自动关闭
					});
				}
			})
		})
	</script>

@stop