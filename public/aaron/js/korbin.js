/**
 * 
 * @authors Korbin 280674094@qq.com
 * @date    2018-11-19 11:23:55
 * @version $Id$
 */
$(function(){
	$(".nav li").hover(function(){
		$(this).find(".submenu").show().stop().animate({top:'60px',opacity:'1'},260);
	},function(){
		$(this).find(".submenu").stop().animate({top:'50px',opacity:'0'},260,function(){
			$(this).hide();
		});
	});
	$(window).scroll(function(){
		var winsco = $(window).scrollTop(); 
		if(winsco > 1){
			$('.header').addClass('head_wrap');
		}else{
			$('.header').removeClass('head_wrap');
		}
	});

	$('.faqtit').bind('click', function () {
		$(this).next().toggle();
    });

	/*$('.faqtit .slidebtn').click(function () {
		if($(this).hasClass('show')){
			$(this).removeClass('show')
            $(this).parents('.faqitem').find('.itembody').hide();
		}else{
			$(this).addClass('show');
            $(this).parents('.faqitem').find('.itembody').show();
		}
    })*/

	$('#flipInX').addClass('flipInX animated infinite');
		setTimeout(function(){
			$('#flipInX').removeClass();
		},1000);
	$('#fadeInUp').addClass('fadeInUp animated infinite');
		setTimeout(function(){
			$('#fadeInUp').removeClass();
		},1000);

	$(".coordinate-item").hover(function(){
		$(this).find(".city-name").stop().animate({bottom:'40px',opacity:'0'},260,function(){
			$(this).hide();
		});
		$(this).find(".warehouse-detail").show().stop().animate({bottom:'28px',opacity:'1'},200);
	},function(){
		$(this).find(".warehouse-detail").stop().animate({bottom:'50px',opacity:'0'},200,function(){
			$(this).hide();
		});
		$(this).find(".city-name").show().stop().animate({bottom:'28px',opacity:'1'},260);
	});	


		setTimeout(function(){
			$('.process li:nth-child(1)').addClass('bors');
		},0);
		setTimeout(function(){
			$('.process li:nth-child(2)').addClass('bors');
		},800);
		setTimeout(function(){
			$('.process li:nth-child(3)').addClass('bors');
		},1600);
		setTimeout(function(){
			$('.process li:nth-child(4)').addClass('bors');
		},2400);
		setTimeout(function(){
			$('.process li:nth-child(5)').addClass('bors');
		},3500);
		setTimeout(function(){
			$('.process li:nth-child(6)').addClass('bors');
		},4500);
		setTimeout(function(){
			$('.process li:nth-child(7)').addClass('bors');
		},6000);
		setTimeout(function(){
			$('.process li:nth-child(8)').addClass('bors');
		},10000);


		//省略号
 	$(".divomit").each(function (i) {
        var divH = $(this).outerHeight();
        var $p = $("*", $(this)).eq(0);
        while ($p.outerHeight() > divH) {
          $p.text($p.text().replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "..."));
        };
      });

 	$('.jobsBody li').click(function(){
 		if($(this).hasClass('down')){
 			$(this).removeClass('down');
		}else{
            $(this).addClass('down');
		}
 	})
		
		
})
