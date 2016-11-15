@extends('wechat.layout')

@section('title')
购物车
@stop

@section('content')
  <ul class="w-tab-view mui-table-view" style="margin-top: 0;">
              
                

  </ul>
            
      
@include('wechat.partial.buttomNav')
  
@stop

@section('js')
<script src="/lib/pusher/main.js"></script>

  <script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
  <script>
      /*选择时间*/
        $(function(){
            var dtPicker = new mui.DtPicker(); 

            $(document).on('touchstart','.app-time li',function(){
            var _this = $(this);
            dtPicker.show(function (selectItems) { 
              _this.html('预约时间：'+selectItems.text+'<span class="mui-icon iconfont youjiantou003 mui-pull-right">');
            })
          })
        })
         
        
  </script> 

  <script>
      $(function(){
         $.ajax({
                url:'/wechat/ajax/cart',
                dataType:'json',
                async:false,
                type:'GET',
                success:function(data){
                  var foodlist = data.data;
                  console.log(foodlist);
                   var total = 0;
                  for(var i=0;i<foodlist.length;i++){
                    total  += parseFloat(foodlist[i].price);
                    li =document.createElement('li');
                    li.className = 'mui-table-view-cell mui-media';
                    li.innerHTML = '<img class="mui-media-object mui-pull-left" src='+foodlist[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">'+foodlist[i].name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodlist[i].sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodlist[i].price+'</span>&nbsp;&nbsp;<span class="origin-value">原价:'+foodlist[i].original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon-g"><div class="mui-numbox"><button class="mui-btn mui-numbox-btn-minus" type="button"><span class="mui-icon iconfont jianhao107"></span></button><input class="mui-numbox-input" type="number" value= "1"/><button class="mui-btn mui-numbox-btn-plus" type="button"><span class="mui-icon iconfont jiahao108"></span></button></div></div></div></div>';
                    table = document.body.querySelector('.w-tab-view');
                    table.appendChild(li);                    
                  }
                    div = document.createElement('div');
                    div.className = 'w-finshed-menu';
                    div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right"><span class="cash">'+total+'</span>元(含服务费)</span></li></ul><ul class="menu-che mui-table-view"><li class="mui-table-view-cell">配送地址：</li><li class="mui-table-view-cell"><div>联系电话: <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></div></li><li class="mui-table-view-cell">联系姓名：{{ $user->name }}</li></ul><ul class="app-time mui-table-view"><li class="mui-table-view-cell">预约时间：2016-10-24 11:48(默认送达时间) <span class="mui-icon iconfont youjiantou003 mui-pull-right"></span></li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><a href="/wechat/paytest"><button class="w-want-accept">购买</button></a></li></ul>';
                  
                    document.body.appendChild(div);
                }
         })
      })
  </script>

  <script>
      $(function(){
        var count =0;
        $(document).on('touchstart','.mui-numbox-btn-plus',function(){
          count++;
          var num =  count;
          $(this).prev().val(num);
          num*
          $('.cash').text();
        });

        $(document).on('touchstart','.mui-numbox-btn-minus',function(){
          count--;
          var jian =  count;
          if(jian<=0){
              $(this).next().val(0);
              $(this).next().val(jian);
          }
         
        });

      })
  </script>


<script>
      $(function(){
        var len =$('li').find('span.vue-number')
        var nnn =$('li').find('span.vue-number')
        var mmm = $('li').find('input.mui-numbox-input')
        var acash = 0;
        for(var j=0;j<len.length;j++){
          acash += parseFloat(mmm[j].value)*(parseFloat(nnn[j].innerHTML)); 
        }
        console.log(acash);
      })

</script>

@stop

