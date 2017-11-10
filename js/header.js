$(document).ready(function(){
	var options = {
		offset: 50
	}
	var header = new Headhesive('.navMenu', options);
	$('main').on('click', function(){
		$('.collapsible-body').css('display', 'none');
		$('li').removeClass('active');
		$('.collapsible-header').removeClass('active');
	});
	$('.sub').on('click', function(){
		$('.collapsible-body').css('display', 'none');
		$('li').removeClass('active');
		$('.collapsible-header').removeClass('active');
		//alert("Запрос отправлен");
	});
	$('.navMenu').on('click', function(){
		$('.collapsible-body').css('display', 'none');
		$('li').removeClass('active');
		$('.collapsible-header').removeClass('active');
	});
	/*$('.modal-action').on('click',function(){
		 alert('Запрос отправлен');
	});*/
});

