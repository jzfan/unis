@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $food->name }}</div>
  <div class="panel-body">
                  <p>店铺：{{ $food->shop->name }}</p>
                  <p>类别：{{ $food->type }}</p>
                  <p>介绍：{{ $food->description }}</p>
                  <p>价格：{{ $food->price}}</p>
                  <p>打折：{{ $food->discount }}</p>
                  <p>收藏：{{ $food->favorite }}</p>
                  <p>推荐：{{ $food->recommend }}</p>
                  <p>状态：{{ $food->status }}</p>
  </div>
</div>
    <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
@endsection

