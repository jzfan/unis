	mui.init();
	/*会造成订单页点击消失*/
	/*mui('body').on('tap','a',function(){document.location.href=this.href;}); */

	$(function(){
		$('#home-left-icon').on('touchstart',function(){
			mui('.mui-off-canvas-wrap').offCanvas('show');
		});
	});

	$(function(){
		$('#home-left-icon').on('touchstart',function(){
			console.log($('.mui-popover'));
		})
	})
	



//弹出消息函数
$(function(){
	function msgInfo(msgEle,msgText){
		$(msgEle).on('touchstart',function(){
			layer.open({
				    content: msgText
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
		})
	};
	/*msgInfo('.w-entry-btn','信息提交成功');*//*入口表单*/
	/*msgInfo('.w-want-accept','购买成功');*//*购物车*/
	msgInfo('.w-about-uniserve .w-address-save','保存成功');/*保存地址*/
	msgInfo('.w-respone-btn','感谢您的反馈！');/*意见反馈*/
	msgInfo('.w-want-accept-native','确认成功');/*我的订单状态*/
})


/*定位*/
	$(function(){
		$('.present-location').on('tap',function(){
			$('.present-location').html('<span class="mui-icon iconfont dingwei104">'+'正在定位中...');
		})
	})

/*编辑*/
	$(function(){
		$('.write-del').on('touchstart',function(){
			_this =$(this);
			$('.w-location-group .mui-badge .location-ico').removeClass('duigou506').addClass('shanchu505');
			setTimeout(function(){
				_this.html('<a href="" style="color:#fff;">完成</a>');
			},200)
		})
	})



//滑动删除函数
	$(function(){
	 function comFun(eleName,parName){
	 	$(document).on('touchstart',eleName,function(){
	 		$(this).parents(parName).fadeOut();
	 	})
		};
		comFun('.w-cash-aaa .mui-disabled','ul');//我的余额滑动删除
		comFun('.w-card .mui-disabled','div.w-card');//我的消息滑动删除
		/*comFun('.my-menu .mui-disabled','ul.my-menu');*///我的订单滑动删除
		comFun('.w-tab-view li .mui-disabled','li.mui-media');//我的收藏滑动删除
	});

/*删除收藏*/
	$(function(){
		$(document).on('touchstart','.shan-icon',function(){
				$(this).parents("li.mui-table-view-cell").fadeOut();
				layer.open({
				    content: '删除成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			});
	})



$(function(){

	$("img").one("error", function(){
	 $(this).attr("src", "/img/wechat/defalut.jpg");
	});

})