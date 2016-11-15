<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@yield('title', 'Uniserver')
	</title>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/css/wechat/mui.min.css" rel="stylesheet" />
		<link href="/css/wechat/iconfont.css" rel="stylesheet" />
		<link href="/css/wechat/mui.picker.min.css" rel="stylesheet" />
		<link href="/css/wechat/wechat.css" rel="stylesheet" />
		<link href="/css/wechat/new.css" rel="stylesheet" />
</head>
<body>
@include('wechat.partial.alert')
@yield('content')
	<!--页面JS加载-->
		<script src="/js/wechat/jquery-3.1.1.min.js"></script>
		<script src="/js/wechat/mui.min.js"></script>
		<script src="/js/wechat/layer.js"></script>
		<script src="/js/wechat/mui.pullToRefresh.js"></script>
		<script src="/js/wechat/mui.pullToRefresh.material.js"></script>
		<script src="/js/wechat/mui.picker.min.js"></script>
		<script src="/js/wechat/wechat.js"></script>
		<script src="/lib/pusher/pusher.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@yield('js')
</body>
</html>