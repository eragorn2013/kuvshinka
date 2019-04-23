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
	$('.owl-carousel-5').lightGallery();
	var owl5=$(".owl-carousel-5");  
    owl5.owlCarousel({                      
        margin:0,
        nav:false, 
        dots: false, 
        autoplay: true,
        autoplayTimeout: 3000,     
        responsive:{
        0:{
              items:1
           },
        651:{
              items:2
                },
        821:{
              items:3
                },
        1000:{
               items:3
                  },
        
        1045:{
               items:4
                  }
        }
    });

});