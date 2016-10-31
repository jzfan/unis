@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading"><img src='{{ $agent->avatar }}' class='avatar-middle'/>{{ $agent->name }}</div>
  <div class="panel-body">
   <p>role:{{ $agent->role }}</p>
   <p>email:{{ $agent->email }}</p>
   <p>status:{{ $agent->status }}</p>

   <!-- <p>{{ $agent->favorite }}</p> -->
  </div>
</div>
<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>
@endsection

