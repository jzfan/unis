@extends('wechat.layout')

@section('title')
收货地址
@stop

@section('content')
	<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
		      <h1 class="mui-title">选择收货地址</h1>
		      <span class="w-address-save mui-pull-right">保存地址</span>
	</header>

	<section class="w-address-check">
				<form class="w-address-wrap mui-input-group">
				    <div class="mui-input-row">
				        <label>武汉</label>
				        <input type="text" class="mui-input-clear" placeholder="请输入内容" name>
				    </div>
				</form>
	</section>

	<section>
		<div class="present-location"><span class="mui-icon iconfont dingwei104"></span>&nbsp;点击定位当前位置</div>
		<div class="present-address-all">
			<span><span class="mui-icon iconfont zhinanzhen503"></span>&nbsp;以往地址</span> <span class="write-del mui-pull-right"><span class="mui-icon iconfont bianji504"></span>&nbsp;编辑</span>
		</div>

		<div>
			<ul class="w-location-group mui-table-view">
			    
			</ul>
		</div>
	</section>

   <!-- 重新选择地址 -->
	<section class="check-address">
		<div class="w-entry">
	</div>
	<form class="w-input-group mui-input-group" id="info" action='/wechat/user' method='POST'>
	{!! csrf_field() !!}
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
		    	<input type="text" class="" value="江汉大学" tabIndex="1" >
		    	<input type="hidden" name='school_id' value="2" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

    	<ul class="mui-table-view mui-table-view-radio" id="school-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
		</ul>

		


    	<div class="mui-input-row" id="school-area">
	        <label>校区:</label>
		    	<input type="text" class="" placeholder="选择校区" tabIndex="2" required>
		    	<input type="hidden" name='campus_id' value="" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

    	<ul class="mui-table-view mui-table-view-radio" id="area-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
			
		</ul>

    	<div class="mui-input-row" id="school-room">
	        <label>宿舍:</label>
		    	<input type="text" class="" placeholder="选择宿舍楼" tabindex="3" required>
		    	<input type="hidden" name="dorm_id" value="" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


    	<ul class="mui-table-view mui-table-view-radio" id="room-fix">
			<li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li>
		</ul>


	    <div class="w-clear mui-input-row">
	        <label>寝室:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入寝室号" tabindex="4" name="room_number" required>
	        <input type="hidden"  value="" class="trueVal">
	        <input type="hidden" name='id' id='user'>
	        <input type="hidden" name='email' id='email'>
	        <input type="hidden" name='avatar' id="avatar">
	        <input type="hidden" name='nickname' id="nickname">



	    </div>

	    <button type="submit" class="w-entry-btn mui-btn mui-btn-danger" id="btn">完成</button>
	</form>

	</section>

@stop
@section('js')
<script src="/lib/pusher/main.js"></script>

<script>
		/*获取用户openId*/
			$(function(){
				$.ajax({
					url:'/wechat/user',
					dataType:'json',
					async:false,
					data:{},
					type:'GET',
					success:function(data){
						$('.w-about-uniserve').attr('data-id',data.wechat_openid);
					}
				});
			})
		</script>
<script>

/*保存地址*/
	$(function(){
		$(document).on('touchstart','.w-address-save',function(){
			var openId = $('.w-about-uniserve').attr('data-id');
			var urlajax = '/api/address/?openid='+openId; 
			$.ajax({
				url:urlajax,
				dataType:'json',
				async:true,
				data:{},
				type:'POST',
				success:function(data){
					layer.open({
					    content: '保存成功'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });
				},
				error:function(){
					layer.open({
					    content: '保存失败'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });
				}
			});
		})
	});



/*删除地址*/
	$(function(){
		$(document).on('touchstart','.w-location-group .mui-table-view-cell',function(){
			$(this).find("span").removeClass('duigou506');
			if($(this).find("span").hasClass('shanchu505')){
				var _this = $(this);
				var openId = $('.w-about-uniserve').attr('data-id');
				var addressId = $('.mui-badge').attr('data-id');
				var urlajax = '/api/address/'+addressId+'?openid='+openId;
				$.ajax({
				url:urlajax,
				dataType:'json',
				async:true,
				type:'delete',
				success:function(data){
					_this.fadeOut();
					/*layer.open({
					    content: '删除成功'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });*/
				},
				error:function(){
					/*layer.open({
					    content: '删除失败'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });*/
				}
			});

			}
		})
	});

/*选择地址*/
	$(function(){
		$(document).on('tap','.w-location-group .mui-table-view-cell',function(){
				$('.w-location-group .mui-badge .location-ico').removeClass('duigou506');
				$(this).find('span.location-ico').addClass('duigou506');
				var openId = $('.w-about-uniserve').attr('data-id');
				var addressId = $('.mui-badge').attr('data-id');
				var urlajax = '/api/address/'+addressId+'?openid='+openId;
				$.ajax({
				url:urlajax,
				dataType:'json',
				async:true,
				data:{},
				type:'put',
				success:function(data){
				/*	console.log('选择成功');
					layer.open({
					    content: '选择成功'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });*/
				},
				error:function(){
					/*console.log('选择失败');
					layer.open({
					    content: '选择失败'
					    ,skin: 'msg'
					    ,time: 2 //2秒后自动关闭
					  });*/
				}
			});

		})
	})


