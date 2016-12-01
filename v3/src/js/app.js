$(function() {
console.log("yup");
  // // Nav Links
  // $.getJSON('js/nav-items.json', function(json) {
  //   var $navLinks = "",
  //     $navLinksItems = json,
  //     $navTarget = document.getElementById("header-navigation");
  //
  //   for (i = 0; i < $navLinksItems.length; i++) {
  //     var $navLinksScrollStop = $navLinksItems[i].toLowerCase();
  //
  //     $navLinks += '<li><a href="#" class="scroll-stop" data-scroll="' + $navLinksScrollStop + '">' + $navLinksItems[i] + '</a><span style="padding-left:15px";>|</span></li>';
  //   }
  //
  //   $navTarget.innerHTML = $navLinks;
  // });
  //
  // // Fixed Nav Links
  // $.getJSON('js/fix-nav-items.json', function(json) {
  //   var $fixedNavLinks = "",
  //       $fixedNavLinksItems = json,
  //       $fixedNavTarget = document.getElementById("meun-slide-navigation");
  //
  //   for (i = 0; i < $fixedNavLinksItems.length; i++) {
  //     var $fixedNavLinksScrollStop = $fixedNavLinksItems[i].toLowerCase();
  //
  //     $fixedNavLinks += '<li><a href="#" class="meun-link scroll-stop" data-scroll="' + $fixedNavLinksScrollStop + '"><span class="menu-links-text">' + $fixedNavLinksItems[i] + "</span></a></li>";
  //   }
  //
  //   $fixedNavTarget.innerHTML = $fixedNavLinks;
  // });


  $('#bg-img1').each(function(){
    var $bgobj = $(this); // assigning the object
        $window = $(window);

    $(window).scroll(function() {
      var yPos = -(($window.scrollTop()) / $bgobj.data('speed'));

      // Put together our final background position
      var coords = '50% '+ yPos + 'px';

      // Prevent action from firing on mobile
      if (document.documentElement.clientWidth > 570) {

        // Move the background
        $bgobj.css({ backgroundPosition: coords });
      }

    });
  });

  $('.toggle-slide-down, .menu-close, .nav-bg-mask').on('click', function(event) {
    event.preventDefault();

    $('.menu').toggleClass('slide');
    $('.menu-links-text').toggleClass('slide');
    $('.nav-bg-mask').toggleClass('is-open');

    $('body').toggleClass('overflow-hidden');
  });

  /*FIXED HEADER*/
  $(window).on('scroll.fixedHeader', function (){

    var head = $('.fixed-header');

    if($(this).scrollTop() > 112) {
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
  $(document).on('click', '.scroll-stop' ,function(event) {
    event.preventDefault();

    var locationID = $(this).attr('data-scroll');
    // console.log(YUP);

    $('.' + locationID + '-wpr').scrollView();
    $('.menu').removeClass('slide');
    $('.menu-links-text').removeClass('slide');
    $('.nav-bg-mask').removeClass('is-open');
    $('body').removeClass('overflow-hidden');
  });

  // Works Click
  $('.works-content').on('click', function(event) {
    var windowWidth = $(window).width();
        imgWidth = $('.works-img-wpr').width();
        horzCenterImg = (windowWidth-imgWidth)/2;
        locationID = $(this).find('img').attr('data-img');

    $('#' + locationID + '-img').css({
      left: horzCenterImg + 'px',
    });

    $('#' + locationID + '-img').closest('.works-img-wpr').show();

    if ($(this).hasClass('no-link')){

      $('.works-bg-mask').addClass('is-open');
      $('body').addClass('overflow-hidden');
      $('.fa-close').show();

      $('#works-scrollTarget').scrollView();
    }

  });

  $('.works-bg-mask, .works-img, .fa-close').on('click', function(event) {
    $('.works-img-wpr').hide();
    $('.works-bg-mask').removeClass('is-open');
    $('body').removeClass('overflow-hidden');
    $('.fa-close').hide();
  });


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
