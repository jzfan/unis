@extends('backend.layout')

@section('content')

 
<h2>表单 <a href="/admin/suplier/create" class='btn btn-primary btn-xs'>新增</a></h2>
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
              @foreach ($supliers as $suplier)
                <tr>
                  <td>{{ $suplier->id }}</td>
                  <td>{{ $suplier->company }}</td>
                  <td>{{ $suplier->manager }}</td>
                  <td>{{ $suplier->email }}</td>
                  <td>{{ $suplier->address}}</td>
                  <td>{{ $suplier->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'suplier'])

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $supliers->links() !!}

@endsection