/*请求地址列表*/
	$(function(){
		var openId = $('.w-about-uniserve').attr('data-id');
		var urlajax ='/api/address?openid='+openId;

     $.ajax({
            url:urlajax,
            dataType:'json',
            async:true,
            type:'GET',
            success:function(data){
            	for(var i=0;i<data.length;i++){
            		var li = document.createElement('li');
	              	  li.className = 'mui-table-view-cell';
	              	  li.innerHTML = data[i].text+'<span class="mui-badge" data-id='+data[i].id+'><span class="location-ico mui-icon iconfont  mui-pull-right" data-id='+data[i].status+'></span></span>';
	              	  ul = document.body.querySelector('.w-location-group');
	              	  ul.appendChild(li);
	              	  $('.mui-badge .location-ico').each(function(){
	              	  		if($(this).attr('data-id') == 1){
	              	  			$(this).addClass('duigou506');
	              	  		}
	              	  });
	              	
            	}

            }
      	});
  	});


</script>





<script>
	/*选择学校*/
	$(function(){
		$(document).on('touchstart','#school input',function(){
			$('#school-fix li').not('.school-search').remove();//重选学校时清空li列表，保留搜索li
			$('#school-fix').fadeIn();
			$.get('/api/school',function(data){
				for(var i=0;i<data.length;i++){
			$('#school-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
				$('#school-fix li').not(".school-search").on('tap',function(){
						var which = $(this).find('span.mui-navigate-right').text();
						var IDs = $(this).find('span.sid').text();
						$('#school input').val(which);
						$('#school input.trueVal').val(parseInt(IDs));
						$('#school label').html('学校:'+'<span class="schoolId" style="visibility: hidden;">'+IDs+'</span>');
						$('#school-fix').fadeOut();
					});
				}
			})
		});
		
	});

	/*根据学校选择校区*/
		$(function(){
				$(document).on('touchstart','#school-area',function(){
					$('#area-fix li').not('.school-search').remove();
					$('#area-fix').fadeIn();
					var sid  = parseInt($('.schoolId').text());
					var urlajax = "/api/campuses_of_school/2"+sid;
					$.get(urlajax,function(data){
						for(var i=0;i<data.length;i++){
							$('#area-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
							$('#area-fix li').not(".school-search").on('touchstart',function(){
								var which = $(this).find('span.mui-navigate-right').text();
								var IDs = $(this).find('span.sid').text();
								$('#school-area input').val(which);
								$('#school-area input.trueVal').val(parseInt(IDs));
								$('#school-area label').html('校区:'+'<span class="schoolArea" style="visibility: hidden;">'+IDs+'</span>');
								$('#area-fix').fadeOut();
							});
						}

					});
				});
				
			});


	/*根据校区选择宿舍*/
	$(function(){
			$(document).on('touchstart','#school-room input',function(){
				$('#room-fix li').not('.school-search').remove();
				$('#room-fix').fadeIn();
				var sid  = parseInt($('.schoolArea').text());
					var urlajax = "/api/dorms_of_campus/"+sid;
					$.get(urlajax,function(data){
						for(var i=0;i<data.length;i++){
							$('#room-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
							$('#room-fix li').not(".school-search").on('touchstart',function(){
								var which = $(this).find('span.mui-navigate-right').text();
								var IDs = $(this).find('span.sid').text();
								$('#school-room input').val(which);
								$('#school-room input.trueVal').val(parseInt(IDs));
								$('#school-area label').html('宿舍:'+'<span class="schoolRoom" style="visibility: hidden;">'+IDs+'</span>');
								$('#room-fix').fadeOut();
							});
						}

					});
			});
		});

	</script>

	

	<script>
	/*搜索功能开始*/
	$('#school-fix .win-search').keyup(function(){
		$('#school-fix li').not('.school-search').remove();//重选学校时清空li列表，保留搜索li
		$('#school-fix').fadeIn();
		var searchText = $('#school-fix .win-search').val();
		var searchUrl = '/api/school/like/'+searchText;
		$.ajax({
			url:searchUrl,
			dataType:'json',
			async:true,
			type:'GET',
			success:function(data){
				arrs = data.schools;
				console.log(arrs);
				for(var j=0;j<arrs.length;j++){
					console.log(arrs[j].name);
					$('#school-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+arrs[j].name+'</span><span class="sid" style="visibility: hidden;">'+arrs[j].id+'</span></li>');
					$('#school-fix li').not(".school-search").on('tap',function(){
					var which = $(this).find('span.mui-navigate-right').text();
					var IDs = $(this).find('span.sid').text();
					$('#school input').val(which);
					$('#school input.trueVal').val(parseInt(IDs));
					$('#school label').html('学校:'+'<span class="schoolId" style="visibility: hidden;">'+IDs+'</span>');
					$('#school-fix').fadeOut();
					});

				}
			}
		});
	});
	/*搜索功能结束*/




	/*拿用户信息*/
	$(function(){
     $.ajax({
            url:'/wechat/wx_user',
            dataType:'json',
            async:true,
            type:'GET',
            success:function(data){
              $('#user').val(data.id);
              $('#email').val(data.email);
              $('#avatar').val(data.avatar);
              $('#nickname').val(data.nickname);
            }
      	});
  	});

	</script>




@stop