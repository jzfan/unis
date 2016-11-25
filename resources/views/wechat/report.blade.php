@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section>
		<div class="w-respone">
			<form class="w-respone-group mui-input-group" id="report">
			    <div class="w-respone-textarea">
			    <textarea type="text" class="mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..."  name="content" required></textarea>
			    </div>
				<span class="w-xian"></span>
			    <button type="button" class="w-respone-btn mui-btn mui-btn-outlined">点击发送</button>
			</form>
		</div>
	</section>
@stop

@section('js')
<script>

	$(function(){
		$('.w-respone-btn').on('touchstart',function(){
			var openId = $('.w-respone').attr('data-id');
			var ajaxUrl = '/api/report?openId='+openId;
			$.post(ajaxUrl,$('#report').serialize(),function(data){
				console.log(data);
					setTimeout(function(){
						window.location.href = '/wechat/profile';
					},800);
				});
		});
	});


	$(function(){
		$('#report textarea').change(function(){
			var info = $('#report textarea').value;
			console.log(info);
		})
		
	})

/*获取用户openId*/
	$(function(){
		$.ajax({
			url:'/wechat/user',
			dataType:'json',
			async:false,
			type:'GET',
			success:function(data){
				$('.w-respone').attr('data-id',data.wechat_openid);
			}
		});
	})

</script>

@stop
