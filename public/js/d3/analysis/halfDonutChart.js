var HalfDonutChart = (function () {


  return {
    Plot : function(jsonData) {

      var w = 500,                        //width
      h = 500,                            //height
      r = 400,                            //radius
      ir = 350,
      pi = Math.PI,
      color = d3.scaleOrdinal(d3.schemeCategory20c),
      maxLevel = 10;

      console.log(jsonData);
      data = [{"label":"ewe", "value":jsonData.length},
              {"label":"two", "value": 10 - jsonData.length }];

      var vis = d3.select("svg")
                  .data([data])
                  .attr("width", w)
                  .attr("height", h)
                  .append("svg:g")
                  .attr("transform", "translate(" +(w - 25) + "," + h + ")")

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
          $("#vizcontainer .textGroup h3").html((jsonData.length/maxLevel ) *100 );
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
