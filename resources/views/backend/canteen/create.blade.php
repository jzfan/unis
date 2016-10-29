@extends('backend.layout')

@section('content')

<h2>详情</h2>
<form class="form-horizontal" role="form" action="/admin/canteen" method="POST">
{!! csrf_field() !!}
  <div class="form-group">
    <label class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label">学校</label>
  <div class="col-sm-10">

<select class="form-control" id='dropdown' name='school_id'>
@foreach($schools as $school)
<option value='{{ $school->id }}'>{{ $school->name }}</option>
@endforeach
</select>

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

@section('js')
<script type="text/javascript">
  $( "#dropdown" ).select2({
    theme: "bootstrap",
    placeholder: "Select a state"
});
</script>
@stop

