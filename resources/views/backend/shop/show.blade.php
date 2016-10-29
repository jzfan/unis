@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $shop->name }}</div>
  <div class="panel-body">
    <p>学校：{{ $shop->school->name }}</p>
    <p>食堂：{{ $shop->canteen->name }}</p>
    <p>供应商：{{ $shop->suplier->company }}</p>
  </div>
</div>
    <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
@endsection

