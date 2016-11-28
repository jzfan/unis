@extends('wechat.layout')

@section('title')
收货地址
@stop

@section('content')
<header class="w-about-uniserve  mui-bar-nav mui-action-menu">
	      <h1 class="mui-title">新建地址</h1>
</header>


<!-- 重新选择地址 -->
<section class="check-address" style="margin-top: 20px;">

<form class="w-input-group mui-input-group" id="info" style="background-color: #efeff4;">
	{!! csrf_field() !!}
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
		    	<input type="text" class="" value="江汉大学 (其他学校敬请期待...)" tabIndex="1" disabled>
		    	<input type="hidden" name='school_id' value="2" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

		


    	<div class="mui-input-row" id="school-area">
	        <label>校区:</label>
		    	<input type="text" class="" placeholder="选择校区" tabIndex="2" required readonly="readonly">
		    	<input type="hidden" name='campus_id' value="" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>

    	<ul class="mui-table-view mui-table-view-radio" id="area-fix">
			<!-- <li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li> -->
			
		</ul>

    	<div class="mui-input-row" id="school-room">
	        <label>宿舍:</label>
		    	<input type="text" class="" placeholder="选择宿舍楼" tabindex="3" required readonly="readonly">
		    	<input type="hidden" name="dorm_id" value="" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


    	<ul class="mui-table-view mui-table-view-radio" id="room-fix">
			<!-- <li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li> -->
		</ul>


	    <div class="w-clear mui-input-row">
	        <label>寝室:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入寝室号" tabindex="4" name="room_number" required>
	        <input type="hidden"  value="" class="trueVal">
	        <input type="hidden" name='openid' id='openid'>

	    </div>

	    <button type="button" class="w-entry-btn mui-btn mui-btn-danger" id="btn">完成</button>
	</form>


@stop

@section('js')
	<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
	<script>
	/*选择学校*/

	/*根据学校选择校区*/
		$(function(){
			var sid  = parseInt($('.schoolId').text());
			var urlajax = "/api/campuses_of_school/2"  //+sid
			$.get(urlajax,function(data){
						for(var i=0;i<data.length;i++){
							$('#area-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
						}
			});

				$(document).on('touchstart','#school-area',function(){
						$('#area-fix').fadeIn();
				});

				$(document).on('touchstart','#area-fix li',function(){
								var which = $(this).find('span.mui-navigate-right').text();
								var IDs = $(this).find('span.sid').text();
								$('#school-area input').val(which);
								$('#school-area input.trueVal').val(parseInt(IDs));
								$('#school-area label').html('校区:'+'<span class="schoolArea" style="visibility: hidden;">'+IDs+'</span>');
								$('#area-fix').fadeOut();

								setTimeout(function(){
									$('#room-fix li').not('.school-search').remove();
									var sid  = parseInt($('.schoolArea').text());
										var urlajax = "/api/dorms_of_campus/"+sid
										$.get(urlajax,function(data){
											for(var i=0;i<data.length;i++){
												$('#room-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
											}
										});
		
								},0)	
						});
				
			});


	/*根据校区选择宿舍*/
	$(function(){
			$(document).on('touchstart','#school-room input',function(){
				
				$('#room-fix').fadeIn();
				$('#room-fix li').not(".school-search").on('touchstart',function(){
									var which = $(this).find('span.mui-navigate-right').text();
									var IDs = $(this).find('span.sid').text();
									$('#school-room input').val(which);
									$('#school-room input.trueVal').val(parseInt(IDs));
									$('#school-room label').html('宿舍:'+'<span class="schoolRoom" style="visibility: hidden;">'+IDs+'</span>');

									$('#room-fix').fadeOut();
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
				for(var j=0;j<arrs.length;j++){
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


	/*新建地址*/
	$(function(){
		$.ajax({
				url:'/wechat/user',
				dataType:'json',
				async:true,
				data:{},
				type:'GET',
				success:function(data){
					localStorage.setItem('openid',JSON.stringify(data.wechat_openid));
					 $('#openid').val(data.wechat_openid);	
				}
			});

		$('.w-entry-btn').on('touchstart',function(){
			var urlAddress = '/api/address?openid='+JSON.parse(localStorage.getItem('openid'));
			$.post(urlAddress,$('#info').serialize(),function(data){
				if(data == 'success'){

					layer.open({
					    content: '新建成功'
					    ,skin: 'msg'
					    ,time: 1 //2秒后自动关闭
				  	});

					setTimeout(function(){
						window.location.href = '/wechat/address';
					},1000)
				}
			})
		})
	})

	</script>

@stop
