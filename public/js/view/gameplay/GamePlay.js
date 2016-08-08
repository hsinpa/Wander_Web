import React from "react";
import{ Element  } from 'react-scroll';
import GamePlayDetail from "./GamePlayDetail";
import{ Scroll, Link as Scroll_Link } from 'react-scroll';
import {SetToScreenHeight} from "../components/Helper";

export default class GamePlay extends React.Component {

  componentDidMount() {
    SetToScreenHeight( $("#wrainbo-intro-main"));

  }


  render() {

    return (
      <article id="wrainbo-intro">
      <div id="wrainbo-intro-main" class="gameplay-bg">
          <h4>MAGITECH</h4>

          <h1>GAMEPLAY</h1>

          <p>Analyze, produce, and trade</p>
          <p>in a world where magic meets technology</p>
          <img class="breakline" src="image/icon/breakline_yellow.png"></img>
            <div class="detail-bt">
              <Scroll_Link to="detail" spy={true} smooth={true} duration={500}>

              <img src="image/icon/icon-detail.png"></img>
              <span>Detail</span>
              </Scroll_Link>

            </div>


      </div>

      <Element name="detail">
        <GamePlayDetail />
      </Element>

      </article>
    );
  }
}
