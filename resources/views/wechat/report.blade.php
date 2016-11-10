@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section >
		<div class="w-respone">
			<form class="w-respone-group mui-input-group">
			    <div class="w-respone-textarea">
			    <textarea type="text" class=" mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..."></textarea>
			    </div>
				<span class="w-xian"></span>
			    <button type="button" class="w-respone-btn mui-btn mui-btn-outlined">点击发送</button>
			</form>

		</div>

	</section>

@stop