import React from 'react'
import Header from 'javascripts/header'
import MainContent from 'javascripts/main-content'
import Footer from 'javascripts/footer'

import 'stylesheets/modules/container'
import 'javascripts/vendor/jquery-3.1.1.min.js'

const Container = React.createClass({
  render () {
    return (
      <div className="container">
        <img className="container_background-image" src="build/images/building.jpeg" width="100%"/>
        <Header />
        <MainContent />
        <Footer />
      </div>
    )
  }
})

export default Container
