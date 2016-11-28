@extends('backend.layout')

@section('content')

<h2>详情</h2>
<link rel="stylesheet" type="text/css" href="/lib/dropzone/dropzone.css">
<form action="/admin/food/upload_img" class="dropzone">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>


<form class="form-horizontal" role="form" action="/admin/food/{{ $food->id }}" method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
 <input type="hidden" class="form-control"  name="img" value="" id='inputImg'>
  <div class="form-group">
   <label for="inputName" class="col-sm-2 control-label">图片</label>
  <div class="col-sm-10">
 <img src='{{ $food->img }}'/>
 </div>
 </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $food->name }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputType" class="col-sm-2 control-label">类别</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputType" name="type" value="{{ $food->type }}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">食堂</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputDescription" name="description" value="{{ $food->description }}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPrice" class="col-sm-2 control-label">单价</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPrice" name="price" value="{{ $food->price }}">
    </div>
  </div>


    <div class="form-group">
    <label for="inputDiscount" class="col-sm-2 control-label">打折</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputDiscount" name="discount" value="{{ $food->discount }}">
    </div>
  </div> 
    <div class="form-group">
    <label for="inputFavorite" class="col-sm-2 control-label">收藏</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputFavorite" name="favorite" value="{{ $food->favorite }}">
    </div>
  </div>
      <div class="form-group">
    <label for="inputRecommend" class="col-sm-2 control-label">推荐</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputRecommend" name="recommend" value="{{ $food->recommend }}">
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
