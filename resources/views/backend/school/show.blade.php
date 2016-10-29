@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $school->name }}</div>
  <div class="panel-body">
    <p>地址：{{ $school->province }} {{ $school->city }}  {{ $school->block }} {{ $school->address }}</p>
  </div>
</div>
    <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
@endsection

