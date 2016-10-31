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
    下属商铺 <a href="/admin/shop/create?suplier_id={{ $suplier->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($suplier->shops as $shop)
    <div class="panel panel-default col-md-4 col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $shop->name }}</div>
      <div class="panel-body">
        <p><small>地址：</small> {{ $shop->canteen->school->name }} {{ $shop->canteen->name }}</p>
        <a href="/admin/shop/{{ $shop->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
  @endforeach
  </div>
</div>

<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>

@endsection

