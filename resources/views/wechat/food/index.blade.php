@extends('wechat.layout')

@section('content')
<div class="row">
<br>
@foreach($foods as $food)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ $food->img }}">
      <div class="caption">
        <h3>{{ $food->name }}</h3>
        <p>{{ $food->description }}</p>

        <form method='post' action='/wechat/cart' style="display: inline-block;">
            {!! csrf_field() !!}
            <input type='hidden' name='food_id' value='{{ $food->id }}'/>
            <button type='submit' class="btn btn-primary" role="button">加入购物车</button>
        </form>
             <a href="#" class="btn btn-default" role="button">直接购买</a>
      </div>
    </div>
  </div>
@endforeach
</div>
{!! $foods->links() !!}
@endsection
