@extends('wechat.layout') @section('content')
<div id="offCanvasWrapper" class="canvas-main mui-off-canvas-wrap mui-draggable mui-slide-in">
	<!--侧滑菜单部分开始-->
	<aside id="offCanvasSide" class="w-canvas-left mui-off-canvas-left">
		<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<h1 class="w-classify">食堂窗口</h1>
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

					<a class="mui-control-item mui-active" href="#item1mobile">点餐</a>
					<a class="mui-control-item" href="#item2mobile">带餐</a>
				</div>

				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll" id='kong'>

							</div>
						</div>
					</div>

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
</div>
<!--主界面部分结束-->

<!--底部nav切换开始-->
<nav class="win-nav mui-bar mui-bar-tab">
	<a id="defaultTab" class="mui-tab-item mui-active" href="/wechat/index">
		<span class="mui-icon iconfont xuanshouye201"></span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item" href="/wechat/order/status">
		<span class="mui-icon iconfont dingdan111"></span>
		<span class="mui-tab-label">我的订单</span>
	</a>
	<a class="mui-tab-item" href="/wechat/cart">
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
<script src="/js/wechat/jquery-3.1.1.min.js"></script>
<script>
	mui('body').on('tap', 'a', function() {
		document.location.href = this.href;
	});
</script>

<script>
	if(localStorage.getItem('buyCart') == null) {
		localStorage.setItem('buyCart', '0');
	}

	$('.w-badge').text(parseInt(localStorage.getItem('buyCart')));


	function clearAtime(){
		var timeClear = JSON.parse(localStorage.getItem('timeArr'));
		if(timeClear != null){
			for(var i=0;i<timeClear.length;i++){
			clearTimeout(timeClear[i]);
			}
		}
		
		localStorage.setItem('timeArr', JSON.stringify(new Array()));
	}

	function pushTimeId(timerId){
			var  tArr =JSON.parse(localStorage.getItem('timeArr'));
			tArr.push(timerId);
			localStorage.setItem('timeArr',JSON.stringify(tArr));
		}
</script>

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
					li.innerHTML = '<span class="mui-navigate-right selectDown" data-id=' + canteen[i].id + '>' + canteen[i].name + '</span>';
					var ul = document.body.querySelector('#canteen-li');
					ul.appendChild(li);
				}
				
				$('#addName').html(canteen[0].name); //进入首页默认第一个为用户默认食堂
				$('#addName').attr('data-id', canteen[0].id);
				localStorage.setItem('canteen',JSON.stringify(canteen[0].id));//将默认食堂id存在本地
				localStorage.setItem('canteens', JSON.stringify(canteen));
				select_canteen(0);
			}
		});

	});



</script>

<script>/*菜品下拉刷新上拉加载*/
	mui.init();

	(function($) {
		//阻尼系数
		var deceleration = mui.os.ios ? 0.003 : 0.0009;
		$('.mui-scroll-wrapper').scroll({
			bounce: false,
			indicators: true, //是否显示滚动条
			deceleration: deceleration
		});

		$(function() {
			var page = 1;
			var load = true;

			//循环初始化所有下拉刷新，上拉加载。
			$('.mui-slider-group #item1mobile .mui-scroll').pullToRefresh({
				down: {
					callback: function() {
						var self = this;
						var shopId  = JSON.parse(localStorage.getItem('shopId'));
						var urlajax = '/api/shops_of_canteen/'+shopId;
						var time0 = setTimeout(function() {
							$.ajax({
								url: urlajax,
								dataType: 'json',
								async: false,
								type: 'GET',
								success: function(data) {
									select_shop(JSON.parse(localStorage.getItem('curshopId')));//选串口做比对
								}
							});

							self.endPullDownToRefresh();

							if(page > 1) {
								page = 1;
								load = false;
								self.refresh(true);
							}
						}, 1000);
						pushTimeId(time0);//把当前定时器存本地
					}
				},



				up: {
					callback: function() {
						var self = this;
						
							self.endPullUpToRefresh();
							jQuery('.mui-pull-loading').text('没有更多了');

					}
				}
			});
		});
	})(mui);
</script>

