@extends('wechat.layout')

@section('title')
绑定地址
@stop

@section('content')
	<div class="w-entry">
		<div class="w-logo-wrap"><img src="/img/wechat/logo.png" alt=""></div>
	</div>
	<form class="w-input-group mui-input-group" id="info" action="/wechat/user" method="post">
	{!! csrf_field() !!}
		<div class="mui-input-row" id="school">
	        <label>学校:</label>
		    	<input type="text" class="" placeholder="选择学校" value="武汉理工大学" tabIndex="1" disabled>
		    	<input type="hidden" name='school_id' value="" class="trueVal">
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
			<!-- <li class="school-search mui-table-view-cell">
				<input type="search" class="win-search" placeholder="搜索">
			</li> -->
			
		</ul>


    	<div class="mui-input-row" id="school-room">
	        <label>宿舍:</label>
		    	<input type="text" class="" placeholder="选择宿舍楼" tabindex="3" required>
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
	        <input type="number" class="mui-input-clear" placeholder="输入寝室号" tabindex="4" name="room_number" required>
	        <input type="hidden"  value="" class="trueVal">

	    </div>

	    <div class="w-clear mui-input-row">
	        <label>手机:</label>
	        <input type="number" class="mui-input-clear" placeholder="输入手机号" tabindex="5" id="telephone"  name="phone" required>
	        <input type="hidden"  value="" class="trueVal">
	    </div>
	    <button type="submit" class="w-entry-btn mui-btn mui-btn-danger">完成</button>
	</form>

@stop

@section('js')
	<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
	<script>
	/*选择学校*/
	$(function(){
		$(document).on('touchstart','#school input',function(){
			$('#school-fix li').not('.school-search').remove();//重选学校时清空li列表，保留搜索li
			$('#school-fix').fadeIn();
			$.get('/api/school',function(data){
				for(var i=0;i<data.length;i++){
			$('#school-fix').append('<li class="mui-table-view-cell"><span class="mui-navigate-right">'+data[i].text+'</span><span class="sid" style="visibility: hidden;">'+data[i].id+'</span></li>');
				/*搜索功能开始*/
				$('#school-fix .win-search').keyup(function(){
					var searchText = $('.win-search').val();
					var ccc = $('#school-fix li').not(".school-search").find('span.mui-navigate-right');
					for(var j=0;j<ccc.length;j++){
						console.log(ccc[j].innerHTML)
						/*if(true){
							$('#school-fix li').not(".school-search")[j].remove();
						}*/
						
					}
				});
				/*搜索功能结束*/
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

	/*选择校区*/
		$(function(){
				$(document).on('touchstart','#school-area input',function(){
					$('#area-fix li').not('.school-search').remove();
					$('#area-fix').fadeIn();
					var sid  = parseInt($('.schoolId').text());
					var urlajax = "/api/campuses_of_school/"+sid
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


	/*选择宿舍*/
	$(function(){
			$(document).on('touchstart','#school-room input',function(){
				$('#room-fix li').not('.school-search').remove();
				$('#room-fix').fadeIn();
				var sid  = parseInt($('.schoolArea').text());
					var urlajax = "/api/dorms_of_campus/"+sid
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




	/*搜索功能*/
	</script>
@stop
