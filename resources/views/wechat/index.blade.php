@extends('wechat.layout')

@section('content')
		<div id="offCanvasWrapper" class="canvas-main mui-off-canvas-wrap mui-draggable mui-slide-in">
			<!--侧滑菜单部分开始-->

			<aside id="offCanvasSide" class="w-canvas-left mui-off-canvas-left">
		      <div id="offCanvasSideScroll" class="mui-scroll-wrapper">
		        <div class="mui-scroll">
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
			<!--侧滑菜单部分结束-->

	<!--主界面部分开始-->
	<div class="mui-inner-wrap">
		<header class="w-bar mui-bar mui-bar-nav">
			<a href="#offCanvasSide" class="mui-icon iconfont caidanlan101 mui-pull-left"></a>
			<h1 class="mui-title"><span class="mui-icon iconfont dingwei104"></span>&nbsp;&nbsp;<span class="address-name">一食堂：诗香苑</span>&nbsp;&nbsp;<span class="mui-icon  iconfont youjiantou003" id="arrow"></span></h1>
		</header>


		<!--教工食堂下拉框开始-->
		    <div id="popover" class="w-popover mui-popover">
  				<ul class="mui-table-view mui-table-view-radio">
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">一食堂：诗香苑</span>
					</li>
					<li class="mui-table-view-cell mui-selected">
						<span class="mui-navigate-right">二食堂：文雅苑</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">三食堂：攀高苑</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">四食堂：砺尖苑</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-navigate-right">五食堂：创新苑</span>
					</li>
				</ul>
			</div>
		<!--教工食堂下拉框结束-->

			<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					
				<a class="mui-control-item mui-active" href="#item1mobile">点餐</a>
				<a class="mui-control-item" href="#item2mobile">接单</a>
				</div>

				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
						<!-- 点餐数据列表开始 -->
						<ul class="w-tab-view mui-table-view">
						    <li class="mui-table-view-cell mui-media">
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
				<!-- 点餐数据列表结束 -->


							</div>
						</div>
					</div>

					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								
								<!-- 接单数据列表开始 -->
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
						            		<div class="add-icon-a"><span class="num-menu-num">份数：1</span></div>
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
						            		<div class="add-icon-a"><span class="num-menu-num">份数：2</span></div>
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
							    <li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li>
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
						            		<div class="add-icon-a"><span class="num-menu-num">份数：3</span></div>
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
							    <li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a></div></li>
							    <li class="mui-table-view-cell">联系姓名：毛毛</li>
							    <li class="mui-table-view-cell">配送地址：中南名族大学北校区学生公寓5B515</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell">下单时间：2016-10-17 11:48&nbsp;&nbsp;&nbsp;&nbsp;预约时间：2016-10-17 12:08</li>
							</ul>

							<ul class="mui-table-view">
							    <li class="mui-table-view-cell"><button class="w-want-accept">我要接单</button></li>
							</ul>

							<!-- 接单数据列表结束 -->


							</div>
						</div>
					</div>
					
				</div>

			</div>
		</div>

			<div class="mui-off-canvas-backdrop"></div>
	</div>
<!--主界面部分结束-->
</div>
</div>
@include('wechat.partial.buttomNav')
	
@stop

@section('js')

		<script>
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$.ready(function() {
					//循环初始化所有下拉刷新，上拉加载。
					$.each(document.querySelectorAll('.mui-slider-group .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							down: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul = self.element.querySelector('.mui-table-view');
										ul.insertBefore(createFragment(ul, index, 10, true), ul.firstChild);
										self.endPullDownToRefresh();
									}, 1000);
									$.ajax({
											url:'/api/food',
											dataType:'json',
											async:true,
											data:{'page':1},
											type:'GET',
									        jsonp:"callback",
									        jsonpCallback:"success_jsonpCallback",
									        success:function(data){
									        	var datafood = data;
									        	/*console.log(eval(datafood.data)[1].img);*/
									        	var jsons = eval(datafood.data);
									        	for(var i=0;i<jsons.length;i++){
									        		console.log(jsons[i].img+'\n');
									        	}
									        }
										});
								}
							},
							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var ul = self.element.querySelector('.mui-table-view');
										ul.appendChild(createFragment(ul, index, 5));
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});
					var createFragment = function(ul, index, count, reverse) {
						var length = ul.querySelectorAll('li').length;
						var fragment = document.createDocumentFragment();
						var li;
						for (var i = 0; i < count; i++) {
							li = document.createElement('li');
							li.className = 'mui-table-view-cell mui-media';
							li.innerHTML = '<a href="javascript:;">'+'<img class="mui-media-object mui-pull-left" src="//img/wechat/wechat/xcr.png">'+'<div class="w-box">'+'<div class="w-menu-left">'+'<p class="menu-name">'+'农家小炒肉'+'</p>'+'<small class="menu-address">'+'教工食堂'+'</small>'+'<p class="menu-number">'+'<span>月售:'+'12'+'&nbsp;&nbsp;'+'点赞:'+'5'+'</span></p>'+'<p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">8</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:9元</span></p>'+'</div>'+'<div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div>'+'</div>'+'</a>';
							fragment.appendChild(li);
						}
						return fragment;
					};
				});
			})(mui);


@stop
