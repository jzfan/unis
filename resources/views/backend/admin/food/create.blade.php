@extends('backend.layout')

@section('content')
<link rel="stylesheet" type="text/css" href="/lib/dropzone/dropzone.css">
<h2>详情</h2>
<form action="/admin/food/upload_img" class="dropzone">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>
<form class="form-horizontal" role="form" action="/admin/food" method="POST">
{!! csrf_field() !!}
 <input type="hidden" class="form-control"  name="img" value="" id='inputImg'>
  <div class="form-group">
    <label  class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" value="{{ old('name') }}">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">店铺ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="{{ $shop->name }}" disabled>
      <input type="hidden"   name="shop_id" value="{{ $shop->id }}">
    </div>
  </div>
    <div class="form-group">
    <label  class="col-sm-2 control-label">类别</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="type" value="{{ old('type') }}">
    </div>
  </div>


  <div class="form-group">
    <label  class="col-sm-2 control-label">描叙</label>
    <div class="col-sm-10">
      <textarea class="form-control"  name="description" rows="3">       
          {{ old('description') }}
      </textarea>
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">单价</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="price" value="{{ old('price') }}">
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">折扣</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="discount" value="{{ old('discount')?:0 }}">
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">收藏</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="favorite" value="{{ old('favorite')?:0 }}">
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">推荐</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="recommend" value="{{ old('recommend')?:0 }}">
    </div>
  </div>

    <div class="form-group">
    <label  class="col-sm-2 control-label">状态</label>
    <div class="col-sm-10 radio">


  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="0" checked>
    禁用
  </label>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="1">
    启用
  </label>
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
<script src="/lib/dropzone/dropzone.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$('.dropzone').dropzone({
        maxFiles: 1,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        success: function(file, response){
          $('#inputImg').val(response);
        }
});

    </script>
@stop

