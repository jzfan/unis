@extends('backend.layout')

@section('content')

 
<h2>表单</h2>
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
              @foreach ($campuses as $campus)
                <tr>
                  <td>{{ $campus->id }}</td>
                  <td>{{ $campus->school->name }}</td>
                  <td>{{ $campus->name }}</td>
                  <td>{{ $campus->address}}</td>
                  <td>{{ $campus->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'campus'])

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $campuss->links() !!}

@endsection

