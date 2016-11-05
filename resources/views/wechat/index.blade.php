@extends('wechat.layout')

@section('content')
		<!-- 侧滑导航根容器 -->
		<div class="mui-off-canvas-wrap mui-draggable mui-slide-in mui-action-menu">
		  <!-- 主页面容器 -->
		  
		  <div class="mui-inner-wrap">
		     <!-- 菜单容器 -->
		    <aside class="w-canvas-left mui-off-canvas-left">
		      <div class="mui-scroll-wrapper">
		        <div class="mui-scroll">
		          <!-- 菜单具体展示内容 -->
		          <h1 class="w-classify">菜品分类</h1>
		          
		          <ul class="w-canvas-list">
		          	<a href=""><li>精致小炒</li></a>
		          	<a href=""><li>美味浓汤</li></a>
		          	<a href=""><li>可口小吃</li></a>
		          	<a href=""><li>特色粉面</li></a>
		          </ul>
		        </div>
		      </div>
		    </aside>
		    <!-- 主页面标题 -->
		    <header class="w-bar mui-bar mui-bar-nav mui-action-menu ">
		      <a class="mui-icon iconfont caidanlan101 mui-pull-left " id="aaa"></a>
		      <h1 class="mui-title"><span class="mui-icon iconfont dingwei104"></span>&nbsp;&nbsp;<span class="address-name">教工食堂</span>&nbsp;&nbsp;<span class="mui-icon  iconfont youjiantou003" id="arrow"></span></h1>
		    </header>
		    
		    <!--教工食堂下拉框开始-->
		    <div id="popover" class="w-popover mui-popover">
  				<ul class="mui-table-view mui-table-view-radio">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right">一食堂</a>
					</li>
					<li class="mui-table-view-cell mui-selected">
						<a class="mui-navigate-right">二食堂</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right">学生食堂</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right">教工食堂</a>
					</li>
				</ul>
			</div>
			<!--教工食堂下拉框结束-->
		    
		    
		    
		    <!-- 主页面内容容器 -->
		    <div id="backdrop" class="mui-off-canvas-backdrop"></div>
		    <div class="mui-content mui-scroll-wrapper">
		      <div class="mui-scroll">
		        <!-- 主界面具体展示内容 -->
		        
		        
		        <!--顶部tab切换开始-->
		        <div class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted " id="sliderSegmentedControl">
		        	<a href="#item1mobile" class="mui-control-item mui-active">点餐</a>
		        	<a href="#item2mobile" class="mui-control-item">接单</a>
		        </div> 
		        
		        <div class="w-slider-group mui-slider-group">
		        	<div id="item1mobile" class="mui-slider-item  mui-control-content mui-active">
		        		<ul class="w-tab-view mui-table-view">
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
						            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
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
						            		<p class="menu-number"><span>月售:30&nbsp;&nbsp;点赞:9</span></p>
						            		<p class="menu-footer">
						            			<span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
						            		</p>
						            	</div>
						            	<div class="w-menu-right">
						            		<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
						            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						    
						    <li class="mui-table-view-cell mui-media">
						        <a href="javascript:;">
						            <img class="mui-media-object mui-pull-left" src="/img/wechat/nds.png">
						            <div class="w-box">
						            	<div class="w-menu-left">
						            		<p class="menu-name">爆炒牛肚丝</p>
						            		<small class="menu-address">教工食堂</small>
						            		<p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
						            		<p class="menu-footer">
						            			<span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
						            		</p>
						            	</div>
						            	<div class="w-menu-right">
						            		<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
						            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						    
						    <li class="mui-table-view-cell mui-media">
						        <a href="javascript:;">
						            <img class="mui-media-object mui-pull-left" src="/img/wechat/ym.png">
						            <div class="w-box">
						            	<div class="w-menu-left">
						            		<p class="menu-name">清炒玉米粒</p>
						            		<small class="menu-address">教工食堂</small>
						            		<p class="menu-number"><span>月售:12&nbsp;&nbsp;点赞:5</span></p>
						            		<p class="menu-footer">
						            			<span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span>
						            		</p>
						            	</div>
						            	<div class="w-menu-right">
						            		<div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div>
						            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						    
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
						            		<div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>
						</ul>
		        	</div>
		        	
		        	<div id="item2mobile" class="mui-slider-item mui-control-content">
		        		<ul class="w-tab-view mui-table-view">
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
						            		<div class="love-icon"><span class=""></span></div>
						            		<div class="add-icon"><span class="num-menu-num">份数：1</span></div>
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
						            		<div class="love-icon"><span class=""></span></div>
						            		<div class="add-icon"><span class="num-menu-num">份数：2</span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>

						</ul>

						<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="w-home-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">待接单</span></li>
							    <li class="mui-table-view-cell">联系电话: 15586879654</li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept">我要接单</button></li>
							</ul>
						</div>





						<ul class="w-tab-view mui-table-view">
						    
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
						            		<div class="love-icon"><span class=""></span></div>
						            		<div class="add-icon"><span class="num-menu-num">份数：3</span></div>
						            	</div>
						            </div>
						          
						        </a>
						    </li>

						</ul>

						<div class="w-finshed-menu">
							<ul class="w-cash-all mui-table-view">
							    <li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">36元(含服务费)</span></li>
							</ul>

							<ul class="w-home-tab mui-table-view">
							    <li class="mui-table-view-cell">订单编号：8546974125412475 <span class="w-hold mui-pull-right">待接单</span></li>
							    <li class="mui-table-view-cell">联系电话: 15586879654</li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept">我要接单</button></li>
							</ul>
						</div>



		        	</div>
		        </div>

		        
		        
		        <!--顶部tab切换结束-->
		      </div>
		    </div>  
		  </div>
		</div>
@include('wechat.partial.buttomNav')
	
@stop

@section('js')
		<script>
			mui('.mui-content.mui-scroll-wrapper').scroll();
		</script>
@stop
