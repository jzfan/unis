@extends('backend.layout')

@section('content')

 
<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>校区</th>
                  <th>学校</th>
                  <th>宿舍</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($dorms as $dorm)
                <tr>
                  <td>{{ $dorm->id }}</td>
                  <td>{{ $dorm->campus->name }}</td>
                  <td>{{ $dorm->campus->school->name }}</td>
                  <td>{{ $dorm->name }}</td>
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

