import React from 'react'

import 'stylesheets/modules/main-content'
import $ from 'javascripts/vendor/jquery-3.1.1.min.js'
import Waves from 'javascripts/vendor/waves.min.js'
import Menu from 'javascripts/menu'

const MainContent = React.createClass({
  render () {
    return (
      <div className="main-content">

        <h1>Andrew Bailey</h1>

        <div className="tempName2">
          <h2>frontEndDev</h2>
          <p className="tempName">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <Menu />

        <div className="block">
          <div className="block__content block__content-third">
            <div className="content__section content__section-upper">
              <h3>This is the Title</h3>
            </div>
            <div className="content__section content__section-lower">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" className="button">Click Here</a>
            </div>
          </div>
          <div className="block__content block__content-third">
            <div className="content__section content__section-upper">
              <h3>This is the Title</h3>
            </div>
            <div className="content__section content__section-lower">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" className="button">Click Here</a>
            </div>
          </div>
          <div className="block__content block__content-third">
            <div className="content__section content__section-upper">
              <h3>This is the Title</h3>
            </div>
            <div className="content__section content__section-lower">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" className="button">Click Here</a>
            </div>
          </div>
        </div>

        <div className="block">
          <div className="block__content block__content-half">
            <div className="content__section content__section-upper">
              <h3>This is the Title</h3>
            </div>
            <div className="content__section content__section-lower">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" className="button">Click Here</a>
            </div>
          </div>
          <div className="block__content block__content-half">
            <div className="content__section content__section-upper">
              <h3>This is the Title</h3>
            </div>
            <div className="content__section content__section-lower">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" className="button">Click Here</a>
            </div>
          </div>
        </div>

      </div>
    )
  }
})

$(function(){
  $('.toggle').on('click', function(event) {
    event.preventDefault();
    var el = $('.menu');
    var activeTest = el.hasClass('expand');
    activeTest ? el.removeClass('expand') : el.addClass('expand');
  });

  var config = {
    // How long Waves effect duration
    // when it's clicked (in milliseconds)
    duration: 1000,

    // Delay showing Waves effect on touch
    // and hide the effect if user scrolls
    // (0 to disable delay) (in milliseconds)
    delay: 200
  };

  Waves.attach('.button', ['waves-float', 'waves-light']);

  // function doit() {
  //   var options = {
  //       wait: null, //ms
  //       position: { // This position relative to HTML element.
  //           x: 0, //px
  //           y: 50  //px
  //       }
  //   };
  //   Waves.ripple('.button', options);
  // }

  // window.setInterval(doit, 500);

  Waves.init(config);
});


export default MainContent
