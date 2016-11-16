import React from 'react'

import 'stylesheets/modules/main-content'
import $ from 'javascripts/vendor/jquery-3.1.1.min.js'
import Menu from 'javascripts/menu'

const src = require('images/building.jpeg');
console.log(src);

// Use the image in your code somehow now
const Profile = () => (
  <img src={src} width="100%"/>
);

const MainContent = React.createClass({
  render () {
    return (
      <div className='main-content'>
        <Profile />
        <Menu />
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
});


export default MainContent
