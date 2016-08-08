import React from "react";
import { Element  } from 'react-scroll';

export default class ProductIntro extends React.Component {
  componentDidMount() {
    $(".rslides").responsiveSlides({
      auto: true,
      pager: true,
      nav: true,
      speed: 500,
      timeout: 4000,
      maxwidth: 800,
      namespace: "transparent-btns"
    });
  }

  render() {
    return (
      <div id="wrainbo-home-productIntro">
        <h1>WHAT IS MAGITECH?</h1>
         <p class="intro_text">Magitech is a mobile game that teaches business analytics.
           Players will learn <span class="spotlight">Economics</span>,
           <span class="spotlight"> Statistics</span> and <span class="spotlight">Accounting </span>
           by analyzing, producing, and trading in this fantasy world.</p>

          <div class="row">
            <div class="rslides_container medium-12 columns">
            <ul class="rslides">
              <li><img src="image/gameplay/demo-mainUI.jpg" /></li>
              <li><img src="image/gameplay/demo-production.jpg" /></li>
              <li><img src="image/gameplay/demo-crystalball.jpg" /></li>
              <li><img src="image/learning/demo-quiz.jpg" /></li>
            </ul>
          </div>
        </div>

      </div>
    );
  }
}
