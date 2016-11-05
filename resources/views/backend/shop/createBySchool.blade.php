@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/shop" method="POST">
{!! csrf_field() !!}
  <div class="form-group">
    <label   class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"   name="name" value="{{ old('name') }}" id='inputName'>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="{{ $canteen->campus->school->name }}" disabled>
      <input type="hidden" name='school_id'  value="{{ $canteen->campus->school->id }}">
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">校区</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{$canteen->campus->name }}" disabled>
      <input type="hidden" name='campus_id'  value="{{ $canteen->campus->id }}">
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">食堂</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{ $canteen->name }}" disabled>
      <input type="hidden" name='canteen_id'  value="{{ $canteen->id }}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">供应商</label>
    <div class="col-sm-10">
      <select id='suplier-select' class='form-control' name='suplier_id' data-placeholder='请选择'>
        <option></option>
      </select>
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
<script>
var suplier = $("#suplier-select");

$.get('/api/suplier', function(m){
  suplier.select2({
    data: m
  });
  suplier.select2();
});

</script>
@stop