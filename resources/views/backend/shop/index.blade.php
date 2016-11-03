@extends('backend.layout')

@section('content')

<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>店名</th>
                  <th>学校</th>
                  <th>校区</th>
                  <th>食堂</th>
                  <th>供应商</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($shops as $shop)
                <tr>
                  <td>{{ $shop->id }}</td>
                  <td>{{ $shop->name }}</td>
                  <td>{{ $shop->canteen->campus->school->name }}</td>
                  <td>{{ $shop->canteen->campus->name }}</td>
                  <td>{{ $shop->canteen->name }}</td>
                  <td>{{ $shop->suplier->company or ''}}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'shop'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $shops->links() !!}

@endsection

