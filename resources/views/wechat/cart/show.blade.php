@extends('wechat.layout')

@section('title')
购物车
@stop

@section('content')
  <ul class="w-tab-view mui-table-view" style="margin-top: 0;">
              
                <li class="mui-table-view-cell mui-media">
                    <a href="javascript:;">
                        <img class="mui-media-object mui-pull-left" src="/img/wechat/xcr.png">
                        <div class="w-box">
                          <div class="w-menu-left">
                            <p class="menu-name">农家小炒肉</p>
                            <small class="menu-address">教工食堂</small>
                            <p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
                            <p class="menu-footer">
                              <span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
                            </p>
                          </div>
                          <div class="w-menu-right">
                            <div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
                            <div class="add-icon-g">

                          <div class="mui-numbox" data-numbox-min='0'>
                              <!-- "-"按钮，点击可减小当前数值 -->
                            <button class="mui-btn mui-numbox-btn-minus" type="button"><span class="mui-icon iconfont jianhao107"></span></button>
                            <input class="mui-numbox-input" type="number" />
                            <!-- "+"按钮，点击可增大当前数值 -->
                            <button class="mui-btn mui-numbox-btn-plus" type="button"><span class="mui-icon iconfont jiahao108"></span></button>
                          </div>
                          
                            </div>
                          </div>
                        </div>
                      
                    </a>
                </li>
                
                <li class="mui-table-view-cell mui-media">
                    <a href="javascript:;">
                        <img class="mui-media-object mui-pull-left" src="/img/wechat/sls.png">
                        <div class="w-box">
                          <div class="w-menu-left">
                            <p class="menu-name">酸辣土豆丝</p>
                            <small class="menu-address">教工食堂</small>
                            <p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
                            <p class="menu-footer">
                              <span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
                            </p>
                          </div>
                          <div class="w-menu-right">
                            <div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
                            <div class="add-icon-g">
                          <div class="mui-numbox" data-numbox-min='0'>
                              <!-- "-"按钮，点击可减小当前数值 -->
                            <button class="mui-btn mui-numbox-btn-minus" type="button"><span class="mui-icon iconfont jianhao107"></span></button>
                            <input class="mui-numbox-input" type="number" />
                            <!-- "+"按钮，点击可增大当前数值 -->
                            <button class="mui-btn mui-numbox-btn-plus" type="button"><span class="mui-icon iconfont jiahao108"></span></button>
                          </div>


                             </div>
                          </div>
                        </div>
                      
                    </a>
                </li>

            </ul>
            

            <div class="w-finshed-menu">
              <ul class="w-cash-all mui-table-view">
                  <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
              </ul>

              <ul class="menu-che mui-table-view">
                  <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
                  <li class="mui-table-view-cell"><div>联系电话: <a href="tel:15586879654">15586879654</a></div></li>
                  <li class="mui-table-view-cell">联系姓名：毛毛</li>
              </ul>

              <ul class="app-time mui-table-view">
                  <li class="mui-table-view-cell">预约时间：2016-10-24 11:48(默认送达时间) <span class="mui-icon iconfont youjiantou003 mui-pull-right"></span></li>
              </ul>

              <ul class="mui-table-view">
                  <li class="mui-table-view-cell"><button class="w-want-accept">购买</button></li>
              </ul>
            </div>
@include('wechat.partial.buttomNav')
  
@stop

@section('js')
<script src="/lib/pusher/main.js"></script>

  <script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
  <script>
      /*选择时间*/
      $(function(){
        var dtPicker = new mui.DtPicker('');
        $('.app-time li').on('touchstart',function(time){
          var _this = $(this);
          dtPicker.show(function (selectItems) { 
            _this.html('预约时间：'+selectItems.text+'<span class="mui-icon iconfont youjiantou003 mui-pull-right">');
          })
        })
      });
  </script>
@stop