<script>/*进入页面加载带餐*/
	$(function() {
		$.ajax({
			url: '/wechat/user',
			dataType: 'json',
			async: false,
			data: {},
			type: 'GET',
			success: function(data) {
				$('.mui-content').attr('data-id',data.wechat_openid);
			}
		});

		var openid = $('.mui-content').attr('data-id');
		var takeUrl = '/api/order/untaken/?openid='+openid+'&page=1&limit=10';
		$.ajax({
			url: takeUrl,
			dataType: 'json',
			async: false,
			type: 'GET',
			success: function(data) {
				var takeFood = data.data;
				for(var i = 0; i < takeFood.length; i++) {
					var total = parseFloat(takeFood[i].total*0.01);
					div = document.createElement('div');
					div.className = "w-finshed-menu";
					div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">' + total + '元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：' + takeFood[i].order_no + '<span class="w-hold mui-pull-right">' + takeFood[i].status + '</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:' + takeFood[i].orderer.phone + '">' + takeFood[i].orderer.phone + '</a></div></li><li class="mui-table-view-cell">联系姓名：' + takeFood[i].orderer.name + '</li><li class="mui-table-view-cell">配送地址：' + takeFood[i].address + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：' + takeFood[i].paid_at + '&nbsp;&nbsp;&nbsp;&nbsp;预约时间：' + takeFood[i].appointment_at + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept"  data-id=' + takeFood[i].id + '>我要带餐</button></li></ul>';

					var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
					var parent = document.body.querySelector('#item2mobile .mui-scroll');
					parent.insertBefore(div, table);
				}
			}
		});
	});
</script>

<script>/*带餐上拉刷新下拉加载开始*/
	mui.init();
	
	(function($) {
		//阻尼系数
		var deceleration = mui.os.ios ? 0.003 : 0.0009;
		
		$('.mui-scroll-wrapper').scroll({
			bounce: false,
			indicators: true, //是否显示滚动条
			deceleration: deceleration
		});
		
		$(function() {
			//循环初始化所有下拉刷新，上拉加载。
			var page =1;
			$('.mui-slider-group #item2mobile .mui-scroll').pullToRefresh({
				down: {
					callback: function() {
						var self = this;
						var openid = jQuery('.mui-content').attr('data-id');
						var urlajax = '/api/order/untaken/?openid='+openid+'&page=1&limit=15';
						var time1 = setTimeout(function() {
							$.ajax({
								url: urlajax,
								dataType: 'json',
								async: true,
								type: 'GET',
								success: function(data) {
									jQuery('#item2mobile .mui-scroll  .w-finshed-menu').remove();
									var takeFood = data.data;
									for(var i = 0; i < takeFood.length; i++) {
										var total = parseFloat(takeFood[i].total*0.01);
										div = document.createElement('div');
										div.className = "w-finshed-menu";
										div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">' + total + '元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：' + takeFood[i].order_no + '<span class="w-hold mui-pull-right">' + takeFood[i].status + '</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:' + takeFood[i].orderer.phone + '">' + takeFood[i].orderer.phone + '</a></div></li><li class="mui-table-view-cell">联系姓名：' + takeFood[i].orderer.name + '</li><li class="mui-table-view-cell">配送地址：' + takeFood[i].address + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：' + takeFood[i].paid_at + '&nbsp;&nbsp;&nbsp;&nbsp;预约时间：' + takeFood[i].appointment_at + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept"  data-id=' + takeFood[i].id + '>我要带餐</button></li></ul>';
										var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
										var par = document.body.querySelector('.mui-slider-group #item2mobile .mui-scroll');
										par.insertBefore(div, table);
									}
								}
							});
							self.endPullDownToRefresh();
						}, 1000);
						pushTimeId(time1);
					}
				},
				up: {
					callback: function() {
						page++;
						var openid = jQuery('.mui-content').attr('data-id');
						var urlajax = '/api/order/untaken/?openid='+openid+'&page='+page+'&limit=10';
						var self = this;
						var time2 = setTimeout(function() {
							$.ajax({
								url: urlajax,
								dataType: 'json',
								async: true,
								type: 'GET',
								success: function(data) {
									self.endPullUpToRefresh(page>data.last_page);
									var takeFood = data.data;
									for(var i = 0; i < takeFood.length; i++) {
										var total = parseFloat(takeFood[i].total*0.01);
										div = document.createElement('div');
										div.className = "w-finshed-menu";
										div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">' + total + '元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：' + takeFood[i].order_no + '<span class="w-hold mui-pull-right">' + takeFood[i].status + '</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:' + takeFood[i].orderer.phone + '">' + takeFood[i].orderer.phone + '</a></div></li><li class="mui-table-view-cell">联系姓名：' + takeFood[i].orderer.name + '</li><li class="mui-table-view-cell">配送地址：' + takeFood[i].address + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：' + takeFood[i].paid_at + '&nbsp;&nbsp;&nbsp;&nbsp;预约时间：' + takeFood[i].appointment_at + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept"  data-id=' + takeFood[i].id + '>我要带餐</button></li></ul>';
										var parent = document.body.querySelector('#item2mobile .mui-scroll');
										var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
										parent.insertBefore(div, table);
									}
								}
							})
							//self.endPullUpToRefresh();
						}, 1000);
						pushTimeId(time2);
					}
				}
			});
		});
	})(mui);
