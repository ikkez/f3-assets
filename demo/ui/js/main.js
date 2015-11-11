$(function() {

	// enable slick slider if found
	if ($('.slider').length>0)
		$('.slider').slick({
			dots: true,
			infinite: true,
			speed: 500,
			slidesToShow: 1,
			adaptiveHeight: true,
			autoplay: true,
			autoplaySpeed: 2000
		});


});