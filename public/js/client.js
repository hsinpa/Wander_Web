import React from "react";
import ReactDOM from "react-dom";
import { Router, Route, IndexRoute, browserHistory } from 'react-router';
import Layout from "./view/layout/Layout";
import Home from "./view/home/Home";

import AboutUs from "./view/aboutUs/AboutUs";
import Learning from "./view/learning/Learning";
import GamePlay from "./view/gameplay/GamePlay";
import createBrowserHistory from 'history/lib/createBrowserHistory';

require("../css/main/app.scss");


const app = document.getElementById('app');
//createBrowserHistory()

ReactDOM.render((
  <Router history={browserHistory}
    onUpdate={function() {
        window.scrollTo(0, 0);
      }}>
    <Route path="/" name="home" component={Layout}>
      <IndexRoute component={Home} ></IndexRoute>
        <Route path="aboutUs" name="aboutUs" component={AboutUs}></Route>
        <Route path="gameplay" name="gameplay" component={GamePlay}></Route>
        <Route path="learning" name="learning" component={Learning}></Route>
        <Route path="*" component={Home}/>
    </Route>
  </Router>
), app)
