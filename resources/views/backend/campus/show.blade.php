@extends('backend.layout')

@section('content')

<h2>详情</h2>
<div class="panel panel-default">
  <div class="panel-heading">{{ $campus->name }}</div>
  <div class="panel-body">
   <p>school:{{ $campus->school->name }}</p>
   <p>status:{{ $campus->status }}</p>

  </div>
</div>
<input type="buttom" class='btn btn-primary pull-right'  value="返回" onclick="JavaScript:history.back(-1);"/>
@endsection

