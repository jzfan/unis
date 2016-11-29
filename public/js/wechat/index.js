	mui('body').on('tap', 'a', function() {
		document.location.href = this.href;
	});

	/*购物车数量提取*/
	if(localStorage.getItem('buyCart') == null) {
		localStorage.setItem('buyCart', '0');
	}
	$('.w-badge').text(parseInt(localStorage.getItem('buyCart')));

	/*进入页面请求用户id并存在本地*/
	$(function(){
		$.ajax({
			url: '/wechat/user',
			dataType: 'json',
			async: true,
			type: 'GET',
			success: function(data) {
				localStorage.setItem('openid',JSON.stringify(data.wechat_openid));
			}
		});
	})



	/*首页保存在本地的数据比对函数*/
	function compare(foodCom){
		if(localStorage.getItem('loveFoodId') != null) {
			//提取本地保存的收藏数据跟加载的数据比对---开始
			var compare = JSON.parse(localStorage.getItem('loveFoodId'));
			for(var f = 0; f < compare.length; f++) {
				if(compare[f] == foodCom) {
					jQuery(ul).find('span.dianzan105').removeClass('dianzan105').addClass('dianzan106');
				}
			}
		}

		if(localStorage.getItem('cartFoodId') != null) {
			//提取本地保存的数据跟加载的数据比对---开始
			var comWith = JSON.parse(localStorage.getItem('cartFoodId'));
			for(var k = 0; k < comWith.length; k++) {
				if(comWith[k] == foodCom) {
					jQuery(ul).find('span.jiahao108').removeClass('jiahao108').addClass('duigou506');
				}
			}
		}
	}


	/*首页根据窗口id选择食品*/
	function  portFoodList(){
		var shopId  = JSON.parse(localStorage.getItem('shopId'));//取当前点击的窗口id
			var portUrl = '/api/food_of_shop/'+shopId;
			$.ajax({
				url: portUrl,
				dataType: 'json',
				async: true,
				type: 'GET',
				success: function(data) {
					jQuery('#item1mobile .mui-scroll ul').remove();//插入数据之前清空容器
					for(var i = 0; i < data.length; i++) {
						var price = parseFloat(data[i].price*0.01);
						var original = parseFloat(data[i].original_price*0.01);
						ul = document.createElement('ul');
						ul.className = "w-tab-view mui-table-view";
						ul.innerHTML = '<li class="mui-table-view-cell mui-media" data-id=' + data[i].id + '><img class="mui-media-object mui-pull-left" src='+data[i].img+'><div class="w-box"><div class="w-menu-left"><p class="menu-name">' + data[i].name + '</p><small class="menu-address">'+data[i].canteen+'</small><p class="menu-number"><span>月售:' + data[i].sold + '</span></p><p class="menu-footer"><span class="vule-icon">￥</span><span class="vue-number">' + price + '</span>&nbsp;&nbsp;&nbsp;<span class="origin-value">原价:' + original + '元</span></p></div><div class="w-menu-right"><div class="love-icon"><span class="mui-icon iconfont dianzan105"></span></div><div class="add-icon"><span class="mui-icon iconfont jiahao108"></span></div></div></div></li>';
						var parent = document.body.querySelector('#item1mobile .mui-scroll');
						table = document.body.querySelector('#item1mobile .mui-pull-bottom-tips');
						parent.insertBefore(ul, table);

						compare(data[i].id);//调用数据比对函数			
					}

				}
			});
	}



	/*进入页面加载带餐*/
	$(function() {
		setTimeout(function(){
			var openid = JSON.parse(localStorage.getItem('openid'));
			var takeUrl = '/api/order/untaken/?openid='+openid+'&page=1&limit=10';
			$.ajax({
				url: takeUrl,
				dataType: 'json',
				async: true,
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
		},200);
		
	});





	/*带餐下拉刷新上拉加载开始*/
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
						var openid = JSON.parse(localStorage.getItem('openid'));
						var urlajax = '/api/order/untaken/?openid='+openid+'&page=1&limit=15';
						setTimeout(function() {
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
					}
				},
				up: {
					callback: function() {
						page++;
						var openid = JSON.parse(localStorage.getItem('openid'));
						var urlajax = '/api/order/untaken/?openid='+openid+'&page='+page+'&limit=10';
						var self = this;
						setTimeout(function() {
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
					}
				}
			});
		});
	})(mui);



	/*添加到购物车，取消*/
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


	/*添加喜欢，取消喜欢*/
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


	/*首页我要(接单(带餐)*/
	$(function() {
		$(document).on('touchstart', '.w-want-accept', function() {
			var btn = $(this);
			var openId = JSON.parse(localStorage.getItem('openid'));
			var orderId = $(this).attr('data-id');
			var urlajax = '/api/order/taken/' + orderId + '?openid=' + openId;

			$.get(urlajax, function(data) {
				if(data == 'success') {
					btn.parent().parent().parent().slideUp();
				}
			});
		});
	});




	/*没有更多了*/
	$(function(){
		$('.mui-pull-loading').text('没有更多了');
	})


