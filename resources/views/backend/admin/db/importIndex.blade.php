@extends('backend.layout')

@section('content')
  
<h2 class="page-header">Excel导入</h2>
<div class="col-xs-6 col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">食品</div>
      <div class="panel-body">
        <a href="/storage/foods.xls" class='btn btn-primary'>样式导出</a>
  <br>
  <br>
        <link rel="stylesheet" type="text/css" href="/lib/dropzone/dropzone.css">
        <form action="/admin/db/excel/upload" class="dropzone">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
      </div>
    </div>
</div>
<div class="col-xs-6 col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">xxx</div>
      <div class="panel-body">

      </div>
    </div>
</div>
<div class="col-xs-6 col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">xxx</div>
      <div class="panel-body">


      </div>
    </div>
</div>
<div class="col-xs-6 col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">xxx</div>
      <div class="panel-body">

      </div>
    </div>
</div>

@endsection

@section('js')
<script src="/lib/dropzone/dropzone.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$('.dropzone').dropzone({
        maxFiles: 1,
        acceptedFiles: ".xls",
        success: function(file, response){
          console.log(response);
        }
});

</script>
@stop

