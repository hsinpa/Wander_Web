import React from "react";
import { Link, Route } from 'react-router';
import ReactDOM from "react-dom";
import{ Scroll, Link as Scroll_Link } from 'react-scroll';

export default class Header extends React.Component {
  constructor() {
      super();
      $(".off-canvas-list a").click(function () {
                $("#offCanvas").foundation('close');
      });
  }

  CreateLink(destination, name) {
    var path = this.props.route.path;

    return (path == undefined) ?<Scroll_Link  to={destination} spy={true} smooth={true} duration={500}>{name}</Scroll_Link> :
     <Link to={destination}>{name}</Link>;
  }

  render() {

    return (
      <header class="top-bar">
        <div class="title-bar-left show-for-small-only">
          <button class="menu-icon" type="button" data-open="offCanvas"></button>
          <span class="title-bar-title">
            <Link to="/" ><span class="title-bar-title">HOME</span></Link>
          </span>
        </div>




          <div class="top-bar-title show-for-medium">
            <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
              <span class="menu-icon dark" data-toggle></span>
            </span>
            <Link to="/" ><img src="image/icon/logo.png" /></Link>

          </div>
          <div id="responsive-menu">
            <div class="top-bar-left">
              <ul class="dropdown menu" data-dropdown-menu>
                <li><Link to="/" isHome="true">HOME</Link></li>
                <li><Link to="gameplay">GAMEPLAY</Link></li>
                <li><Link to="learning">LEARNING</Link></li>
                <li><Link to="aboutUs" >ABOUT US</Link></li>
              </ul>
            </div>

          </div>
      </header>

     );
  }
}
