$(document).ready(function(){
	$(".admin-edit-news .images .item .layer").lightGallery();
	$('.drop-news').on('click', function(){
		if(!confirm('Данное действите полностью удалит новость и все изображения привязанные к этой новости. Вы уверены?')) return false;
	});

	$('.edit-news').on('click', function(){
		var id=Number($(this).attr('data-id'));		
		$('#admin-edit-news-'+id).stop().fadeIn(300, function(){
			$('html').scrollTop(0);
		});		
		return false;
	});

	$('.close-modal').on('click', function(){
		var id=Number($(this).attr('data-id'));
		$('#admin-edit-news-'+id).stop().fadeOut(200);
		return false;
	});

	$('.submit-form-photos').on('submit', function(event){
		
		var el=$(this);
		var alt=$('.field-images-alt input',this).val();
		var file=$('.field-images-alt input', this).val();		
		if(!file) return false;
		if(!alt) return false;
		
		var formData = new FormData(el.get(0));
		var action=$(this).attr('action');	
		$.ajax({
			url: action,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			async: false,
			success: function(d){
				var data=JSON.parse(d);	
				if(data.error){
					alert(data.message);
					return false;
				}	
				var element='<div class="item"><div class="layer"><a class="img" href="'+data.img+'"><img src="'+data.img+'"></a></div></div>';
				el.next('.images').append(element);
				$(".admin-edit-news .images .item .layer").lightGallery();
			}
		});
		event.stopImmediatePropagation();
		return false;
	});

	$('body').on('click', '.delete-img', function(){
		var el=$(this);
		var idImg=el.attr('data-id');
		$.post('/admin/news/delete-photo-news', {'id':idImg}, function(d){
			var data=JSON.parse(d);
			if(data.error){
				alert(data.message);
				return false;
			}
			el.parent('.item').remove();
		});
		return false;
	});
});