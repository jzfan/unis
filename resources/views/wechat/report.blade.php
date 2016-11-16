@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section >
		<div class="w-respone">
			<form class="w-respone-group mui-input-group" id="report" method="post" action="/api/report?openId" >
			{!! csrf_field() !!}
			    <div class="w-respone-textarea">
			    <textarea type="text" class=" mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..." name="content"></textarea>
			    </div>
				<span class="w-xian"></span>
			    <button type="button" class="w-respone-btn mui-btn mui-btn-outlined">点击发送</button>
			</form>

		</div>
	</section>

@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
<script>
	/*意见反馈*/
	/*$(function(){

		$('form').on('submit',function(){
			console.log($(this).serialize());
			alert($(this).serialize())
				return;
		        $.ajax({
		        type:"POST",
		        url:'/api/report',
		        data:$(this).serialize(),
		        dataType: 'json',
		        success: function(data){
		            console.log(data);
		        },
		        error: function(data){
		        }
		    });
		    });
		});*/


		/*获取用户openId*/
			$(function(){
				$.ajax({
					url:'/wechat/user',
					dataType:'json',
					async:false,
					data:{},
					type:'GET',
					success:function(data){
						$('.w-about-uniserve').attr('data-id',data.wechat_openid);
					}
				});
			})
</script>
@stop
