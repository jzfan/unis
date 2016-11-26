@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $shop->name }}</div>
  <div class="panel-body">
    <p>学校：{{ $shop->canteen->campus->name }}</p>
    <p>食堂：{{ $shop->canteen->name }}</p>
    <p>供应商：{{ $shop->suplier->company }}</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">食品 <a href="/admin/food/create?shop_id={{ $shop->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($shop->foods->chunk(2) as $chunks)
  <div class="row">
  @foreach($chunks as $food)
    <div class="panel panel-default col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $food->name }}</div>
      <div class="panel-body">
        <p> {{ $food->description }} </p>
        <p><small>单价：</small> {{ $food->price }} </p>
        <a href="/admin/food/{{ $food->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
  </div>
</div>

	<input type="buttom" class="btn btn-primary pull-right" value="返回" onclick="JavaScript:history.back(-1);">
@endsection

