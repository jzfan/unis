@extends('backend.layout')

@section('content')

<h2>详情</h2>

<form class="form-horizontal" role="form" action="/admin/shop" method="POST">
{!! csrf_field() !!}
<input type="hidden" class="form-control"   name="suplier_id" value="{{  $suplier_id }}">
  <div class="form-group">
    <label   class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"   name="name" value="{{ old('name') }}" id='inputName'>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">地区</label>
    <div class="col-sm-10">
    <div style="position: relative;" id="distpicker">
      <input id="city-picker" class="form-control" readonly type="text"  name='region' value='{{ old("region") }}' data-toggle="city-picker" data-level="city" data-simple='true'>
    </div>
  </div>
</div>

  <div class="form-group">
    <label class="col-sm-2 control-label">学校</label>
    <div class="col-sm-10">

<select id='school-select' class='form-control'>
</select>

    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">食堂ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{ old('canteen_id') }}">
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

var school  = $("#school-select");
$.get('/api/school', function(m){
  school.select2({
    data: m
  });
});

$("#city-picker").on('cp:updated',function(e){  
   // console.log($(this).val().indexOf('/')); 
   var index = $(this).val().indexOf('/');
   if (index < 0){
    return;
   }

   var region = $(this).val();
   $.get('/api/school?region='+ region, function (m) {
    $('#school-select').text('');

    for(var i=0;i<m.schools.length;i++){
      var school = m.schools[i];
      $('#school-select').append('<option value='+school.id+'>'+school.name+'</option>');
    }

   })
});  
</script>
@stop
