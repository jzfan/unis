	mui.init();
	/*会造成订单页点击消失*/
	/*mui('body').on('tap','a',function(){document.location.href=this.href;}); */

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
	function collect(coName,ifName,haveName,coText1,coText2){
		$(document).on('touchstart',coName,function(){
			var boolName = $(this).find('span').hasClass(ifName);
			if(boolName){
				$(this).find('span').removeClass(ifName).addClass(haveName);
				layer.open({
				    content: coText1
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}
			else{
				$(this).find("span").removeClass(haveName).addClass(ifName);
				layer.open({
				    content: coText2
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  });
			}
		})
	};
	collect('.love-icon','dianzan105','dianzan106','收藏成功','取消收藏');
	collect('.add-icon','jiahao108','duigou506','添加成功','取消添加');
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
	msgInfo('.w-entry-btn','信息提交成功');/*入口表单*/
	msgInfo('.w-want-accept','购买成功');/*购物车*/
	msgInfo('.w-about-uniserve .w-address-save','保存成功');/*保存地址*/
	msgInfo('.w-respone-btn','感谢您的反馈！');/*意见反馈*/
})



/*选择时间*/
$(function(){
	var dtPicker = new mui.DtPicker('');
	$('.app-time li').on('touchstart',function(time){
		var _this = $(this);
		dtPicker.show(function (selectItems) { 
			_this.html('预约时间：'+selectItems.text+'<span class="mui-icon iconfont youjiantou003 mui-pull-right">');
    })
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
		$(document).on('touchstart','.w-location-group .mui-table-view-cell',function(){
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


//滑动删除函数
	$(function(){
	 function comFun(eleName,parName){
	 	$(document).on('touchstart',eleName,function(){
	 		$(this).parents(parName).fadeOut();
	 	})
		};
		comFun('.w-cash-aaa .mui-disabled','ul');//我的余额滑动删除
		comFun('.w-card .mui-disabled','div.w-card');//我的消息滑动删除
		comFun('.my-menu .mui-disabled','ul.my-menu');//我的订单滑动删除
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


/*选择学校*/
	$(function(){
		$('#school input').on('touchstart',function(){
			$('#school-fix').fadeIn();
			var searchText = $('.win-search').val();
			$.get('http://api.bing.com/qsonhs.aspx?q='+searchText,function(d){
				var d = d.AS.Results[0].Suggests;
				var html = '';
				for(var i=0;i<d.length;i++){
				html = '<li class="mui-table-view-cell">'+'<span class="mui-navigate-right">'+'d[i].Txt'+'</span></li>'
				}
				$('#school-fix').html(html);
			})
		});
		$('#school-fix li').not(".school-search").on('touchstart',function(){
			var which = $(this).find('span').text();
			$('#school input').val(which);
			$('#school-fix').fadeOut();
		});
	});

/*选择校区*/
$(function(){
		$('#school-area input').on('touchstart',function(){
			$('#area-fix').fadeIn();
		});
		$('#area-fix li').not(".school-search").on('touchstart',function(){
			var which = $(this).find('span').text();
			$('#school-area input').val(which);
			$('#area-fix').fadeOut();
		});
	});

/*选择宿舍*/
$(function(){
		$('#school-room input').on('touchstart',function(){
			$('#room-fix').fadeIn();
		});
		$('#room-fix li').not(".school-search").on('touchstart',function(){
			var which = $(this).find('span').text();
			$('#school-room input').val(which);
			$('#room-fix').fadeOut();
		});
	});