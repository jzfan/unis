@extends('wechat.layout')

@section('title')
我是代理
@stop


@section('content')
<div id="offCanvasWrapper" class="canvas-main mui-off-canvas-wrap mui-draggable mui-slide-in">
			<!--侧滑菜单部分开始-->
			<aside id="offCanvasSide" class="w-canvas-left mui-off-canvas-left">
		      <div id="offCanvasSideScroll" class="mui-scroll-wrapper">
		        <div class="mui-scroll">
		          <h1 class="w-classify">菜品分类</h1>
		          
		          <ul class="w-canvas-list">
		          	
		          </ul>
		        </div>
		      </div>
		    </aside>
			<!--侧滑菜单部分结束-->

	<!--主界面部分开始-->
	<div class="mui-inner-wrap">
		<header class="w-bar mui-bar mui-bar-nav">
			<a id='left_menu' href="#offCanvasSide" class="mui-icon iconfont caidanlan101 mui-pull-left"></a>
			<h1 class="mui-title"><span class="mui-icon iconfont dingwei104"></span>&nbsp;&nbsp;<span class="address-name" id="addName"></span>&nbsp;&nbsp;<span class="mui-icon  iconfont youjiantou003" id="arrow"></span></h1>
		</header>


		<!--教工食堂下拉框开始-->
		    <div id="popover" class="w-popover mui-popover">
  				<ul class="mui-table-view mui-table-view-radio" id="canteen-li">
					
				</ul>
			</div>
		<!--教工食堂下拉框结束-->

			<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="w-tab mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item2mobile">接单</a>
				</div>

				<div class="mui-slider-group">
				
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								
								
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



<!--底部nav切换开始-->
<nav class="win-nav mui-bar mui-bar-tab">
	<a id="defaultTab" class="mui-tab-item mui-active" href="/wechat/agent/index">
		<span class="mui-icon iconfont xuanshouye201"></span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item" href="/wechat/agent/order/index">
		<span class="mui-icon iconfont dingdan111"></span>
		<span class="mui-tab-label">我的订单</span>
	</a>
	<a class="mui-tab-item" href="/wechat/agent/profile">
		<span class="mui-icon iconfont xuangerenzhongxin204"></span>
		<span class="mui-tab-label">个人中心</span>
	</a>
</nav>
<!--底部nav切换结束-->

@section('js')
<script src='/js/wechat/index.js'></script>
	
<script>
/*进入页面加载默认用户校区所有食堂*/
	$(function() {
		$.ajax({
			url: '/wechat/ajax/index_data',
			dataType: 'json',
			async: true,
			type: 'GET',
			success: function(data) {
				var canteen = data.canteens;
				for(var i = 0; i < canteen.length; i++) {
					var li = document.createElement('li');
					li.className = 'mui-table-view-cell';
					li.innerHTML = '<span class="mui-navigate-right selectDown" data-id=' + canteen[i].id + '>' +canteen[i].name+'</span>';
					var ul = document.body.querySelector('#canteen-li');
					ul.appendChild(li);
				}
				
				$('#addName').html(canteen[0].name); //进入首页默认第一个为用户默认食堂
				$('#addName').attr('data-id', canteen[0].id);
				localStorage.setItem('canteen',JSON.stringify(canteen[0].id));//将默认食堂id存在本地
				localStorage.setItem('canteens', JSON.stringify(canteen));



				/*根据食堂选默认窗口*/
					$('.w-canvas-list').html(''); //换食堂时候清空之前食堂对应的窗口
					var portUrl = '/api/shops_of_canteen/' + JSON.parse(localStorage.getItem('canteen'));
					$.ajax({
						url: portUrl,
						dataType: 'json',
						async: true,
						type: 'GET',
						success: function(data) {
							var port = data.shops;
							for(var i = 0; i < port.length; i++) {
								li = document.createElement('li');
								li.className = "portName";
								li.innerHTML = port[i].name + '<span data-id=' + port[i].id + '></span>';
								var table = document.body.querySelector('.w-canvas-list');
								table.appendChild(li);
							}
							localStorage.setItem('shopId',JSON.stringify(port[0].id));//将默认窗口id存在本地
							localStorage.setItem('defalutshopId',JSON.stringify(port[0].id));//将首次进入页面默认窗口id存在本地

							/*根据默认窗口取食品列表*/
							portFoodList();//调用根据窗口取食品列表函数
						}
					});		
			}
		});
	});

