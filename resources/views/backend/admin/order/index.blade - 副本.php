@extends('backend.layout')

@section('content')

 
<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>订单号</th>
                  <th>下单人</th>
                  <th>接单人</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->order_no }}</td>
                  <td>{{ $order->orderer->name}}</td>
                  <td>{{ $order->deliver->name or ''}}</td>
                  <td>{{ $order->room_id }}</td>
                  <td>{{ $order->status }}</td>
                  <td>
@include('backend.admin.partial.action', ['role'=>'admin', 'category'=>'order'])

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $orders->links() !!}

@endsection

