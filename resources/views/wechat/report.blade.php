@extends('wechat.layout')

@section('title')
意见反馈
@stop

@section('content')
	<section >
		<div class="w-respone">
			<form class="w-respone-group mui-input-group" id="report" >
			    <div class="w-respone-textarea">
			    <textarea type="text" class="mui-input-clear" placeholder="请输入您对于Uniserve的意见以及建议..." name="content"></textarea>
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
	$(function(){
		$('.w-respone-btn').on('touchstart',function(){
				var textCon = $('textarea').text();
				return;
		        $.ajax({
		        type:"POST",
		        url:'/api/report?openId',
		        data:textCon,
		        dataType: 'json',
		        success: function(data){
		            console.log(data);
		        },
		        error: function(data){
		        }
		    });
		    });
		});


/*获取用户openId*/
	/*$(function(){
		$.ajax({
			url:'/wechat/user',
			dataType:'json',
			async:false,
			data:{},
			type:'GET',
			success:function(data){
				$('.w-respone').attr('data-id',data.wechat_openid);
			}
		});
	})*/


//弹出消息函数
$(function(){
	function msgInfo(msgEle,msgText){
		$(msgEle).on('touchstart',function(){
			layer.open({
				    content: msgText
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			// setTimeout(function(){
			// 	window.location.href = '/wechat/profile';
			// },1000);
		})
	};
	msgInfo('.w-respone-btn','感谢您的反馈！');/*意见反馈*/
})
</script>

@stop