</script>

<script>/*添加到购物车，取消*/
	$(function() {
		$(document).on('touchstart', '.add-icon', function() {
			var boolName = $(this).find('span').hasClass('jiahao108');
			
			if(boolName) {
				$(this).find('span').removeClass('jiahao108').addClass('duigou506');

				var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');
				var cartFood = new Array(); //定义购物车里食品id数组

				if(localStorage.getItem('cartFoodId') != null) {
					cartFood = JSON.parse(localStorage.getItem('cartFoodId'));
				}
				
				cartFood.push(foodId);

				localStorage.setItem('buyCart', cartFood.length);
				localStorage.setItem('cartFoodId', JSON.stringify(cartFood));

				$('.w-badge').text(cartFood.length);

				layer.open({
							content: '添加成功',
							skin: 'msg',
							time: 2 //2秒后自动关闭
						});

			} 
			else {
				$(this).find("span").removeClass('duigou506').addClass('jiahao108');
				var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');
				//var furl = '/wechat/cart/cancel/' + foodId;
				var cartFood = JSON.parse(localStorage.getItem('cartFoodId'));
				console.log(cartFood);
				Array.prototype.removeByValue = function(val) {
						for(var i = 0; i < this.length; i++) {
							if(this[i] == val) {
								this.splice(i, 1);
								break;
							}
						}
					} //给数组构造一个方法，删除数组中指定的元素

				cartFood.removeByValue(foodId);
				localStorage.setItem('buyCart', cartFood.length);
				$('.w-badge').text(cartFood.length);
				localStorage.setItem('cartFoodId', JSON.stringify(cartFood));
				var buy = JSON.parse(localStorage.getItem('cartFoodId'));
				console.log(buy);

				layer.open({
							content: '取消添加',
							skin: 'msg',
							time: 2 //2秒后自动关闭
						});
			}
		});
	});
</script>



<script>/*添加喜欢，取消喜欢*/
	$(function() {
		$(document).on('touchstart', '.love-icon', function() {
			var boolName = $(this).find('span').hasClass('dianzan105');
			if(boolName) {
				$(this).find('span').removeClass('dianzan105').addClass('dianzan106');
				var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');

				if(localStorage.getItem('loveFoodId') == null) {
					var loveFood = new Array(); //定义购物车里食品id数组
					loveFood.push(foodId);
					console.log(foodId);
					console.log(loveFood);
					localStorage.setItem('loveFoodId', JSON.stringify(loveFood));
				} else {
					var loveFood = JSON.parse(localStorage.getItem('loveFoodId'));
					loveFood.push(foodId);
					localStorage.setItem('loveFoodId', JSON.stringify(loveFood));
					console.log(loveFood, loveFood.length);
				}

				layer.open({
					content: '收藏成功',
					skin: 'msg',
					time: 2 //2秒后自动关闭
				});

			} else {
				$(this).find("span").removeClass('dianzan106').addClass('dianzan105');
				
				var foodId = $(this).parents('li.mui-table-view-cell').attr('data-id');
				var loveFood = JSON.parse(localStorage.getItem('loveFoodId'));
				
				console.log(loveFood);

				Array.prototype.removeByValue = function(val) {
					for(var i = 0; i < this.length; i++) {
						if(this[i] == val) {
							this.splice(i, 1);
							break;
						}
					}
				} //给数组构造一个方法，删除数组中指定的元素

				loveFood.removeByValue(foodId);
				localStorage.setItem('loveFoodId', JSON.stringify(loveFood));
				
				var show = JSON.parse(localStorage.getItem('loveFoodId'));
				console.log(show);

				layer.open({
					content: '取消收藏',
					skin: 'msg',
					time: 2 //2秒后自动关闭
				});
			}
		});
	});
</script>

<script>/*首页我要(接单(带餐)*/
	$(function() {
		$(document).on('touchstart', '.w-want-accept', function() {
			var btn = $(this);
			var openId = $('.mui-content').attr('data-id');
			var orderId = $(this).attr('data-id');
			var urlajax = '/api/order/taken/' + orderId + '?openid=' + openId;

			$.get(urlajax, function(data) {
				if(data == 'success') {
					btn.parent().parent().parent().slideUp();
				}
			});
		});
	});
</script>

