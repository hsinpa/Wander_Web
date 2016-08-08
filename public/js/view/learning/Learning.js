import React from "react";
import{ Element  } from 'react-scroll';
import{ Scroll, Link as Scroll_Link } from 'react-scroll';
import LearningDetail from "./LearningDetail";
import {SetToScreenHeight} from "../components/Helper";

export default class Learning extends React.Component {

  componentDidMount() {
    SetToScreenHeight( $("#wrainbo-intro-main"));
  }


  render() {

    return (
      <article id="wrainbo-intro">
      <div id="wrainbo-intro-main" class="learning-bg">
            <h4>MAGITECH</h4>

            <h1>LEARNING</h1>

            <p>Link gameplay to business concepts and cases.</p>
            <p>Master Economcis, Statistics, and Accounting</p>

            <img class="breakline" src="image/icon/breakline_yellow.png"></img>
              <div class="detail-bt">
                <Scroll_Link to="detail" spy={true} smooth={true} duration={500}>

                <img src="image/icon/icon-detail.png"></img>
                <span>Detail</span>
                </Scroll_Link>

              </div>
      </div>

      <Element name="detail">
        <LearningDetail />
      </Element>


      </article>
    );
  }
}
