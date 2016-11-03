@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $dorm->name }}</div>
  <div class="panel-body">
  <p>school: {{ $dorm->campus->school->name }}</p>
  <p>campus: {{ $dorm->campus->name }}</p>
    <p>name：{{ $dorm->name }}</p>
    <p>address: {{ $dorm->address }}</p>
    <p>status: {{ $dorm->status }}</p>
    <p>longitude: {{ $dorm->x }}</p>
    <p>latitude: {{ $dorm->y }}</p>
    <p>created at: {{ $dorm->created_at }}</p>
  </div>
</div>

	<input type="buttom" class="btn btn-primary pull-right" value="返回" onclick="JavaScript:history.back(-1);">
@endsection

