@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $order->order_no }}</div>
  <div class="panel-body">
  <p>order: {{ $order->orderer->name }}</p>
  <p>deliver: {{ $order->deliverer->name or ''}}</p>
    <p>status: {{ $order->status }}</p>
    <p>address: {{ $order->room_id }}</p>
    <p>created at: {{ $order->created_at }}</p>
  </div>
</div>
<input type="buttom" class="btn btn-primary pull-right" value="返回" onclick="JavaScript:history.back(-1);">

@stop

