@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section >
		<div class="w-respone">
			<form class="w-respone-group mui-input-group" id="report">
			    <div class="w-respone-textarea">
			    <textarea type="text" class=" mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..." name=""></textarea>
			    <input type="hidden" name='info' id='message'>
			    </div>
				<span class="w-xian"></span>
			    <button type="submit" class="w-respone-btn mui-btn mui-btn-outlined">点击发送</button>
			</form>

		</div>
	</section>

@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
<script>
	/*意见反馈*/
	$(function(){

		$('form').on('submit',function(){

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
		});
</script>
@stop
