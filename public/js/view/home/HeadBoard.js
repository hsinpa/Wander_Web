import React from "react";
import { Element  } from 'react-scroll';
import {SetToScreenHeight} from "../components/Helper";
import{ Scroll, Link as Scroll_Link } from 'react-scroll';

export default class Home extends React.Component {

  componentDidMount() {
    $(".various").fancybox({
  		maxWidth	: 1400,
  		maxHeight	: 1200,
  		fitToView	: true,
  		width		: '90%',
  		height		: '90%',
  		autoSize	: true,
  		closeClick	: false,
  		openEffect	: 'none',
  		closeEffect	: 'none'
  	});
    SetToScreenHeight($("#wrainbo-home-headboard"));
  }

  // <img src="image/icon/bt_play.png"></img>
  // <video  autoPlay muted loop>
  //     <source src="video/sample.mp4" type="video/mp4" />
  // </video>
  render() {
    return (
      <div id="wrainbo-home-headboard">
        <section class="row">
          <img src="image/icon/wrainbo_icon.png" />
            <div class="large-12 columns">

              <div class="titleGroup">
                <h1>PLAY MOBILE GAME</h1>
                <h1>LEARN BUSINESS ANALYTICS</h1>
              </div>
              <div class="breakline"></div>

                  <a class="various fancybox.iframe" href="https://www.youtube.com/embed/ISmtuChPwx0?autoplay=1">
                    <img src="image/icon/bt_play.png" />WATCH TRAILER
                  </a>

                  <Scroll_Link to="beta_signup" spy={true} smooth={true} duration={800}>
                    <img src="image/icon/bt_beta.png" />BETA SIGN UP
                </Scroll_Link>
            </div>
        </section>
      </div>
    );
  }
}