<script>/*处理上左菜单重叠问题*/
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

	function select_canteen(index){
			var canteen = JSON.parse(localStorage.getItem('canteens'));
			var canteenId = canteen[index].id;;
			var newText = canteen[index].name;
			localStorage.setItem('canteen',JSON.stringify(canteenId));//切换食堂时将对应食堂ID存在本地
			//console.log(JSON.parse(localStorage.getItem('canteen')));
			$('.mui-title').attr('data-id', canteenId);
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

					localStorage.setItem('shopId',JSON.stringify(port[0].id));//切换食堂时将对应食堂ID存在本地
					select_shop(port[0].id);
				}
			});

	}

	/*根据食堂选窗口----根据窗口选菜品*/
	$(function() {
		$(document).on('touchstart', '#canteen-li .mui-table-view-cell', function() {
			mui('.mui-popover').popover('toggle', document.getElementById("openPopover")); //点击食堂名称收起povper
			
			if($('.mui-title').find('span.xiajiantou002').hasClass("xiajiantou002")) {
				$('.mui-title').find('span.xiajiantou002').removeClass('xiajiantou002').addClass('youjiantou003');
			} //更改首页首页头部箭头方向

			var index = $(this).find('span.selectDown').parent().index();
			select_canteen(index);
		});
	});
</script>


<script>
function flush_foods(foodAll){

	for(var i = 0; i < foodAll.length; i++) {
		var price = parseFloat(foodAll[i].price*0.01);
		ul = document.createElement('ul');
		ul.className = "w-tab-view mui-table-view";
		ul.innerHTML = '<li class="mui-table-view-cell mui-media" data-id=' + foodAll[i].id + '><img class="mui-media-object mui-pull-left" src="/img/wechat/defalut.jpg"><div class="w-box"><div class="w-menu-left"><p class="menu-name">' + foodAll[i].name + '</p><small class="menu-address">教工食堂</small><p class="menu-number"><span>月售:' + foodAll[i].sold + '</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">' + price + '</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:' + foodAll[i].original_price + '元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></li>';
		var parent = document.body.querySelector('#item1mobile .mui-scroll');
		table = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
		parent.insertBefore(ul, table);

		if(localStorage.getItem('loveFoodId') != null) {
			//提取本地保存的收藏数据跟加载的数据比对---开始
			var compare = JSON.parse(localStorage.getItem('loveFoodId'));
			for(var f = 0; f < compare.length; f++) {
				if(compare[f] == foodAll[i].id) {
					$(ul).find('span.dianzan105').removeClass('dianzan105').addClass('dianzan106');
				}
			}
		}

		if(localStorage.getItem('cartFoodId') != null) {
			//提取本地保存的数据跟加载的数据比对---开始
			var comWith = JSON.parse(localStorage.getItem('cartFoodId'));
			for(var k = 0; k < comWith.length; k++) {
				if(comWith[k] == foodAll[i].id) {
					$(ul).find('span.jiahao108').removeClass('jiahao108').addClass('duigou506');
				}
			}
		}

		function lazyload(fid, fimg){
			var ele = document.createElement("img");
			ele.onload = function(e){
				if(ele.complete){
					$(".mui-table-view-cell.mui-media[data-id='"+fid+"']").find('img')[0].src=fimg;
				}
			};
			ele.src = fimg;
		}
		
		var timerId = setTimeout(lazyload(foodAll[i].id, foodAll[i].img), 0);
		pushTimeId(timerId);
	}
}

	function select_shop(shopId, bOver = false){
		localStorage.setItem('curshopId', JSON.stringify(shopId));
		//console.log(shopId);
		var ajaxUrl = '/api/food_of_shop/' + shopId;
		clearAtime();
		$('.w-tab-view').remove();
		if(bOver){
			mui('.mui-off-canvas-wrap').offCanvas('show');
		}

		$.ajax({
			url: ajaxUrl,
			dataType: 'json',
			async: true,
			type: 'GET',
			success: function(data) {
				mui('.mui-slider-group #item1mobile .mui-scroll-wrapper').scroll().scrollTo(0,0);
				flush_foods(data);
			}
		});
	}

	/*取窗口食品列表*/
	$(function() {
		$(document).on('touchstart', '.portName', function() {
			var shopId = $(this).find('span').attr('data-id');
			select_shop(shopId, true);
		});
	});


	$(function(){
		$('.mui-pull-loading').text('没有更多了');
	})

</script>

<script>
	$(function(){
		var timeArr = new Array();
		localStorage.setItem('timeid',JSON.stringify(timeArr));
	})
</script>
@stop