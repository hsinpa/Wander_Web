import React from "react";
import{ Element  } from 'react-scroll';
import AboutUsDetail from "./AboutUsDetail";
import AboutUsContact from "./AboutUsContact";

import {SetToScreenHeight} from "../components/Helper";

import{ Scroll, Link as Scroll_Link } from 'react-scroll';

export default class AboutUs extends React.Component {
  componentDidMount() {
    SetToScreenHeight( $("#wrainbo-aboutus-main"));
  }
  render() {

    return (
      <article id="wrainbo-aboutus">
        <div id="wrainbo-aboutus-main">

        <img class="aboutUsMainIcon" src="image/aboutus/ic-wrainbo.png"></img>
        <h5>「 Intelligence Learning Studio 」</h5>
        <h1>MAKE LEARNING ENGAGING AND EFFECTIVE</h1>
            <Scroll_Link to="detail" spy={true} smooth={true} duration={500}>
                <img src="image/aboutus/bt-seehow.png"></img>
              </Scroll_Link>
        </div>

        <Element name="detail">
          <AboutUsDetail />
        </Element>
        <AboutUsContact />

      </article>
    );
  }
}
