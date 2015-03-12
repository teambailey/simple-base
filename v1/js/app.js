$(function() {
	/*FIXED HEADER*/
	$(window).on('scroll.fixedHeader', function (){

		var head = $('.logo-wpr');

		if($(this).scrollTop() > 800) {
			 head.addClass('fixed');
		}else {
			head.removeClass('fixed');
		}
	});
	
	/*PORTFOLIO CARDS SECTION*/
	$('.portfolio-card').bind('click', function cardReveal(){
		$('.reveal-card1').removeClass('fadeInLeft');
		$('.portfolio-card').removeClass('active');

		$(this).addClass('active');

		// figure out which Reveal to show
		var cardToReveal = $(this).attr('data-card');

		// hide current Reveal
		$('.projects-reveal.active').fadeOut(100, function(){

			$(this).removeClass('active');

			$('.portfolio-card').unbind('click');
		});
			
		// show selected Reveal
		$(cardToReveal).fadeIn(950, function() {
			
			$(this).addClass('active');

			$('.portfolio-card').bind('click', cardReveal);

		});
	});

	/*SCROLL ANIMATIONS*/
	$(window).on('scroll.revealCardStop', function(){
		if($(this).scrollTop() >= 1100) {

			$('.reveal-card1').siblings().addClass('active');

			// slide Reveal Card1 when Scrolled to 
			$('.reveal-card1').addClass('fadeInLeft active');

			$(window).off('.revealCardStop');

		} else {

			$('.reveal-card1').removeClass('fadeInLeft');

		}
	});

	$(window).on('scroll.revealFlipStop', function(){
		if($(this).scrollTop() >= 1800) {

			$('.flip-section-wpr').addClass('fadeInRight active');

			$(window).off('.revealFlipStop');

		} else {

			$('.flip-section-wpr').removeClass('fadeInRight');

		}
	});

	/*SCROLL TO STOPS*/
	$('#hero-btn').on('click', function(event){

		event.preventDefault();

		$('.logo-wpr').animatescroll();
	});

	$('.logo-wpr .btn').on('click', function(event) {

		event.preventDefault();
		
		$('.section-bg6').animatescroll();
	});

	/*PROJECT CARD SLIDE INFO REVEAL*/
	$('.projects-reveal img').mouseenter(function(event) {
		$(this).siblings('div').css('display', 'block');
	});

	$('.text-reveal').mouseleave(function(event) {
		$(this).css('display', 'none');

		if ($('body').mouseenter()){
			$('.text-reveal').css('display', 'none');
		}
	});

	/*IE DETECTION OVERRIDE*/	
	if (navigator.userAgent.match(/msie|trident/i)) {

		var override = $('div.flip-container');

		$(override).addClass('ie-sux');
		$(override).children('div').removeClass('flip-wpr');


	}

	/* AJAX CONTACT FORM */
	var contactField = $('.field input[type="text"] , textarea');

	$(contactField).focusin(function(event) {
		$(this).addClass('funtime');
	});

	$(contactField).focusout(function(event) {
		if (!$.trim($(this).val())) {
			$(this).removeClass('funtime');
		}
	});

	$('#message').bind('input', function () {
		var engage = 'input[type="submit"]'
    	
    	if ($.trim($('#message').val())) {

    	    $(engage).addClass('funtime');
    	}else 
    		$(engage).removeClass('funtime');
	});

	// Get the form.
	var form = $('#ajax-contact');

	// Get the messages div.
	var formMessages = $('#form-messages');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#name').val('');
			$('#email').val('');
			$('#message').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});

	});
});


















