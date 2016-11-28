mui.init();
/*会造成订单页点击消失*/
/*mui('body').on('tap','a',function() {document.location.href=this.href;});*/
$(function() {
	$('#home-left-icon').on('touchstart',function() {
		mui('.mui-off-canvas-wrap').offCanvas('show');
	});
});


//弹出消息函数
$(function() {
	function msgInfo(msgEle,msgText) {
		$(msgEle).on('touchstart',function() {
			layer.open({
				content: msgText,
				skin: 'msg',
				time: 2 //2秒后自动关闭
			});
		});
	};

	msgInfo('.w-respone-btn','感谢您的反馈！');
	/*意见反馈*/
	msgInfo('.w-want-accept-native','确认成功');
	/*我的订单状态*/
});

/*定位*/
$(function() {
	$('.present-location').on('tap',function() {
		$('.present-location').html('<span class="mui-icon iconfont dingwei104">'+'正在定位中...');
	});
});

/*编辑*/
$(function() {
	$('.write-del').on('touchstart',function() {
		_this =$(this);
		$('.w-location-group .mui-badge .location-ico').removeClass('duigou506').addClass('shanchu505');
		setTimeout(function(){
			_this.html('<span style="color:#fff;" id="complete">完成</span>');
		},300)
	});
});

$(function(){
	$('.write-del').on('touchstart',function(){
		if($("#complete").text() =='完成'){
			window.location.href = "/wechat/address";
		}
	})
})

//滑动删除函数
$(function() {
	function comFun(eleName,parName) {
	 	$(document).on('touchstart',eleName,function() {
	 		$(this).parents(parName).fadeOut();
	 	});
	};
	
	comFun('.w-cash-aaa .mui-disabled','ul');//我的余额滑动删除
	comFun('.w-card .mui-disabled','div.w-card');//我的消息滑动删除
	/*comFun('.my-menu .mui-disabled','ul.my-menu');*///我的订单滑动删除
	comFun('.w-tab-view li .mui-disabled','li.mui-media');//我的收藏滑动删除
});

/*删除收藏*/
$(function() {
	$(document).on('touchstart','.shan-icon',function() {
		$(this).parents("li.mui-table-view-cell").fadeOut();
		layer.open({
		    content: '删除成功'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		});
	});
});

$(function() {
	/*地址请求失败的时候显示的默认图像*/
	$("img").one("error", function() {
	 $(this).attr("src", "/img/wechat/defalut.jpg");
	});
});