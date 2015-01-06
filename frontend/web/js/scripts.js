$(document).ready(function() {

	var main_news = $(".news-slider .slider"),
		main_jury = $(".jury-slider .slider");



	$(main_news).slick({
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		lazyLoad: false,
		swipe: true,
		draggable: true,
		prevArrow: ".button.left",
		nextArrow: ".button.right",
		responsive: [
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});

	$(main_jury).slick({
		autoplay: true,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 2,
		lazyLoad: false,
		swipe: true,
		draggable: true,
		prevArrow: ".button.left",
		nextArrow: ".button.right",
		responsive: [
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
				}
			}
		]
	});

});