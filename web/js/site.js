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
  $('.gallery').lightGallery();
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

    $("#orders-phone, #phone_about").mask("+7(000)000-00-00", {
        placeholder: "Номер телефона",
        clearIfNotMatch: true
    });    

    $('#orders-city').kladr({
        type: $.kladr.type.city
    });

    $('#open-form').on('click', function(){
      $('#modal-form').stop().fadeToggle(200);
      return false;
    });
    $('#modal-form .content').on('click', function(e){
      e.stopPropagation();
    });
    $('#modal-form, #modal-form .close-modal').on('click', function(e){
      $('#modal-form').stop().fadeToggle(200);
    });

    $('#openform').on('click', function(){
      $(this).next('form').stop().slideToggle();
      return false;
    });

});