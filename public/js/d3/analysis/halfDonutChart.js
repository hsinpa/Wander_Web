var HalfDonutChart = (function () {


  return {
    Plot : function(jsonData, data) {

      var w = 500,                        //width
      h = 500,                            //height
      r = 300,                            //radius
      ir = 275,
      pi = Math.PI,
      color = d3.scaleOrdinal(d3.schemeCategory20c),
      maxLevel = 10;

      var vis = d3.select("svg")
                  .data([data])
                  .attr("width", w)
                  .attr("height", h )
                  .append("svg:g")
                  .attr("transform", "translate(" +(r +30) + "," + (r) + ")")

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
              .attr("fill", function(d, i) { return color(i); } )
              .attr("d", arc);


          //Main Score
          $("#vizcontainer .textGroup h3").html("Score " +(data[0].value) );
          //Average Score
          // $("#vizcontainer .textGroup h5").html("Average" + 10);
          //Current level
          $("#vizcontainer .textGroup h4").html("Level " +jsonData.length);


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
