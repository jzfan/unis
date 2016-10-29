@extends('backend.layout')

@section('content')

 
<h2>表单 <a href="/admin/dorm/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>商户名</th>
                  <th>负责人</th>
                  <th>邮箱</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($dorms as $dorm)
                <tr>
                  <td>{{ $dorm->id }}</td>
                  <td>{{ $dorm->school->name }}</td>
                  <td>{{ $dorm->name }}</td>
                  <td>{{ $dorm->manager }}</td>
                  <td>{{ $dorm->email }}</td>
                  <td>{{ $dorm->address}}</td>
                  <td>{{ $dorm->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'dorm'])

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $dorms->links() !!}

@endsection

