@extends('backend.layout')

@section('content')

 
<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>学校</th>
                  <th>校区</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($campuses as $campus)
                <tr>
                  <td>{{ $campus->id }}</td>
                  <td><a href='/admin/school/{{ $campus->school->id }}'>{{ $campus->school->name }}</a></td>
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
          {!! $campuses->links() !!}

@endsection

