@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $canteen->campus->school->name }} {{ $canteen->campus->name }}  {{ $canteen->name }}</div>
  <div class="panel-body">
   <p>地址:{{ $canteen->address }}</p>
   <p>status:{{ $canteen->status }}</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">下属商铺 <a href="/admin/shop/create?canteen_id={{ $canteen->id }}" class='btn btn-primary btn-sm'>新增</a></div>
  <div class="panel-body">
   @foreach($canteen->shops->chunk(2) as $chunks)
   <div class="row">
     @foreach($chunks as $shop)
   <div class="panel panel-default col-xs-6">
   <div class="panel-body">
   <p>{{ $shop->name }}</p>
   <a href="/admin/shop/{{ $shop->id }}" class='btn btn-primary pull-right'>查看 >></a>
   </div>
   </div>
   @endforeach
   </div>
   @endforeach
  </div>
</div>

<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>
@endsection

