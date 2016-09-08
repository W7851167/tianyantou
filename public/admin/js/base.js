$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	//顶部菜单栏 start
	$(".header-nav-inner").mouseenter(function(){
		$(this).children(".menu").show();
		$(this).children("a").addClass("on");
	})
	$(".header-nav-inner").mouseleave(function(){
		$(this).children(".menu").hide();
		$(this).children("a").removeClass("on");
	})
	//顶部菜单栏 end
	//左侧菜单栏start
	$(window).scroll(function(){
		var _top = $(window).scrollTop();
		if(_top >= 114){
			$('.content-left').addClass('pf');
		}else{
			$('.content-left').removeClass('pf');
		}
	});
	$(document).delegate('.content-left-menu li a','click',function(){
		$(this).addClass("on");
		$(this).parents("li").siblings().children().removeClass("on");
	});
	//左侧菜单栏end
	//底部消息提醒
	$('.consult-message').on('mouseenter',function(){
		$(this).find('.consult-messageList').slideDown();
	}).mouseleave(function(){
		$(this).find('.consult-messageList').slideUp();
	})
	$('.navigation-show').css({"height":$(document.body).outerHeight(true)});
	 $(".system-window").css({
        "left":document.body.offsetWidth / 2 - $('.system-window').outerWidth() / 2
    });
	$('.content-list-table-page-det').on('click',function(){
	    var url=window.location.href;
	    var num=$('#dir-page').val();
		var maxnum=$('.total-page').text();
		maxnum=parseInt(maxnum);
		if(num>maxnum){
			num=maxnum;
		} else if(num<1){
		    num=1;
		}
        if(window.location.search){
			window.location.href=url.replace(window.location.search,"?page="+num);
		}
		else{
		    url=url+"?page="+num;
			window.location.href=url;
		}
	});
});
