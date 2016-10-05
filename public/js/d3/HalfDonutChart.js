var HalfDonutChart = (function () {
  function FindLineTwo(length, angle) {
    return {x : (Math.cos(angle) * length), y : (length * Math.sin(angle))};
  }

  return {
    Plot : function(DOMTarget, data, p_angle) {

      var w = $(DOMTarget).width(),                        //width
      h = $(DOMTarget).height(),                            //height
      r = w/2.5,                            //radius
      ir = w/3,
      pi = Math.PI,
      colorOld = d3.scaleOrdinal(d3.schemeCategory20c),

      color = d3.scaleLinear().range(
        ["#e74c3c", "#f1c40f", "#2ecc71"]).domain([0, 80, 100]);



      var vis = d3.select(DOMTarget)
                  .data([data])
                  .attr("width", w)
                  .attr("height", h )
                  .append("svg:g")
                  .attr("transform", "translate(" +(r +30) + "," + (r+10) + ")")

      var arc = d3.arc()
                  .outerRadius(r)
  		            .innerRadius(ir);

      var pie = d3.pie()
                  .value(function(d) { return d.value; })
                  .startAngle(-90 * (pi/180))
                  .endAngle(90 * (pi/180)).sort(null);

      var arcs = vis.selectAll("g.slice")
                    .data(pie)
                    .enter()
                    .append("svg:g")
                    .attr("class", "slice");

          arcs.append("svg:path")
              .attr("fill", function(d, i) {
                 return color(i); } )
              .attr("d", arc);


          //Arrow
          var x = w/2, y = h, length = r - 10, angle = Math.floor((Math.random() * 60) + 0),
              pos2 = FindLineTwo(length, p_angle);
          var circle = d3.select(DOMTarget).append("line")
                .attr("x1", x)
                .attr("y1", y)
                .attr("x2",x+ (pos2.x))
                .attr("y2", y - Math.abs( pos2.y))
                .attr("stroke-width", 2)
                .attr("stroke", "black")
                .attr({
                'transform': function(d){
                  return 'rotate(-90)';
                }
              });


          //Main Score
          // $("#vizcontainer .textGroup h3").html("Score " +(data[0].value) );
          //Average Score
          // $("#vizcontainer .textGroup h5").html("Average" + 10);
          //Current level
          // $("#vizcontainer .textGroup h4").html("Level " +jsonData.length);


          // arcs.append("svg:text")
          //         .attr("transform", function(d) {
          //
          //         return "translate(" + arc.centroid(d) + ")";
          //     })
          //     .attr("text-anchor", "middle")
          //     .text(function(d, i) { return data[i].label; });
      }
  }
})();
