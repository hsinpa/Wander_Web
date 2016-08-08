import React from "react";
import { Link, Route } from 'react-router';

export default class IntroPortal extends React.Component {


  render() {
    return (
      <div id="wrainbo-home-introPortal">
        <div class="row" data-equalizer >

          <div class="introPortal-gameplay medium-6 columns" data-equalizer-watch>
            <h3>MAGITECH</h3>
            <h1>GAMEPLAY</h1>

            <p>
              Analyze, produce, and trade in a world where magic meets technology
            </p>
            <Link to="gameplay">LEARN MORE</Link>
          </div>

          <div class="introPortal-learning medium-6 columns" data-equalizer-watch>
            <h3>MAGITECH</h3>
            <h1>LEARNING</h1>
              <p>
               Link gameplay to business concepts and cases
              </p>
              <Link to="learning">LEARN MORE</Link>
            </div>
        </div>
      </div>
    );
  }
}
