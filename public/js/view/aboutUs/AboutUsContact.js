import React from "react";
import{ Element  } from 'react-scroll';

export default class AboutUsContact extends React.Component {

  render() {

    return (
      <div id="wrainbo-aboutus-contact">
        <div class="row">
          <div class="medium-6 columns">
            <h1>CONTACT US</h1>
              <img class="worker-avatar" src="image/aboutus/ic-worker.png"></img>

          </div>
          <div class="medium-6 columns">
            <h3>SUGGESTION? IN-GAME ISSUE?</h3>
            <p>The player support is the very best resource
               for your questions about your game or your device.</p>
             <br/><br/>
             <section>
               <img src="image/icon/ic-arrow.png"></img>
               <a href="mailto:team@wrainbo.com">team@wrainbo.com</a>
             </section>

          </div>

        </div>
      </div>
    );
  }
}
