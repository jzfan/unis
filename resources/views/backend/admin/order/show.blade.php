@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">订单号：{{ $order->order_no }}</div>
  <div class="panel-body">
  <p>下单人: {{ $order->orderer->name }}</p>
  <p>送单人: {{ $order->deliverer->name or ''}}</p>
    <p>status: {{ $order->status }}</p>
    <p>address: {{ $order->address }}</p>
    <p>下单时间: {{ $order->created_at->format('Y-m-d H:i') }}</p>
    <p>合计: ￥ {{ $order->total/100 }} 元</p>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">食品：</div>
  <div class="panel-body">
@foreach($order->foods as $food)
<div class="panel panel-default col-md-6">
  <div class="panel-heading">{{ $food->name }}</div>
  <div class="panel-body">
  <p>图片: <img src='{{ $food->img }}'></p>
  <p>简介: {{ $food->description }}</p>
  <p>数量: {{ $food->pivot->quantity }}</p>
  <p>卖价: ￥ {{ $food->pivot->price/100 }} 元</p>
  <p>小计: ￥ {{ $food->pivot->quantity*$food->pivot->price/100 }} 元</p>
  </div>
</div>
@endforeach
</div></div>

<input type="buttom" class="btn btn-primary pull-right" value="返回" onclick="JavaScript:history.back(-1);">

@stop

