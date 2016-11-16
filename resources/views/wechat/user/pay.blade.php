@extends('wechat.layout')

@section('title')
支付成功
@stop

@section('content')
	<div class="pay"><a href="/wechat/order/status#item1mobile"><img src="/img/wechat/pay.jpg" alt="" style="width: 100%;height: 100%;"></a></div>
@stop

@section('js')
<script src="/lib/pusher/main.js"></script>
@stop