@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/school" method="POST">
{!! csrf_field() !!}
  <div class="form-group">
    <label class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
  </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">地区</label>
        <div id="distpicker" class="col-sm-10">
        <div style="position: relative;">
          <input id="city-picker" class="form-control" readonly type="text"  name='region' value='{{ old("region") }}' data-toggle="city-picker">
        </div>
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" value="{{ old('address') }}">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">经度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="x" value="{{ old('x') }}">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">纬度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="y" value="{{ old('y') }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-4">
      <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
@endsection

