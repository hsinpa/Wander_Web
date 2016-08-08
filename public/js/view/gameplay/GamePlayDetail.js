import React from "react";
import{ Element  } from 'react-scroll';
import {SwapDomElement} from "../components/Helper";

export default class GamePlayDetail extends React.Component {

  componentDidMount() {
      if ($(window).width() < 640) {
        SwapDomElement($('.gameplayDetailPanel-2 .row'));
      }
  }

  render() {

    return (
      <div id="wrainbo-intro-detail" class="gameplay-detail">
        <div class="gameplayDetailPanel-1">

          <section class="row">
            <div class="medium-6 columns">
              <img src="image/gameplay/demo-crystalball.jpg" />
            </div>
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
              <h1>ANALYZE</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                A Magitech play session usually starts with analyzing data in "Crystal Ball".
                Those analysis informs players insights about customers, internal finance,
                spell effectiveness, among others. Great leaders think before acting.
              </p>
            </div>
          </section>
        </div>

        <div class="gameplayDetailPanel-2">

          <section class="row">
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
              <h1>PRODUCE</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                Once the analysis is done, players will need to produce the right types
                and quantity of clothing products. Things that need to consider include
                plant capacity, product differentiation, inventory issues, etc.
              </p>
            </div>

            <div class="medium-6 columns">
              <img src="image/gameplay/demo-production.jpg" />
            </div>

          </section>
        </div>

        <div class="gameplayDetailPanel-1">

          <section class="row">
            <div class="medium-6 columns">
              <img src="image/gameplay/demo-mainUI.jpg" />
            </div>
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
              <h1>TRADING</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                Finally, players could start to compete with competitors to trade with customers.
                Which customer segments to target? How much price to set? Which spell should the
                player cast? Questions abound but true champions will triumph by making tough decisions
                to maximize profits!
              </p>
            </div>
          </section>
        </div>



      </div>
    );
  }
}
