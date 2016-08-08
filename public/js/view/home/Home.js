import React from "react";
import{ Element  } from 'react-scroll';
import HeadBoard from "./HeadBoard";
import ProductIntro from "./ProductIntro";
import IntroPortal from "./IntroPortal";
import ContactUs from "./ContactUs";

export default class Home extends React.Component {

  render() {

    return (
      <div id="wrainbo-home">
        <HeadBoard />
        <ProductIntro />
        <IntroPortal />

        <Element name="contactUs">
          <ContactUs />
        </Element>
      </div>
    );
  }
}
