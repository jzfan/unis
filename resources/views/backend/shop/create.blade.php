@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/shop" method="POST">
{!! csrf_field() !!}
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCanteen" class="col-sm-2 control-label">食堂</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputCanteen" name="name" value="{{ old('canteen') }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="address" value="{{ old('address') }}">
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

