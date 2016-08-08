"use strict";

var React = require('react');
var ReactDOM = require('react-dom');
var _ = require("lodash");

//https://github.com/ryanflorence/react-training/blob/gh-pages/lessons/05-wrapping-dom-libs.md

var Orbit = React.createClass({

    propTypes: {
		items: React.PropTypes.array.isRequired
	},

    componentDidMount: function() {
        // keep track of the node we render in
        this.node = ReactDOM.findDOMNode(this);

        this.renderOrbit();

        this.orbit = new Foundation.Orbit($(this.node.firstChild), {
            bullets: true,
            navButtons: true,
            autoPlay: false
        });

    },

    componentWillUnmount: function() {
        ReactDOM.unmountComponentAtNode(this.node);
        this.orbit.destroy();
    },

    componentWillReceiveProps: function(props) {
        this.renderOrbit(props);
    },

    renderOrbit: function(props) {

        // default to component's props if none were specifically passed in
        props = props || this.props;

        var slides = [];
        var bullets = [];
        var slideClass = "orbit-slide is-active";
        var bulletClass = "is-active";

        _.each(props.items, function(item, index){
            slides.push(
                <li className={slideClass} key={"slides_"+index}>
                    {item}
                </li>
            );

            bullets.push(
                <button className={bulletClass} data-slide={index} key={"bullets_"+index}>
                    <span className="show-for-sr">{index + 1}</span>
                </button>
            );

            slideClass = "orbit-slide";
            bulletClass = "";
        });

        ReactDOM.render(
            <div className="orbit" role="region" data-orbit>
                <ul className="orbit-container">
                    <button className="orbit-previous" aria-label="previous">
                        <span className="show-for-sr">Previous Slide</span>&#9664;
                    </button>
                    <button className="orbit-next" aria-label="next">
                        <span className="show-for-sr">Next Slide</span>&#9654;
                    </button>
                    {slides}
                </ul>
                <nav className="orbit-bullets">
                    {bullets}
                </nav>
            </div>
        , this.node);

    },

    render: function() {
        //Create a react portal pattern by rendering an empty element here
        return (
            <div></div>
        );
    },

});

module.exports = Orbit;
