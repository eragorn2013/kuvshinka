$(document).ready(function(){
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
});