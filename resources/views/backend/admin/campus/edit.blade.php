@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/campus/{{ $campus->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
<input type="hidden" name="id" value='{{ $campus->id }}'>
  <div class="form-group">
    <label class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">
      <select id='school-select' class='form-control' name='school_id'>
        <option value="{{ $campus->school->id }}" selected="selected">{{ $campus->school->name }}</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $campus->name }}">
    </div>
  </div>
@include('backend.admin.partial.statusForm', ['obj' => 'campus'])
  
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
var school  = $("#school-select");
$.get('/api/school', function(m){
  school.select2({
    data: m
  });
});
</script>
@stop
