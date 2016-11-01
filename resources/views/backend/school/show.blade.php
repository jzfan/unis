@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-primary">
  <div class="panel-heading">{{ $school->name }}</div>
  <div class="panel-body">
    <p>地址：{{ $school->province }} {{ $school->city }}  {{ $school->block }} {{ $school->address }}</p>
  </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">校区 <a href="/admin/campus/create?school_id={{ $school->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($school->campuses->chunk(2) as $chunks)
  <div class="row">
  @foreach($chunks as $campus)
    <div class="panel panel-default col-sm-6 col-xs-12">
      <div class="panel-heading">{{ $campus->name }}</div>
      <div class="panel-body">
        <p> {{ $campus->address }} </p>
        <a href="/admin/campus/{{ $campus->id }}" class='btn btn-primary pull-right'>查看 >></a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">食堂 <a href="/admin/canteen/create?school_id={{ $school->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($school->canteens->chunk(2) as $chunks)
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
  <div class="panel-heading">宿舍 <a href="/admin/dorm/create?school_id={{ $school->id }}" class='btn btn-primary btn-sm'>新增</a>
  </div>
  <div class="panel-body">

  @foreach ($school->dorms->chunk(2) as $chunks)
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

