import React from "react";
import Header from "./Header";
import Footer from "./Footer";

export default class Layout extends React.Component {
  componentDidMount() {
    $(document).foundation();
  }

  render() {

    return (
      <div>
        <Header route={this.props.routes[this.props.routes.length-1]}/>
          {this.props.children}
      </div>
    );
  }
}
