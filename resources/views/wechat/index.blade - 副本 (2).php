@extends('wechat.layout')

@section('content')
	<button id="hand1">获取学校</button>
	<button id="hand2">获取校区</button>
	<button id="hand3">获取宿舍</button>
	<button id="hand4">查找学校</button>
	<button id="hand5">点餐</button>
	<button id="hand6">订餐</button>
	<button id="hand7">校区</button>
	<button id="hand8">窗口</button>
@include('wechat.partial.buttomNav')
	
@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
<script src="/js/wechat/jquery-3.1.1.min.js"></script>
<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
<script>


			$(function(){
			function dataGet(elem,urlajax){
				
				$('#hand1').on('click',function(){
					$.ajax({
						url:'/api/school',
						dataType:'json',
						async:true,
						type:'GET',
						success:function(data){
							console.log(data);
						}


				});
			});


			}
			
		})

</script>
@stop
