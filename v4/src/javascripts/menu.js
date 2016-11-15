import React from 'react'

import 'stylesheets/modules/menu'

const menu = React.createClass({
  render () {
    return (
      <div className='menu'>
        <ul>
          <li className="menu-item">
            <a href="">Link 1</a>
          </li>
          <li className="menu-item">
            <a href="">Link 2</a>
          </li>
          <li className="menu-item">
            <a href="">Link 3</a>
          </li>
          <li className="menu-item">
            <a href="">Long Link Text</a>
          </li>
        </ul>
      </div>
    )
  }
})

export default menu
