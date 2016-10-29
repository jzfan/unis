@extends('backend.layout')

@section('content')

<h2>新增</h2>

<form class="form-horizontal" role="form" action='/admin/suplier' method="POST">
{!! csrf_field() !!}
  <div class="form-group">
    <label for="inputCompany" class="col-sm-2 control-label">公司</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputCompany" name='company' value='{{ old("company") }}'>
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">负责人</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name='manager' value='{{ old("manager") }}'>
    </div>
  </div>
    <div class="form-group">
    <label for="inputTel" class="col-sm-2 control-label">电话</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTel" name='tel' value='{{ old("tel") }}'>
    </div>
  </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">地区</label>
        <div id="distpicker" class="col-sm-10">
        <div style="position: relative;">
          <input id="city-picker" class="form-control" readonly type="text"  name='address' value='{{ old("address") }}' data-toggle="city-picker">
        </div>
      </div>
    </div>


  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" name='email' value='{{ old("email") }}'>
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">状态</label>
    <div class="col-sm-10">
<div class="radio">
  <label>
    <input type="radio" name="status" id="status1" value="0" @if (old('status') == 0) checked @endif>
    禁用
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="status" id="status2" value="1" @if (old('status') == 1) checked @endif>
     启用
  </label>
</div>
    </div>
  </div>

  <div class="form-group">
    <div class="pull-right">
      <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>

@endsection
