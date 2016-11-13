@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section >
		<div class="w-respone">
			<form class="w-respone-group mui-input-group" id="report">
			    <div class="w-respone-textarea">
			    <textarea type="text" class=" mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..."></textarea>
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
		$('.w-respone-btn')on('touchstart',function(){
				$('#report').submit(
					$.ajax({
						cache: true,
						type: "POST",
						url:ajaxCallUrl,
						data:$('#report').serialize(),//form id
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
