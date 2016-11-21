@extends('wechat.layout')

@section('title')
购物车
@stop

@section('content')
  <ul class="w-tab-view mui-table-view" style="margin-top: 0;">
    
  </ul>    
      
<!--底部nav切换开始-->
    <nav class="win-bar mui-bar mui-bar-tab">
      <a id="defaultTab" class="mui-tab-item " href="/wechat/index">
        <span class="mui-icon iconfont xuanshouye201"></span>
        <span class="mui-tab-label">首页</span>
      </a>
      <a class="mui-tab-item" href="/wechat/order/status">
        <span class="mui-icon iconfont dingdan111"></span>
        <span class="mui-tab-label">我的订单</span>
      </a>
      <a class="mui-tab-item mui-active" href="/wechat/cart">
        <span class="mui-icon iconfont xuangouwuche203"><span class="w-badge mui-badge">0</span></span>
        <span class="mui-tab-label">购物车</span>
      </a>
      <a class="mui-tab-item" href="/wechat/profile">
        <span class="mui-icon iconfont xuangerenzhongxin204"></span>
        <span class="mui-tab-label">个人中心</span>
      </a>
    </nav>
  <!--底部nav切换结束-->

@section('js')
<script src="/lib/pusher/main.js"></script>

<script>
  mui('body').on('tap','a',function(){
    document.location.href=this.href;
  });
</script>

<script>
  if(localStorage.getItem('buyCart') == null) {
    localStorage.setItem('buyCart', '0');
  }

  $('.w-badge').text(parseInt(localStorage.getItem('buyCart')));
</script>

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
        });

  </script> 


  <script>
    $(function(){
      var cartFood = JSON.parse(localStorage.getItem('cartFoodId'));
      var table = document.body.querySelector('.w-tab-view');

      if(cartFood.length == 0) {
        $('.w-tab-view').html('<li style="width:100%;height:100%;text-align:center;padding-top:200px;font-size:20px;color:silver;">您还没有购买任何商品！</li>');
      }

      $.each(cartFood,function(name,value){
        var ajaxUrl = '/api/food/'+value;
         $.ajax({
                url:ajaxUrl,
                dataType:'json',
                async:false,
                type:'GET',
                success:function(data){
                  var foodList = data.data;

                  var li =document.createElement('li');
                  li.className = 'mui-table-view-cell mui-media';
                  li.innerHTML = '<img class="mui-media-object mui-pull-left" src='+foodList.img+'><div class="w-box" data-id='+foodList.id+'><div class="w-menu-left"><p class="menu-name">'+foodList.name+'</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:'+foodList.sold+'&nbsp;&nbsp;点赞:5</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">'+foodList.price+'</span>&nbsp;&nbsp;<span class="origin-value">原价:'+foodList.original_price+'元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon-g"><div class="mui-numbox"><button class="mui-btn mui-numbox-btn-minus" type="button"><span class="mui-icon iconfont jianhao107"></span></button><input class="mui-numbox-input" type="number" value= "1"/><button class="mui-btn mui-numbox-btn-plus" type="button"><span class="mui-icon iconfont jiahao108"></span></button></div></div></div></div>';
                  table.appendChild(li);
                }
            });
      });

      if(cartFood.length != 0) {
        var div = document.createElement('div');
          div.className = 'w-finshed-menu w-cart';
          div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right"><span class="cash"></span>元(含服务费)</span></li></ul><ul class="menu-che mui-table-view"><li class="mui-table-view-cell">配送地址：{{ $user->address }}</li><li class="mui-table-view-cell"><div>联系电话: <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></div></li><li class="mui-table-view-cell">联系姓名：{{ $user->name }}</li></ul><ul class="app-time mui-table-view"><li class="mui-table-view-cell Ntime">预约时间：2016-11-17 12:48(默认送达时间) <span class="mui-icon iconfont youjiantou003 mui-pull-right"></span></li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept">购买</button></li></ul>';
            document.body.appendChild(div);   
      }

    })
  </script>



  <script>
  
