import React from "react";

export default class NewsFeed extends React.Component {
  render() {
    return (
          <div id="mppf-news-feeds">
            <ul>
              <li><h4>最新消息</h4></li>
              <li><div class="row">
                <img src="image/test/circleIcon.png" class="small-4 columns"></img>
                <section  class="small-8 columns">
                  <h5>旅程開始</h5>
                  <p>現在航海是一份既安全又先記得專業,不單待遇呦厚而已前途無限．請</p>
                </section>
              </div></li>
              <li><div>
                <img src=""></img>
                <section>
                  <h5>旅程開始</h5>
                  <p>現在航海是一份既安全又先記得專業,不單待遇呦厚而已前途無限．請</p>
                </section>
              </div></li>
            </ul>
          </div>
    );
  }
}
