@extends('backend.layout')

@section('content')
 
<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $suplier->company }}</h3>
  </div>
  <div class="panel-body">
    <p><small>负责人：</small> {{ $suplier->manager }}</p>
    <p><small>EMAIL:</small> {{ $suplier->email }}</p>
    <p><small>地址：</small> {{ $suplier->address }}</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">下属商铺</h3>
  </div>
  <div class="panel-body">

  @foreach ($suplier->shops as $shop)
    <div class="panel panel-default col-md-4 col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $shop->name }}</div>
      <div class="panel-body">
        <p><small>地址：</small> {{ $shop->school->name }} {{ $shop->canteen->name }}</p>
      </div>
    </div>
  @endforeach
  </div>
</div>

<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>

@endsection

