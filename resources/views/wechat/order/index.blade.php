@extends('wechat.layout')

@section('title')
我的订单
@stop

@section('content')
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item mui-active" href="#item1mobile">我的订单</a>
					<a class="mui-control-item" href="#item2mobile">我的带餐</a>
					<a class="mui-control-item" href="#item3mobile">我已带到</a>
				</div>

				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">配送中</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已送达</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">配送中</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">等待确认</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>


					<div id="item3mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>

								<ul class="my-menu mui-table-view">   
									<li class="mui-table-view-cell">
										<div class="mui-slider-right mui-disabled">
										<span class="mui-btn mui-btn-red">删除</span>
										</div>
										<div class="mui-slider-handle">
											订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span>
											<div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
@stop

@section('js')
	<!-- <script>
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
										var ul= self.element.querySelector('.mui-table-view');
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
							ul = document.createElement('ul');
							ul.className = 'my-menu mui-table-view';
							ul.innerHTML = '<li class="mui-table-view-cell"><div class="mui-slider-right mui-disabled"><span class="mui-btn mui-btn-red">删除</span></div><div class="mui-slider-handle">订单编号：8546974125412475 <span class="my-song mui-pull-right">已完成</span><div class="telShow">联系电话：<a href="tel:15586879654">15586879654</a><br>联系姓名：毛毛<br>配送地址：中南名族大学北校区学生公寓5B515<br>合计总额：32元</div></div></li>';
							fragment.appendChild(ul);
						}
						return fragment;
					};
				});
			})(mui);
		</script> -->
@stop