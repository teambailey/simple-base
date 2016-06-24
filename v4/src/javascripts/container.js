import React from 'react'
import Header from 'javascripts/header'
import Section1 from 'javascripts/section1'
import Footer from 'javascripts/footer'

import 'stylesheets/modules/container'

const Container = React.createClass({
  render () {
    return (
      <div className='container'>
        <Header />
        <Section1 />
        <Footer />
      </div>
    )
  }
})

export default Container
