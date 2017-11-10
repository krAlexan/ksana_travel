$(document).ready(function(){
	$('.slider').slick({
		dots : true,
		autoplay: true,
		speed: 2000,
		autoplaySpeed: 3000,
		fade: true,
		cssEase: 'linear'
	});
	document.querySelector('.slick-next').onmouseenter = function(){
		$(this).removeClass('slick-next').addClass('slick-next2');
	}
	document.querySelector('.slick-next').onmouseleave = function(){
		$(this).removeClass('slick-next2').addClass('slick-next');
	}
	document.querySelector('.slick-prev').onmouseenter = function(){
		$(this).removeClass('slick-prev').addClass('slick-prev2');
	}
	document.querySelector('.slick-prev').onmouseleave = function(){
		$(this).removeClass('slick-prev2').addClass('slick-prev');
	}

});