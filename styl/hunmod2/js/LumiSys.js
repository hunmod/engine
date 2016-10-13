$(function() {

	var lang = '.hu';

	/*============================================
	Page Preloader
	==============================================*/
	$(window).load(function() {
		$('#page-loader').fadeOut(500);
	})

	/*============================================
	ScrollTo Links
	==============================================*/
	$('a.scrollto').click(function(e){
		$('html,body').scrollTo(this.hash, this.hash, {gap:{y:-54}});
		e.preventDefault();

		if ($('.navbar-collapse').hasClass('in')){
			$('.navbar-collapse').removeClass('in').addClass('collapse');
		}
	});

	/*============================================
	Header Functions
	==============================================*/
	$('.jumbotron').height($(window).height());
	
	$('.home-slider').flexslider({
		animation: 'slide',
		directionNav: false,
		controlNav: false,
		direction: 'vertical',
		slideshowSpeed: 3000,
		animationSpeed: 500,
		pauseOnHover:false,
		pauseOnAction:false,
		smoothHeight: true
	});

	adjust();

	function adjust() {
		var about = $('#about').offset().top;
		var st = $(window).scrollTop();
		if (st >= about - 80) {
			$('#main-nav').removeClass('off').addClass('on');
		} else {
			$('#main-nav').removeClass('on').addClass('off');
		}
		if (st < 350) {
			$('.header-logo, .start').css({
				'z-index': 1,
				'opacity': 1 - st/350
			});
		} else {
			$('.header-logo, .start').css({
				'z-index': -1,
				'opacity': 0
			});
		}
		$('.header-logo').css('top', $(window).height() * ( 0.25 + $(window).scrollTop() / $(window).height() ) );
		$('.start').css('top', $(window).height() * 0.85);
	}

	/*============================================
	Scroll Functions
	==============================================*/
	$(window).scroll( function() {
		adjust();
	});

	/*============================================
	Resize Functions
	==============================================*/
	$(window).resize(function(){
		adjust();
		$('.jumbotron').height($(window).height());
		scrollSpyRefresh();
		waypointsRefresh();
	});
	
	/*============================================
	Project thumbs - Masonry
	==============================================*/
	$(window).load(function(){
		$('#projects-container').css({visibility:'visible'});
		$('#projects-container').masonry({
			itemSelector: '.project-item:not(.filtered)',
			columnWidth:350,
			isFitWidth: true,
			isResizable: true,
			isAnimated: !Modernizr.csstransitions,
			gutterWidth: 20
		});
		scrollSpyRefresh();
		waypointsRefresh();
	});

	/*============================================
	Filter Projects
	==============================================*/
	var filters = [];
	
	$('#filter-works ul').each(function(i){
		filters[i] = {
			name:$(this).data('filter'),
			val : '*'
		};
	});
	
	$('#filter-works a').click(function(e){

		e.preventDefault();
		
		$(this).parents('ul').find('li').removeClass('active');
			
		$(this).parent('li').addClass('active');
			
		for (var i=0; i<filters.length; i++){
			if($(this).data(filters[i].name)){filters[i].val = $(this).data(filters[i].name);}
		}
		
		$('.project-item').each(function(){
			
			var match;
			
			for (var i=0; i<filters.length; i++){
				if($(this).is(filters[i].val)){match = true;}
				else{match = false;break;}
			}	
			
			if(match){
				$(this).removeClass('filtered');
			}
			else{
				$(this).addClass('filtered');
			}
			
		});
		
		$('#projects-container').masonry('reload');
	
		var results = $('.project-item').not('.filtered').length;
		$('.filter-results span').html(results+'');
		$('.filter-results').slideDown();

		scrollSpyRefresh();
		waypointsRefresh();

	});

	/*============================================
	Testimonials Slider
	==============================================*/
	$('#testimonials-slider').flexslider({
		animation: 'slide',
		slideshowSpeed: 10000,
		useCSS: true,
		directionNav: false, 
		pauseOnAction: false, 
		pauseOnHover: true,
		smoothHeight: false
	});

	/*============================================
	Project Loader on IE
	==============================================*/
	$('.no-cssanimations #preview-loader').html('<div class="loader-gif"></div>');
	
	/*============================================
	Placeholder Detection
	==============================================*/
	if (!Modernizr.input.placeholder) {
		$('#contact-form').addClass('no-placeholder');
	}

	/*============================================
	Scrolling Animations
	==============================================*/
	$('.scrollimation').waypoint(function() {
		$(this).addClass('in');
	}, { offset: function() {
			var h = $(window).height();
			if ($('body').height() - $(this).offset().top > h*0.3) {
				return h*0.7;
			} else {
				return h;
			}
		}
	});

	/*============================================
	Refresh scrollSpy function
	==============================================*/
	function scrollSpyRefresh() {
		setTimeout(function() {
			$('body').scrollspy('refresh');
		}, 1000);
	}

	/*============================================
	Refresh waypoints function
	==============================================*/
	function waypointsRefresh() {
		setTimeout(function() {
			$.waypoints('refresh');
		}, 1000);
	}



	/*----- COUNTRIES HOVER EFFECT -----*/
	$('.countries span').hover(
		function() {
			$($(this).attr('data-hover')).addClass('sel');
		},
		function() {
			$($(this).attr('data-hover')).removeClass('sel');
		}
	);



	/*----- INIT MAP -----*/
	$('#google-map').gMap({
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: false,
			scaleControl: true,
			streetViewControl: true,
			overviewMapControl: false
		},
		zoom: 15,
		markers: [{
			address: 'Október 6. u. 7 1051 Hungary',
			html: 'LumiSys'
		}]
	});



	/*----- PARALLAX -----*/
	$(window).load(parallax);
	function parallax() {
		$('#testimonials').parallax('50%', 0.5);
		$('#clients').parallax('50%', 0.5);
		$('#jobs').parallax('50%', 0.5);
	}



	/*============================================
	Contact submit check
	==============================================*/

	$(lang+'.contact-form').submit(function() {

		var $submitBtn = $(lang+'.contact-form button'),
			buttonCopy = $submitBtn.html(),
			errorMessage = $submitBtn.data('error-message'),
			sendingMessage = $submitBtn.data('sending-message'),
			okMessage = $submitBtn.data('ok-message'),
			hasError = false;

		$(lang+'.contact-form .error-message').remove();

		$(lang+' .requiredField').each(function() {
			if($.trim($(this).val()) == '') {
				var errorText = $(this).data('error-empty');
				$(this).parent().append('<span class="error-message" style="display:none;">'+errorText+'</span>').find('.error-message').fadeIn('fast');
				$(this).addClass('inputError');
				hasError = true;
			} else if($(this).is("input[type='email']") || $(this).attr('name')==='email') {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($.trim($(this).val()))) {
					var invalidEmail = $(this).data('error-invalid');
					$(this).parent().append('<span class="error-message" style="display:none;">'+invalidEmail+'</span>').find('.error-message').fadeIn('fast');
					$(this).addClass('inputError');
					hasError = true;
				}
			}
		});

		if(hasError) {
			$submitBtn.html('<i class="fa fa-times"></i>'+errorMessage);
			setTimeout(function(){
				$submitBtn.html(buttonCopy);
			},2000);
		}
		else {
			$submitBtn.html('<i class="fa fa-spinner fa-spin"></i>'+sendingMessage);

			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$submitBtn.html('<i class="fa fa-check"></i>'+okMessage);
				setTimeout(function(){
					$submitBtn.html(buttonCopy);
				},2000);

			});
		}

		return false;
	});

});	