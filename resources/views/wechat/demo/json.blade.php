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
							type:'POST',
							success:function(data){
								console.log(data);
							}


					});
				});

				}
				dataGet('/api/user','hand1');
				
			
		})
	</script>
</body>
</html>