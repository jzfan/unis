@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/dorm/{{ $dorm->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
  <div class="form-group">
    <label  class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{ $dorm->name }}">
    </div>
  </div>
   <div class="form-group">
    <label  class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $dorm->campus->school->name }}" disabled>
      <input type="hidden" value="{{ $dorm->campus->school->id }}" id='school_id'>
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">校区</label>
    <div class="col-sm-10">
      <select id='campus-select' class='form-control' name='campus_id'>
        <option value="{{ $dorm->campus->id }}" selected="selected">{{ $dorm->campus->name }}</option>
      </select>
    </div>
  </div> 

  <div class="form-group">
    <label  class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="address" value="{{ $dorm->address }}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">经度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="x" value="{{ $dorm->x }}">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">纬度</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="y" value="{{ $dorm->y }}">
    </div>
  </div>

@include('backend.admin.partial.statusForm', ['obj'=>'dorm'])



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
var campus  = $("#campus-select");
var school_id = $('#school_id').val()

$.get('/api/campusOfSchool/'+school_id, function(m){
    campus.select2({
      data: m
    });
});

</script>
@stop