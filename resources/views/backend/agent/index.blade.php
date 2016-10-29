@extends('backend.layout')

@section('content')
  
<h2>表单<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm">新增</button></h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>用户名</th>
                  <th>角色</th>
                  <th>邮箱</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($agents as $agent)
                <tr>
                  <td>{{ $agent->id }}</td>
                  <td>{{ $agent->name }}</td>
                  <td>{{ $agent->role }}</td>
                  <td>{{ $agent->email }}</td>
                  <td>{{ $agent->address->addr1 or ''}}</td>
                  <td>{{ $agent->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'agent'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">新建一个代理</h4>
      </div>
      <form class="form-horizontal" role="form" action='/admin/agent' method="POST">
        {!! csrf_field() !!}
      <div class="modal-body">

<div class="form-group">
    <label for="inputID" class="col-sm-4 control-label">用户标识</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputID" name='id_or_name' placeholder="请输入ID 或者 用户名">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">提交</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

