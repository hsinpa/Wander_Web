var LineDateChart = (function () {

  return {
    Plot : function(DOMTarget, jsonData) {
      if (jsonData.length <= 0) return;

      var formatDate = d3.timeFormat("%y-%m-%d"),
          yMax = _.max(jsonData , function(g) {return parseInt(g.y) } ),
          xMax = new Date(jsonData[jsonData.length - 1].x),
          xMin = new Date(jsonData[0].x),

          vis = d3.select(DOMTarget),
          WIDTH = $(DOMTarget).width(),
          HEIGHT =  $(DOMTarget).height(),
          MARGINS = {
              top: 20,
              right: 20,
              bottom: 20,
              left: 50
          },
        xScale = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([xMin, xMax]),
        yScale = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, yMax.y]),
        xAxis = d3.axisBottom(xScale).ticks( 4 ).tickFormat(d3.timeFormat("%y-%m-%d")),
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
              return xScale(  new Date(d.x ));
            })
            .y(function(d) {
              return yScale(d.y);
            });

        vis.append('svg:path')
              .attr('d', lineGen(jsonData))
              .attr('stroke', 'green')
              .attr('stroke-width', 2)
              .attr('fill', 'none');
      }
  }
})();
