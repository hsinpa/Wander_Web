import React from "react";

export default class Avatar extends React.Component {
  render() {
    return (
          <div id="mppf-avatar">
            <div class="row">
              <img src="image/test/circleIcon.png" class="medium-4 columns"></img>
              <section class="medium-8 columns">
                <h5>Name</h5>
                <p>經驗 8年</p>
              </section>

            </div>
          </div>
    );
  }
}
