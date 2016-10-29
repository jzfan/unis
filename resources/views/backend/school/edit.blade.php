@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/school/{{ $school->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
  <div class="form-group">
    <label class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{ $school->name }}">
    </div>
  </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">地区</label>
        <div id="distpicker" class="col-sm-10">
        <div style="position: relative;">
          <input id="city-picker" class="form-control" readonly type="text"  name='region' value='{{ $region }}' data-toggle="city-picker">
        </div>
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" value="{{ $school->address }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">经度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="x" value="{{ $school->x }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">纬度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="y" value="{{ $school->y }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
@endsection

