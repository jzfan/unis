@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $campus->name }}</div>
  <div class="panel-body">
   <p>school:{{ $campus->school->name }}</p>
   <p>status:{{ $campus->status }}</p>

  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">食堂 <a href="/admin/canteen/create?campus_id={{ $campus->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($campus->canteens->chunk(2) as $chunks)
  <div class="row">
  @foreach($chunks as $canteen)
    <div class="panel panel-default col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $canteen->name }}</div>
      <div class="panel-body">
        <p> {{ $canteen->address }} </p>
        <a href="/admin/canteen/{{ $canteen->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">宿舍 <a href="/admin/dorm/create?campus_id={{ $campus->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($campus->dorms->chunk(2) as $chunks)
  <div class="row">
  @foreach($chunks as $dorm)
    <div class="panel panel-default col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $dorm->name }}</div>
      <div class="panel-body">
        <p> {{ $dorm->address }} </p>
        <a href="/admin/dorm/{{ $dorm->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
  </div>
</div>

<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>
@endsection

