@extends('backend.layout')

@section('content')
<h2>编辑</h2>

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">头像</label>
    <div class="col-sm-10">
      <img class='avatar-middle pull-left' src="{{ $member->avatar }}">
      <input type="file" id="exampleInputFile">
      <p class="help-block">更新头像。</p>
    </div>
    
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" value='{{ $member->name }}'>
    </div>
  </div>
    <div class="form-group">
    <label for="inputAddress" class="col-sm-2 control-label">房间ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputAddress" value='{{ $member->room_id}}'>

    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" value='{{ $member->email }}'>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="输入新密码？">
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

