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
    <p>pepole: {{ $dorm->users_count }}</p>
  </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">下属房间 <a href="/admin/room/create?dorm_id={{ $dorm->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($dorm->rooms->chunk(2) as $chunks)
  <div class="row">
  @foreach($chunks as $room)
    <div class="panel panel-default col-sm-6 col-xs-12">
      <div class="panel-heading">房间号：{{ $room->number }}</div>
      <div class="panel-body">
        <p>{{ $room->users_count }}</p>
        <a href="/admin/room/{{ $room->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
  </div>
</div>

	<input type="buttom" class="btn btn-primary pull-right" value="返回" onclick="JavaScript:history.back(-1);">
@endsection

