$(document).ready(function(){
	$('#menu').on('click', function(){
		$('.content.nav').stop().slideToggle();
	});

	if($(window).width() > 504){
		$('.content.nav').removeAttr('style');
	}
	$(window).on('resize', function(){

		if($(window).width() > 504){			
			$('.content.nav').removeAttr('style');
		}
	});	
});