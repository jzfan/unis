<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/js/wechat/jquery-3.1.1.min.js"></script>
</head>
<body>
	<button id="hand1">获取学校</button>
	<button id="hand2">订单</button>
	<button id="hand3">获取宿舍</button>
	<button id="hand4">查找学校</button>
	<button id="hand5">点餐</button>
	<button id="hand6">订餐</button>
	<button id="hand7">校区</button>
	<button id="hand8">窗口</button>
	<button id="hand9">已下订单</button>


	<script>
		$(function(){
				function dataGet(urlData,elem){

					urlajax = urlData;

					$('#hand1').on('click',function(){
						$.ajax({
							url:urlajax,
							dataType:'json',
							async:false,
							type:'GET',
							success:function(data){
								console.log(data);
							}


					});
				});

				}
				dataGet('/api/school','hand1');
				dataGet('/wechat/order/ordered','hand2');
				dataGet('/api/school','hand3');
				dataGet('/api/school','hand4');
				dataGet('/api/school','hand5');
				dataGet('/api/school','hand6');
				dataGet('/api/school','hand7');
				dataGet('/api/school','hand8');
				dataGet('/wechat/order/ordered','hand9');
			
		})
	</script>
</body>
</html>