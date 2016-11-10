@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/shop/{{ $shop->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
  <div class="form-group">
    <label  class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{ $shop->name }}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">供应商</label>
    <div class="col-sm-10">
      <select id='suplier-select' class='form-control' name='suplier_id'>
        <option value="{{ $shop->suplier->id }}" selected="selected">{{ $shop->suplier->company }}</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">
      <select id='school-select' class='form-control' name='school_id'>
        <option value="{{ $shop->canteen->campus->school->id }}" selected="selected">{{ $shop->canteen->campus->school->name }}</option>
      </select>
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">校区</label>
    <div class="col-sm-10">
      <select id='campus-select' class='form-control' name='campus_id'>
        <option value="{{ $shop->canteen->campus->id }}" selected="selected">{{ $shop->canteen->campus->name }}</option>
      </select>
    </div>
  </div> 

    <div class="form-group">
    <label  class="col-sm-2 control-label">食堂</label>
    <div class="col-sm-10">
      <select id='canteen-select' class='form-control' name='canteen_id'>
        <option value="{{ $shop->canteen->id }}" selected="selected">{{ $shop->canteen->name }}</option>
      </select>
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

@section('js')
<script>
var suplier = $("#suplier-select");
var school  = $("#school-select");
var campus  = $("#campus-select");
var canteen = $("#canteen-select");
$.get('/api/suplier_select2', function(m){
  suplier.select2({
    data: m
  });
  suplier.select2();
});

$.get('/api/school', function(m){
  school.select2({
    data: m
  });
});
school.on("select2:select", function (e) {
  $.get('/api/campus_of_school/'+school.val(), function(m){
    canteen.text('').select2();
    campus.text('').select2({
      data: m
    });
  });
});
campus.on("select2:select", function (e) {
  $.get('/api/canteen_of_campus/'+campus.val(), function(m){
    canteen.text('').select2({
      data: m
    });
  });
});
</script>
@stop
