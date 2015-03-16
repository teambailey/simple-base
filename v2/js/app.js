$(function() {

    $('#bg-img1').each(function(){
        var $bgobj = $(this); // assigning the object
        	$window = $(window);

        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));

            // Put together our final background position
            var coords = '50% '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        });
    });

	$('.toggle-slide-down, .menu-close, .nav-bg-mask').on('click', function(event) {
		event.preventDefault();

		$('.menu').toggleClass('slide');
		$('.menu-links-text').toggleClass('slide');
		$('.nav-bg-mask').toggleClass('is-open');
	});

	/*FIXED HEADER*/
	$(window).on('scroll.fixedHeader', function (){

		var head = $('.fixed-header');

		if($(this).scrollTop() > 90) {
			 head.addClass('fixed');
		}else {
			head.removeClass('fixed');

		}
	});

		/*IE DETECTION OVERRIDE FOR FIXED HEADER*/
		if (navigator.userAgent.match(/msie|trident/i)) {

			var override = $('.fixed-header');

			$(override).addClass('ie-sux');
		}

	// Scroll Stop Stuff
	// scroll to animation function
	$.fn.scrollView = function () {
	    return this.each(function () {
	        $('html, body').animate({
	            scrollTop: $(this).offset().top - 44
	        }, 600);
	    });
	};

	// init scroll function
	$('.scroll-stop').on('click', function(event) {
		event.preventDefault();

		var locationID = $(this).attr('data-scroll');

		$('.' + locationID + '-wpr').scrollView();
		$('.menu').removeClass('slide');
		$('.menu-links-text').removeClass('slide');
		$('.nav-bg-mask').removeClass('is-open');

	});

	// ISOTOPE STUFF
	// init Isotope
	// var $container = $('.isotope').imagesLoaded(function(){

	// 	$container.isotope({
	//     	itemSelector: '.portfolio-item',
	// 	});
	// });

	// // Production loading issue hack
	// $('.is-checked').trigger('click');

	// // bind filter button click
	// $('#filters').on( 'click', 'button', function() {
	// 	var filterValue = $( this ).attr('data-filter');
 //    		// use filterFn if matches value
	// 		$container.isotope({ filter: filterValue });

 //  		});
	//   	// change is-checked class on buttons
 //  		$('.button-group').each( function( i, buttonGroup ) {
 //    		var $buttonGroup = $( buttonGroup );

 //    		$buttonGroup.on( 'click', 'button', function() {
	// 			$buttonGroup.find('.is-checked').removeClass('is-checked');

	// 			$( this ).addClass('is-checked');
	//     	});
	// 	});

	// // Overlay Hover
	// $('.portfolio-item').on('mouseenter', function(event) {
	// 	event.preventDefault();

	// 	var overlay = $(this).find('.img-overlay');

	// 	overlay.css('display', 'block');

	// });

	// $('.portfolio-item').on('mouseleave', function(event) {
	// 	event.preventDefault();

	// 	var overlay = $(this).find('.img-overlay');

	// 	overlay.css('display', 'none');

	// });

	// Skills Hover
	$('.skills-content').hover( function(event) {

		$(this).find('.skills-subtext-wpr').toggleClass('has-hover');
	});

	/* AJAX CONTACT FORM */
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


















