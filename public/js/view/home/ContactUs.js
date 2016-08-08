import React from "react";
import { Element  } from 'react-scroll';
import Footer from "../layout/Footer";

export default class ContactUs extends React.Component {

  constructor() {
      super();
      this.state = {email : ""};
  }

  SubmitEmail(event) {
    event.preventDefault();
    var email = $("#wrainbo-home-contactus form input[type='email']");

    if (email.val() == "") {
        alert("No Empty");
      } else {
        var googleFormID="1BkZ-z9URb8hloY3O4ATzfqaDDoBUkn2hTH3hbtaXe2E";
        $.ajax({
          url: "https://docs.google.com/forms/d/"+googleFormID+"/formResponse",
          data: {"entry.1505027198": email.val() },
          type: "POST",
          dataType: "xml"})
          .done(function() {
         });
         alert("Success");
         email.val("");
      }
  }

  render() {
    return (
      <div id="wrainbo-home-contactus">
        <Element name="beta_signup">
        <div class="row">
          <img src="image/icon/wrainbo_icon.png" />
            <div class="large-12 columns">
              <h1>BETA SIGN-UP</h1>
              <div class="breakline"></div>
              <div class="row">

                <p>Magitech will roll out private beta in June.<br/>
                  Please sign up if you are interested in playing the beta version for free.</p>
              </div>
              <form onSubmit={this.SubmitEmail.bind(this)}>
                <input type="email"  placeholder="Email"></input>
                <input type="submit" value="SUBMIT"/>
              </form>
              </div>
              <Footer/>

        </div>
        </Element>
      </div>
    );
  }
}
