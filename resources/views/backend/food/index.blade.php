@extends('backend.layout')

@section('content')

<h2>表单 <a href="/admin/food/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>食品</th>
                  <th>店面</th>
                  <th>类别</th>
                  <th>介绍</th>
                  <th>价格</th>
                  <th>打折</th>
                  <th>收藏</th>
                  <th>推荐</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($foods as $food)
                <tr>
                  <td>{{ $food->id }}</td>
                  <td>{{ $food->name }}</td>
                  <td><a href='/admin/shop/{{ $food->shop->id }}'>{{ $food->shop->name }}</a></td>
                  <td>{{ $food->type }}</td>
                  <td>{{ str_limit($food->description, 22) }}</td>
                  <td>{{ $food->price}}</td>
                  <td>{{ $food->discount }}</td>
                  <td>{{ $food->favorite }}</td>
                  <td>{{ $food->recommend }}</td>
                  <td>{{ $food->status }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'food'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $foods->links() !!}

@endsection

