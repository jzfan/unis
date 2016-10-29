@extends('backend.layout')

@section('content')

<h2>表单 <a href="/admin/school/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>校名</th>
                  <th>省</th>
                  <th>市</th>
                  <th>区</th>
                  <th>街道</th>
                  <th>地址</th>
                  <th>经度</th>
                  <th>维度</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($schools as $school)
                <tr>
                  <td>{{ $school->id }}</td>
                  <td>{{ $school->name }}</td>
                  <td>{{ $school->province }}</td>
                  <td>{{ $school->city }}</td>
                  <td>{{ $school->block}}</td>
                  <td>{{ $school->address }}</td>
                  <td>{{ $school->x }}</td>
                  <td>{{ $school->y }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'school'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $schools->links() !!}

@endsection

