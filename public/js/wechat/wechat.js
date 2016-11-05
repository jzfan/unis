	mui.init();
	mui('body').on('tap','a',function(){document.location.href=this.href;}); 
	$(function(){
	 $('#aaa').on('touchstart',function(){
		mui('.mui-off-canvas-wrap').offCanvas('show');
	  })
	});
	
    $(function(){
    	$('.mui-title').on('touchstart',function(){
    		mui('.mui-popover').popover('toggle',document.getElementById("openPopover"));
    		$('#arrow').removeClass('icon-003youjiantou').addClass('icon-002xiajiantou');
    	})
    });
	
	$(function(){
		$('.mui-table-view.mui-table-view-radio .mui-table-view-cell').on('touchstart',function(){
			var newText = $(this).text();
			$('.w-bar .mui-title .address-name').text(newText);
		})
	});
