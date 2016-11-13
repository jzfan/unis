@extends('backend.layout')

@section('content')


<h2>编辑</h2>

<div class="container" id="crop-avatar">

        <!-- Current avatar -->
        <div class="avatar-view" title="" data-original-title="Change the avatar">
            <img src="{{ $member->avatar }}" alt="Avatar">
        </div>

        <!-- Cropping modal -->
        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" action="/upload/avatar" enctype="multipart/form-data" method="post">
        {!! csrf_field() !!}
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" type="button">×</button>
                            <h4 class="modal-title" id="avatar-modal-label">更换头像</h4>
                        </div>
                        <div class="modal-body">
                            <div class="avatar-body">

                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input class="avatar-src" name="avatar_src" type="hidden">
                                    <input class="avatar-data" name="avatar_data" type="hidden">
                                    <label for="avatarInput">头像上传</label>
                                    <input class="avatar-input" id="avatarInput" name="avatar" type="file">
                                </div>

                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                    </div>
                                </div>

                                <div class="row avatar-btns">
                                    <div class="col-md-9">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">左转</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">右转</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                            <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block avatar-save" type="submit">完成</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- <div class="modal-footer">
                              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                          </div> -->
                      </form>
                  </div>
              </div>
          </div><!-- /.modal -->

          <!-- Loading state -->
          <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
      </div>


<form class="form-horizontal" role="form" action='/admin/member/{{ $member->id }}' method="POST">
{!! csrf_field() !!}
{!! method_field('PUT') !!}
<input type="hidden" name="avatar" value='{{ $member->avatar }}' id='avatar_val'>
  <div class="form-group">
    <label class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='name' value='{{ $member->name }}'>
    </div>
  </div>
    <div class="form-group">
    <label  class="col-sm-2 control-label">宿舍</label>
    <div class="col-sm-10">
      <select id='dorm-select' class='form-control' name='dorm_id'>
        <option value="{{ $member->dorm->id }}" selected="selected">{{ $member->dorm->name }}</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-2 control-label">房间号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name='room_number' value='{{ $member->room_number }}'>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name='email' value='{{ $member->email }}'>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name='password' placeholder="输入新密码？">
      <p class="help-block">不改密码请留空。</p>
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">状态</label>
    <div class="col-sm-10">
<div class="radio">
  <label>
    <input type="radio" name="status" id="status1" value="0" checked>
    禁用
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="status" id="status2" value="1">
     启用
  </label>
</div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>
@endsection

@section('js')
<script>
var dorm  = $("#dorm-select");
var campus = $('#school_id').val();
$.get('/api/campus/query_by_dorm/{{ $member->dorm->id }}', function(data){
  console.log(data.id);
  $.get('/api/dorm_of_campus/'+data.id, function(m){
      dorm.select2({
        data: m
      });
  });
})


</script>
@stop