</script>



<script>
	/*处理上左菜单重叠问题*/
	$(function() {
		$('#left_menu').on('touchstart', function() {
			mui('.mui-popover').popover('hide');
		});
	});

	$(function() {
		$('.mui-title').on('touchstart', function() {
			mui('.mui-popover').popover('toggle', document.getElementById("openPopover"));

			if($(this).find("span#arrow").hasClass("youjiantou003")) {
				$('#arrow').removeClass('youjiantou003').addClass('xiajiantou002');
			} else {
				$('#arrow').removeClass('xiajiantou002').addClass('youjiantou003');
			}
		});
	});

	$(function() {
		$('.mui-title').on('touchstart', function() {
			var htop = $('.w-popover').height() + 44 + 'px';
			$('.mui-backdrop').css('top', htop);
		});
	});

	/*根据食堂选窗口*/
	$(function() {
		$(document).on('tap', '#canteen-li .mui-table-view-cell', function() {
			var canteenId = $(this).find('span.selectDown').attr('data-id');
			localStorage.setItem('canteen',JSON.stringify(canteenId));//切换食堂时将对应食堂ID存在本地
			mui('.mui-popover').popover('toggle', document.getElementById("openPopover")); //点击食堂名称收起povper
			
			if($('.mui-title').find('span.xiajiantou002').hasClass("xiajiantou002")) {
				$('.mui-title').find('span.xiajiantou002').removeClass('xiajiantou002').addClass('youjiantou003');
			} //更改首页首页头部箭头方向
			
			var newText = $(this).find('span.selectDown').text();
			$('.mui-title #addName').text(newText); //改变顶部食堂名称


			/*根据食堂选窗口*/
			$('.w-canvas-list').html(''); //换食堂时候清空之前食堂对应的窗口
			var portUrl = '/api/shops_of_canteen/' + JSON.parse(localStorage.getItem('canteen'));
			$.ajax({
				url: portUrl,
				dataType: 'json',
				async: true,
				type: 'GET',
				success: function(data) {
					var port = data.shops;
					for(var i = 0; i < port.length; i++) {
						li = document.createElement('li');
						li.className = "portName";
						li.innerHTML = port[i].name + '<span data-id=' + port[i].id + '></span>';
						var table = document.body.querySelector('.w-canvas-list');
						table.appendChild(li);
					}
					localStorage.setItem('shopId',JSON.stringify(port[0].id));//将默认窗口id存在本地
				}
			});


			setTimeout(function(){/*不延时取不到当前窗口id,会取上一个窗口id*/
				/*根据默认窗口取食品列表*/
					portFoodList();//调用根据窗口取食品列表函数

			},300)

		});

		/*点击窗口时保存窗口id到本地*/
		$(document).on('tap','.portName',function(){
			mui('.mui-slider-group #item1mobile .mui-scroll-wrapper').scroll().scrollTo(0,0);
			mui('.mui-off-canvas-wrap').offCanvas('show');//点击窗口关闭侧边栏
			localStorage.setItem('shopId',JSON.stringify($(this).find('span').attr('data-id')));//存当前点击的窗口id

			/*根据窗口取食品列表*/
			portFoodList();//调用根据窗口取食品列表函数

		});

	});


	window.onbeforeunload = function(){
		var defalutId = JSON.parse(localStorage.getItem('defalutshopId'));
		localStorage.setItem('shopId',JSON.stringify(defalutId));//暂时解决关闭后重新进入页面错误问题
	}
</script>

@stop
