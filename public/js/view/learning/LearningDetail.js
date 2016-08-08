import React from "react";
import{ Element  } from 'react-scroll';
import {SwapDomElement} from "../components/Helper";
export default class LearningDetail extends React.Component {

  constructor() {
    super();
  }


  componentDidMount() {
      if ($(window).width() < 640) {
        SwapDomElement($('.learningDetailPanel-2 .row'));
      }
  }

  render() {

    return (
      <div id="wrainbo-intro-detail" class="learning-detail">
        <div class="learningDetailPanel-1">

          <section class="row">
            <div class="medium-6 columns">
              <img src="image/learning/demo-frame.jpg" />
            </div>
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
                <h1>IN-GAME LIBRARY</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                The library content matches campaign level to provide cross-disciplinary
                learning related with business analytics.
              </p>
            </div>
          </section>
        </div>

        <div class="learningDetailPanel-2">

          <section class="row">
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
                <h1>REAL WORLD CASES</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                Business cases are embedded in library to help players and learners
                link the learned concpets to real world applications.
              </p>
            </div>

            <div class="medium-6 columns">
              <img src="image/learning/demo-case.jpg" />
            </div>

          </section>
        </div>

        <div class="learningDetailPanel-3">

          <section class="row">
            <div class="medium-6 columns">
              <img src="image/learning/demo-quiz.jpg" />
            </div>
            <div class="medium-6 columns">
              <img class="breakline" src="image/icon/breakline.png"></img>
                <h1>QUIZ & CERTIFICATE</h1>
              <img class="breakline" src="image/icon/breakline.png"></img>

              <p>
                In addition to business concepts and cases, quizes will help
                players grasp the concepts firmly and provide validated data toward
                personalized cap-stone tests and the Magitech Certification
              </p>
            </div>
          </section>
        </div>



      </div>
    );
  }
}
