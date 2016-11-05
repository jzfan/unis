<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@yield('title', 'Uniserver')
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/css/wechat/mui.min.css" rel="stylesheet" />
		<link href="/css/wechat/wechat.css" rel="stylesheet" />
</head>
<body>

@yield('content')
	<!--页面JS加载-->
		<script src="/js/wechat/mui.min.js"></script>
		<script src="/js/wechat/jquery-3.1.1.min.js"></script>
		<script src="/js/wechat/wechat.js"></script>
@yield('js')
</body>
</html>