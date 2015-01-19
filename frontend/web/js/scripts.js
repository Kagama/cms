$(document).ready(function() {

	$("#reg_form").hide();

	/*
	 |
	 |
	 |
	 18.01.2015 - Scrollbar
	 |
	 |
	 |
	 */

	var opts = $(document).find("#registrationform-nomination_id option");

	opts.each(function() {
		var item = $(this),
			cur_text = item.text(),
			list = $(".select_list");
		//item_ind = item.index();

		list.append( "<li>" + cur_text + "</li>" );
	});


	$(".list").mCustomScrollbar({
		scrollbarPosition: "inside",
		scrollInertia: 100,
		setTop: '0px'
		//alwaysShowScrollbar:2

	});

	$(".nomi_select .list").hide();


	$(".select_list li").on('click', function() {
		$("#registrationform-nomination_id").val( $(this).index() + 1 );

		$(".nomi_select .select").text( $(this).text() );

		$(".nomi_select .list").slideUp();
		$(".nomi_select .select").removeClass('active');
	});

	$(".nomi_select .select").on('click', function() {
		if ( !$(this).hasClass('active') ) {
			$(".nomi_select .list").slideDown();
			$(this).addClass('active');
		}
		else {
			$(".nomi_select .list").slideUp();
			$(this).removeClass('active');
		}
	});

	/*
	 |
	 |
	 |
	 | Scrollbar end
	 |
	 |
	 |
	 */

	var r_h = $(".main-description .right").height();
	$(".main-description .left").height(r_h);


	var	f_button = $(".open_r_form"),
		r_form = $("#reg_form"),
		main_l = $(".main-description .left"),
		main_r = $(".main-description .right");

	f_button.on('click', function() {

		r_form.slideDown();

		main_l.animate({
			width: '30%'
		}, 500);

		main_r.animate({
			width: '70%'
		}, 500);





	});

	// Слайдеры

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


//	Update Captcha
	$(document).on('click', '.cap_upd', function() {
		$(document).find('#registrationform-verifycode-image').click();
	});
	// regForm submit button
	$(document).on('blur', '#reg_form .form-control', function() {
		var $index = $('#reg_form .form-group.required.has-success').length;

		if ($index >= 8) {
			$('.row button.reg').removeClass('inactive');
		} else {
			$('.row button.reg').addClass('inactive');
		}
	});
	// Ajax submit form
	$('.row button.reg').on('click', function() {
		if (!$('.row button.reg').hasClass('inactive')) {
			$.ajax({
				type:'post',
				url:$('#reg_form').attr('action'),
				data:$('#reg_form').serialize(),
				dataType:'json',
				success: function(json) {
					if (json.error) {
						$('#reg_form').html('');
						$('#reg_form').html(json.html);
					} else {
						$('#reg_form').html('');
						$('#reg_form').html(json.html);
					}
				}
			});
		}
		return false;

	});


});