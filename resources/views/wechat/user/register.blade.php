@extends('wechat.layout')

@section('title')
绑定地址
@stop

@section('content')
	<div class="w-entry">
		<div class="w-logo-wrap"><img src="/img/wechat/logo.png" alt=""></div>
	</div>
	<form class="w-input-group mui-input-group" id="info" action='/wechat/user' method='POST'>
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

		</ul>

    	<div class="mui-input-row" id="school-room">
	        <label>宿舍:</label>
		    	<input type="text" class="" placeholder="选择宿舍楼" tabindex="3" required readonly="readonly">
		    	<input type="hidden" name="dorm_id" value="" class="trueVal">
		    	<span class="w-arrow-right mui-icon mui-icon-arrowright"></span>
    	</div>


    	<ul class="mui-table-view mui-table-view-radio" id="room-fix">
    	
		</ul>


	    <div class="w-clear mui-input-row">
	        <label>寝室:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入寝室号" tabindex="4" name="room_number" required>
	        <input type="hidden"  value="" class="trueVal">

	    </div>

	    <div class="w-clear mui-input-row">
	        <label>手机:</label>
	        <input type="text" class="mui-input-clear" placeholder="输入手机号" tabindex="5" id="telephone"  name="phone" required>
	        <input type="hidden" name='id' id='user'>
	        <input type="hidden" name='email' id='email'>
	        <input type="hidden" name='avatar' id="avatar">
	        <input type="hidden" name='nickname' id="nickname">


	    </div>
	    <button type="submit" class="w-entry-btn mui-btn mui-btn-danger" id="btn">完成</button>
	</form>


@stop

@section('js')
	<script>mui('body').on('tap','a',function(){document.location.href=this.href;});</script>
	<script>

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
										var urlajax = "/api/campuses/"+sid+"/dorms"
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



	/*入口手机号码正则*/
	;$(function(){
		$('.w-entry-btn').on('touchstart',function(){
			 var phone = $('#telephone').val();
    			if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){ 
        			layer.open({
				    content: '您输入的手机号码有误'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				  }); 

        			
    			} 
		});
	})

	</script>

@stop
