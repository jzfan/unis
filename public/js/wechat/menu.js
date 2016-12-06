	mui('body').on('tap', 'a', function() {
		document.location.href = this.href;
	});

	
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


	/*首页根据宿舍id筛选订单*/
	function  menuList(){
		var dormId  = JSON.parse(localStorage.getItem('dormId'));//取当前点击的窗口id
			var portUrl = '/api/orders/?openid='+JSON.parse(localStorage.getItem('openid'))+'&dorm_id='+dormId;
			$.ajax({
				url: portUrl,
				dataType: 'json',
				async: true,
				type: 'GET',
				success: function(data) {
					jQuery('#item2mobile .mui-scroll ul').remove();//插入数据之前清空容器
					var takeFood = data.data;
					for(var i = 0; i < takeFood.length; i++) {
						var total = parseFloat(takeFood[i].total);
						div = document.createElement('div');
						div.className = "w-finshed-menu";
						div.innerHTML = '<ul class="w-cash-all mui-table-view"><li class="mui-table-view-cell">合计总额:<span class="mui-pull-right">' + total + '元(含服务费)</span></li></ul><ul class="w-home-tab mui-table-view"><li class="mui-table-view-cell">订单编号：' + takeFood[i].order_no + '<span class="w-hold mui-pull-right">' + takeFood[i].status + '</span></li><li class="mui-table-view-cell"><div class="telShow">联系电话：<a href="tel:' + takeFood[i].orderer.phone + '">' + takeFood[i].orderer.phone + '</a></div></li><li class="mui-table-view-cell">联系姓名：' + takeFood[i].orderer.name + '</li><li class="mui-table-view-cell">配送地址：' + takeFood[i].address + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell">下单时间：' + takeFood[i].paid_at + '&nbsp;&nbsp;&nbsp;&nbsp;预约时间：' + takeFood[i].appointment_at + '</li></ul><ul class="mui-table-view"><li class="mui-table-view-cell"><button class="w-want-accept"  data-id=' + takeFood[i].id + '>我要带餐</button></li></ul>';

						var table = document.body.querySelector('#item2mobile .mui-pull-bottom-tips');
						var parent = document.body.querySelector('#item2mobile .mui-scroll');
						parent.insertBefore(div, table);
					}

				}
			});
	}



	/*进入页面加载带餐*/
	$(function() {
		setTimeout(function(){
			var openid = JSON.parse(localStorage.getItem('openid'));
			var takeUrl = '/api/orders/'+JSON.parse(localStorage.getItem('canteen'))+'/orders?openid='+JSON.parse(localStorage.getItem('openid'));//接口改为根据食堂取所有的订单
			$.ajax({
				url: takeUrl,
				dataType: 'json',
				async: true,
				type: 'GET',
				success: function(data) {
					var takeFood = data.data;
					for(var i = 0; i < takeFood.length; i++) {
						var total = parseFloat(takeFood[i].total);
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


