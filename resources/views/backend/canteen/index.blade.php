@extends('backend.layout')

@section('content')

<h2>表单 <a href="/admin/canteen/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>学校</th>
                  <th>食堂</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>经度</th>
                  <th>维度</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($canteens as $canteen)
                <tr>
                  <td>{{ $canteen->id }}</td>
                  <td>{{ $canteen->school->name }}</td>
                  <td>{{ $canteen->name }}</td>
                  <td>{{ $canteen->address }}</td>
                  <td>{{ $canteen->status }}</td>
                  <td>{{ $canteen->x }}</td>
                  <td>{{ $canteen->y }}</td>

                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'canteen'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $canteens->links() !!}

@endsection