@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/shop/{{ $shop->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $shop->name }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="school_id" value="{{ $shop->name }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">食堂</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $shop->name }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">供应商</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $shop->name }}">
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

