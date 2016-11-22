import React from 'react'

import 'stylesheets/modules/main-content'
import $ from 'javascripts/vendor/jquery-3.1.1.min.js'
import Waves from 'javascripts/vendor/waves.min.js'
import Menu from 'javascripts/menu'

const MainContent = React.createClass({
  render () {
    return (
      <div className="main-content">

        <a href="#" className="button">Click Here</a>
        <br/>
        <a href="#" className="button_2">Click Here</a>
        <br/>
        <a href="#" className="button_3">Click Here</a>

        <h1>Andrew Bailey</h1>
        <h2>frontEndDev</h2>
        <p>This paragraph text. Its super great!</p>

        <Menu />

        {/* <div className="block">
          <div className="block__content">
            <div className="content__section content__section-upper"></div>
            <div className="content__section content__section-lower"></div>
          </div>
        </div> */}

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

  Waves.attach('.button', ['waves-float']);
  Waves.attach('.button_2', ['waves-light']);
  Waves.attach('.button_3', ['waves-float']);

  function doit() {
    var options = {
        wait: null, //ms
        position: { // This position relative to HTML element.
            x: 0, //px
            y: 50  //px
        }
    };
    Waves.ripple('.button', options);
  }

  window.setInterval(doit, 500);

  Waves.init(config);
});


export default MainContent