/*计算总价*/
   $(function(){

        var adds =  $('.mui-numbox-btn-plus');
        var shans = $('.mui-numbox-btn-minus');
        var price =$('.vue-number');
        var inputs =$('.mui-numbox-input');
        var total = 0;

        for (var i = 0; i < adds.length; i++) {
          total = total + parseFloat(price.eq(i).text())*inputs.eq(i).val();
        }

        adds.on('touchstart',function() {
          var numb = $(this).parent().find('.mui-numbox-input').eq(0);
          var cash = $('.cash').eq(0);
          
          total = parseFloat(cash.html()) + 
          parseFloat($(this).parent().parent().parent().parent().find('.vue-number').eq(0).html());

          cash.html(total);
          numb.val(parseInt(numb.val()) + 1);
          if(numb.val() >=1){
            $(this).parent().find('span.jianhao107').eq(0).css('color','#338fcd');
          }
        });

        shans.on('touchstart',function() {
          var numb = $(this).parent().find('.mui-numbox-input').eq(0);
          var cash = $('.cash').eq(0);

          if(numb.val() == 0) {
            $(this).find('span.jianhao107').css('color','#ccc');
            return;
          }
            else if(numb.val() >=1){
            $(this).find('span.jianhao107').css('color','#338fcd');
          }
          
          total = parseFloat(cash.html()) - 
          parseFloat($(this).parent().parent().parent().parent().find('.vue-number').eq(0).html());

          cash.html(total);

          numb.val(parseInt(numb.val()) - 1);
        });
      });

  </script>



<script>/*添加喜欢，取消喜欢*/
      $(function(){
        function collect(coName,ifName,haveName,coText1,coText2,typeA){
          $(document).on('touchstart',coName,function(){
            var boolName = $(this).find('span').hasClass(ifName);
            if(boolName){
              $(this).find('span').removeClass(ifName).addClass(haveName);
              var foodId = $(this).parents('div.w-box').attr('data-id');
              var furl = '/wechat/'+typeA+'/add/'+foodId;
              $.ajax({
                url:furl,
                dataType:'json',
                async:true,
                type:'GET',
                success:function(data){
                  layer.open({
                    content: coText1
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                  });
                }
              });
            }

            else{
              $(this).find("span").removeClass(haveName).addClass(ifName);
              var foodId = $(this).parents('div.w-box').attr('data-id');
              var furl = '/wechat/'+typeA+'/cancel/'+foodId;
              $.ajax({
                url:furl,
                dataType:'json',
                async:true,
                type:'GET',
                success:function(data){
                  layer.open({
                    content: coText2
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                  });
                }
              });
            }
            
          })
        };
        collect('.love-icon','dianzan105','dianzan106','收藏成功','取消收藏','favorite');
      });
    </script>


    <script>
      /*购买付款*/
      $(function(){
        $(document).on('touchstart','.w-want-accept',function(){

          var buyAcash = parseFloat($('.cash').text());//总额
          var buyArray  = new Array();
          for (var i=0;i<$('.menu-name').length;i++){
              buyArray.push({
                'id':$('.w-box').eq(i).attr('data-id'),
                'numb':$('.mui-numbox-input').eq(i).val()
              });
          }

          var buyAcash = parseFloat($('.cash').text());
          // var urlajax = '/wechat/paid?openid={{ $user->id }}';
          var urlajax = '/wechat/prepay';
          $.get(urlajax,
            {'total':buyAcash, 'time':$('.Ntime').attr('data-id'), 'food':buyArray},
            function(data){
              console.log(data);
              // alert(data);
              callpay(data);
            }
          );
        })
      })
  </script>




  <script>/*默认时间顺延半小时*/
      $(function(){
        var timestamp = Date.parse(new Date());  
            timestamp = timestamp / 1000+30*60; 

          function getLocalTime(nS) { 
            return new Date(parseInt(nS) * 1000).toLocaleString().substr(0,18);
          } 

          var time = getLocalTime(timestamp);

          $('.Ntime').html('预约时间：'+time+'(默认送达时间)'+'<span class="mui-icon iconfont youjiantou003 mui-pull-right"></span>');
          $('.Ntime').attr('data-id', timestamp);

      })
  </script>


<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall(data)
    {
        WeixinJSBridge.invoke(
       'getBrandWCPayRequest', eval("("+data+")"),
            function(res){
              switch(res.err_msg) {
                  case 'get_brand_wcpay_request:cancel':
                      alert('用户取消支付！');
                      break;
                  case 'get_brand_wcpay_request:fail':
                      alert('支付失败！（'+res.err_desc+'）');
                      break;
                  case 'get_brand_wcpay_request:ok':
                  localStorage.removeItem('buyCart');
                  localStorage.removeItem('cartFoodId');
                      alert('支付成功！');
                      window.location.replace("/wechat/order/status");
                      break;
                  default:
                      alert(JSON.stringify(res));
                      break;
              }      
            }
        );
    }

    function callpay(data)
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall(data);
        }
    }
</script>



@stop

