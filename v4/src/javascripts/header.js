import React from 'react'

import 'stylesheets/modules/header'
import 'stylesheets/utilities/clearfix'
import Menu from 'javascripts/menu'


const Header = React.createClass({
  render () {
    return (
      <div className='header u-clearfix'>
        <Menu />
      </div>
    )
  }
})

export default Header
