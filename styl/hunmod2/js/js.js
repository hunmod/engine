	/*----- PARALLAX -----*/
	$(window).load(parallax);
	function parallax() {
		$('.parallax').parallax('50%', 0.5);
		//$('#clients').parallax('50%', 0.5);
		//$('#jobs').parallax('50%', 0.5);
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
