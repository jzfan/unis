@extends('backend.layout')

@section('content')
  
<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>用户名</th>
                  <th>角色</th>
                  <th>邮箱</th>
                  <th>宿舍</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($members as $member)
                <tr>
                  <td>{{ $member->id }}</td>
                  <td><img class='avatar-small' src='{{ $member->avatar }}'> {{ $member->name }}</td>
                  <td>{{ $member->role }}</td>
                  <td>{{ $member->email }}</td>
                  <td>{{ $member->room->dorm->campus->school->name}} {{ $member->room->dorm->campus->name}} {{ $member->room->dorm->name}} {{ $member->room->number}}</td>
                  <td>{{ $member->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'member'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $members->links() !!}
@endsection

