@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading"><img src='{{ $member->avatar }}'/>{{ $member->name }}</div>
  <div class="panel-body">
   <p>role:{{ $member->role }}</p>
   <p>email:{{ $member->email }}</p>
   <p>status:{{ $member->status }}</p>
   <h3>favorite</h3>
   @foreach($member->favorites as $favorite)
   <p>{{ $favorite->name }}</p>
   @endforeach
   <!-- <p>{{ $member->favorite }}</p> -->
  </div>
</div>
    <button type="buttom" class="btn btn-default" onclick="JavaScript:history.back(-1);">返回</button>
@endsection

