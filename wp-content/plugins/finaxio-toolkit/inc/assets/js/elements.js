(function ($) {
    "use strict";

    var BannerSlider = function () {
	// /*==========  banner  ==========*/
	let sliderActive1 = '.banner-slider';
	let sliderInit1 = new Swiper(sliderActive1, {
		// Optional parameters
		slidesPerView: 1,
		effect: 'fade',
		loop: true,
		effect: 'fade',
		autoplay: {
			delay: 5000,
			reverseDirection: false,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".banner-pagination",
			clickable: true,
		},
	});
	var swiper = new Swiper(".banner-slide2", {
		spaceBetween: 0,
		slidesPerView: 4,
		freeMode: true,
		watchSlidesProgress: true,
		breakpoints: {
			320: {
				slidesPerView: 2,
			},
			575: {
				slidesPerView: 3,
			},
		}
	});
	let sliderActive2 = '.banner-slide';
	let sliderInit2 = new Swiper(sliderActive2, {
		slidesPerView: 1,
		effect: 'fade',
		loop: true,
		spaceBetween: 0,
		effect: 'fade',
		autoplay: {
			delay: 6000,
			reverseDirection: false,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".banner-dots",
			clickable: true,
		},
		thumbs: {
			swiper: swiper,
		},
	});

	function animated_swiper(selector, init) {
		let animated = function animated() {
			$(selector + ' [data-animation]').each(function() {
				let anim = $(this).data('animation');
				let delay = $(this).data('delay');
				let duration = $(this).data('duration');
				$(this).removeClass('anim' + anim).addClass(anim + ' animated').css({
					webkitAnimationDelay: delay,
					animationDelay: delay,
					webkitAnimationDuration: duration,
					animationDuration: duration
				}).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
					$(this).removeClass(anim + ' animated');
				});
			});
		};
		animated();
		// Make animated when slide change
		init.on('slideChange', function() {
			$(sliderActive1 + ' [data-animation]').removeClass('animated');
			$(sliderActive2 + ' [data-animation]').removeClass('animated');
		});
		init.on('slideChange', animated);
	}
	animated_swiper(sliderActive1, sliderInit1);
	animated_swiper(sliderActive2, sliderInit2);
	
	}


	var ServiceSlider = function () {
		// /*==========  Services Two  ==========*/
		var swiper = new Swiper(".services-two-slider", {
			slidesPerView: 3,
			loop: true,
			speed: 1500,
			centeredSlides: true,
			navigation: {
				nextEl: '.services__two-button-next',
				prevEl: '.services__two-button-prev',
			},
			autoplay: {
				delay: 4000,
				reverseDirection: false,
				disableOnInteraction: false,
			},
			breakpoints: {
				0: {
					slidesPerView: 1
				},
				768: {
					centeredSlides: false,
					slidesPerView: 2
				},
				992: {
					centeredSlides: false,
					slidesPerView: 2
				},
				1200: {
					centeredSlides: true,
					slidesPerView: 3
				},
			}
		});
	}

	var PortfolioSlider = function () {
	// /*==========  Portfolio  ==========*/
	var swiper = new Swiper(".portfolio-slider", {
		slidesPerView: 4,
		loop: true,
		speed: 1500,
		spaceBetween: 30,
		autoplay: {
			delay: 4000,
			reverseDirection: false,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			768: {
				slidesPerView: 2,
			},
			1200: {
				slidesPerView: 3,
			},
			1400: {
				slidesPerView: 4,
			}
		},
	});
	// /*==========  Portfolio Two  ==========*/
	var swiper = new Swiper(".portfolio-slider-two", {
		slidesPerView: 4,
		loop: true,
		speed: 1500,
		spaceBetween: 30,
		autoplay: {
			delay: 4000,
			reverseDirection: false,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			768: {
				slidesPerView: 3,
			},
			992: {
				slidesPerView: 4,
			}
		},
	});

	     /*==========  isotop  ==========*/
		
			/*========== Project Grid  ==========*/
			var $grid = $('.portfolio__page-active').isotope({});
			/*========== Project Filter  ==========*/
			$('.portfolio__page-btn').on('click', 'button', function () {
				var filterValue = $(this).attr('data-filter');
				$grid.isotope({
					filter: filterValue
				});
			});
			/*========== Project Active  ==========*/
			$('.portfolio__page-btn').on('click', 'button', function () {
				$(this).siblings('.active').removeClass('active');
				$(this).addClass('active');
			});
	  

	}


	var Skill_Bar = function () { 
		if($('.skill__area-item-bar').length) {
			$('.skill__area-item-bar').appear(function() {
				var el = $(this);
				var percent = el.data('width');
				$(el).css('width', percent + '%');
			}, {
				accY: 0
			});
		};
	
	}	

	var WidgetDefault = function ($scope, $) {

		///=============  Video Popup  =============\\\
		$('.video-popup').magnificPopup({
			type: 'iframe'
		});
		///=============  Image Popup  =============\\\
		$('.img-popup').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	
		$("[data-background]").each(function() {
			$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
		});
		}
	

	/** ==== Elementor Js Hook ==== */
	$(window).on('elementor/frontend/init', function() {
		
		elementorFrontend.hooks.addAction('frontend/element_ready/banner_finaxio.default', BannerSlider);
		elementorFrontend.hooks.addAction('frontend/element_ready/services-finaxio.default', ServiceSlider);
		elementorFrontend.hooks.addAction('frontend/element_ready/skill_bar_finaxio.default', Skill_Bar);
		elementorFrontend.hooks.addAction('frontend/element_ready/portfolio_finaxio.default', PortfolioSlider);
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', WidgetDefault);
	});

})(jQuery);
