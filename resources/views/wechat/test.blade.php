@extends('wechat.layout')

@section('title')
购物车
@stop

@section('content')
  <button id="btn" style="width: 80%;height: 80px;background-color: red;margin-left: 10%;color: #fff;font-size: 24px;margin-top: 30%;">清除数据</button>

  <button id="btn1" style="width: 80%;height: 80px;background-color: green;margin-left: 10%;color: #fff;font-size: 24px;margin-top: 30%;">清除cartFoodId数据</button>

  <button id="btn2" style="width: 80%;height: 80px;background-color: blue;margin-left: 10%;color: #fff;font-size: 24px;margin-top: 30%;">清除buyCart数据</button>

@stop

@section('js')
  <script>
    $(function(){
      console.log('清除之前buyCart值:'+localStorage.getItem('buyCart'));
      console.log('清除之前cartFoodId值:'+localStorage.getItem('cartFoodId'));
        $('#btn').on('click',function(){
            localStorage.removeItem('buyCart');
            localStorage.removeItem('cartFoodId');
            console.log('清除之后buyCart值:'+localStorage.getItem('buyCart'));
            console.log('清除之后cartFoodId值:'+localStorage.getItem('cartFoodId'));
        })
    })


    $(function(){
      console.log('清除之前cartFoodId值:'+localStorage.getItem('cartFoodId'));
        $('#btn1').on('click',function(){
            localStorage.removeItem('cartFoodId');
            console.log('清除之后cartFoodId值:'+localStorage.getItem('cartFoodId'));
        })
    })

    $(function(){
      console.log('清除之前buyCart值:'+localStorage.getItem('buyCart'));
        $('#btn3').on('click',function(){
            localStorage.removeItem('buyCart');
            console.log('清除之后buyCart值:'+localStorage.getItem('buyCart'));
        })
    })
  </script>
@stop

