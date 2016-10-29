@extends('wechat.layout')

@section('content')
<br>
 <form class="form-inline" role="form" action='/wechat/checkout' method="POST">
{!! csrf_field() !!}
@foreach($foods as $food)
<div class="row">
   <div class="form-group col-sm-1">
    <div class="checkbox">
          <input type="checkbox" checked="1">
      </div>
  </div> 
    <div class="form-group col-sm-3">
      <img src="{{ $food->img }}" class='avatar-middle'>
    </div>
    <div class="form-group col-sm-8">
      <h4>{{ $food->name }} <span> 单价：￥<mark>{{ $food->price }}</mark></span></h4>
      <p>{{ $food->description }}</p>
        <button class='btn btn-danger'>删除</button>
        <label for="numInput" class="control-label">数量:</label> 
        <input type="text" name="{{ $food->id }}" class="form-control numInput">
        小计：<span class='xiaoji'>{{ $food->price }}</span>
    </div>
</div>
<hr>
<br>
@endforeach

      <div class="pull-right">
        <span>合计：￥ <mark id='total'></mark> </span>
        <button type="submit" class="btn btn-primary">结算</button>
      </div>

</form>
@endsection

@section('js')
<script>
setTotal();
$(".numInput").TouchSpin({
    min: 1,
    max: 999,
    stepinterval: 50,
    maxboostedstep: 999,
     initval: 1
}).on('touchspin.on.startspin', function () {
    var n = $(this).val();
    n = parseInt(n);
    var p = $(this).closest('.form-group').find('mark').text();
    p = parseFloat(p)*100;
    $(this).closest('.form-group').find('.xiaoji').text(p*n/100);

    setTotal();
  });
function setTotal()
{
    var sum = 0;
    $('.xiaoji').each(function(k,v){
      sum += parseFloat($(v).text()) * 100;
    });
    $('#total').text(sum/100);
}
</script>
@stop
