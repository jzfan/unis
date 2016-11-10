	mui.init();

	mui('body').on('tap','a',function(){document.location.href=this.href;}); 

	$(function(){
	 $('#home-left-icon').on('touchstart',function(){
		mui('.mui-off-canvas-wrap').offCanvas('show');
	  })
	});
	
    $(function(){
    	$('.mui-title').on('touchstart',function(){
    		
    		mui('.mui-popover').popover('toggle',document.getElementById("openPopover"));
    		if($(this).find("span#arrow").hasClass("youjiantou003")){
    			$('#arrow').removeClass('youjiantou003').addClass('xiajiantou002');
    		}

    		else{
    			$('#arrow').removeClass('xiajiantou002').addClass('youjiantou003');
    		}
    	})
    });

	
	$(function(){
		$('.mui-title').on('touchstart',function(){
			var htop =	$('.w-popover').height()+44+'px';
			$('.mui-backdrop').css('top',htop);
		})
	});


	$(function(){
		$('.mui-table-view.mui-table-view-radio .mui-table-view-cell').on('touchstart',function(){
			var newText = $(this).text();
			$('.w-bar .mui-title .address-name').text(newText);
		})
	});

	$(function(){
		$('.love-icon').on('touchstart',function(){
			if($(this).find("span").hasClass("dianzan105")){
				$(this).find("span").removeClass("dianzan105").addClass('dianzan106');
				layer.open({
				    content: '收藏成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}
			else{
				$(this).find("span").removeClass("dianzan106").addClass('dianzan105');
				layer.open({
				    content: '取消收藏'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}
			
		});

		$('.add-icon').on('touchstart',function(){
			if($(this).find("span").hasClass("jiahao108")){
				$(this).find("span").removeClass("jiahao108").addClass('duigou506');
				layer.open({
				    content: '添加成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}
			else{
				$(this).find("span").removeClass("duigou506").addClass('jiahao108');
				layer.open({
				    content: '取消添加'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}

		});
	})


	$(function(){
		$('#school').on('touchstart',function(){
			mui('.mui-popover').popover('toggle',document.getElementById("openPopover"));
		})
	})


	$(function(){
		$('.popover-school .mui-table-view.mui-table-view-radio .mui-table-view-cell').on('touchstart',function(){
			var newVal = $(this).text();
			$('#school input').val();
			$('#school input').val(newVal);
		})
	});



/*入口填写表单验证*/

	$(function(){
		$('.w-entry-btn').on('touchstart',function(){
			layer.open({
				    content: '填写成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
		})
	})




/*购物车*/
	$(function(){
		$('.w-want-accept').on('tap',function(){
			layer.open({
				    content: '购买成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
		});
	})


/*选择时间*/
$(function(){
	var dtPicker = new mui.DtPicker();
	$('.app-time').on('touchstart',function(){
		dtPicker.show(function (selectItems) { 
    })
	})
});


/*保存地址*/
	$(function(){
		$('.w-about-uniserve .w-address-save').on('tap',function(){
			layer.open({
				    content: '保存成功'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
		})
	});



/*定位*/
	$(function(){
		$('.present-location').on('tap',function(){
			$('.present-location').html('<span class="mui-icon iconfont dingwei104">'+'正在定位中...');
		})
	})

/*编辑*/
	$(function(){
		$('.write-del').on('touchstart',function(){
			$(this).text('完成');
			$('.w-location-group .mui-badge .location-ico').removeClass('duigou506').addClass('shanchu505');
		})
	})


/*删除地址*/
	$(function(){
		$('.w-location-group .mui-table-view-cell').on('touchstart',function(){
			$(this).find("span").removeClass('duigou506');
			if($(this).find("span").hasClass('shanchu505')){
				$(this).fadeOut();
			}
		})
	});

/*选择地址*/
	$(function(){
		$('.w-location-group .mui-table-view-cell').on('touchstart',function(){
				$('.w-location-group .mui-badge .location-ico').removeClass('duigou506');
				$(this).find('span.location-ico').addClass('duigou506');
		})
	})


/*意见反馈*/

	$(function(){
		$('.w-respone-btn').on('touchstart',function(){
			layer.open({
				    content: '感谢您的反馈！'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
		})
	})

/*我的余额滑动删除*/
	$(function(){
		$('.w-cash-aaa .mui-disabled').on('touchstart',function(){
			$(this).parents("ul").fadeOut();
		})
	});

/*我的消息滑动删除*/
	$(function(){
		$('.w-card .mui-disabled').on('touchstart',function(){
			$(this).parents("div.w-card").fadeOut();
		})
	});


