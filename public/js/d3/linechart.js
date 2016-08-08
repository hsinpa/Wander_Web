var LineChart = (function () {


  return {
    Plot : function(jsonData) {
      var yMax = _.max(jsonData , function(g) {return parseInt(g.coin) } ),
          xMax = _.max(jsonData , function(g) {return parseInt(g.level) } );
      var vis = d3.select(".chart"),
          WIDTH = $("svg.chart").width(),
          HEIGHT =  $("svg.chart").height(),
          MARGINS = {
              top: 20,
              right: 20,
              bottom: 20,
              left: 50
          },
        xScale = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([0,xMax.level]),
        yScale = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, yMax.coin]),
        xAxis = d3.axisBottom(xScale).ticks(xMax.level),
        yAxis = d3.axisLeft(yScale);


        vis.append("svg:g")
            .attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
            .call(xAxis);

        vis.append("svg:g")
            .attr("transform", "translate(" + (MARGINS.left) + ",0)")
            .call(yAxis);


        //Line
        var lineGen = d3.line()
            .x(function(d) {
              return xScale(d.level);
            })
            .y(function(d) {
              return yScale(d.coin);
            });

        vis.append('svg:path')
              .attr('d', lineGen(jsonData))
              .attr('stroke', 'green')
              .attr('stroke-width', 2)
              .attr('fill', 'none');
      }
  }
})();
