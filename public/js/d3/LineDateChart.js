var LineDateChart = (function () {

  return {
    Plot : function(DOMTarget, jsonData, xAxisTile, yAxisTitle) {
      if (jsonData.length <= 0) return;

      var formatDate = d3.timeFormat("%b-%d"),
          yMax = _.max(jsonData , function(g) {return g.y } ),
          xMax = new Date( jsonData[jsonData.length - 1].x.replace(/-/g, '\/') ),
          xMin = new Date(jsonData[0].x.replace(/-/g, '\/')),
          vis = d3.select(DOMTarget),
          WIDTH = $(DOMTarget).width(),
          HEIGHT =  $(DOMTarget).height(),
          MARGINS = {
              top: 40,
              right: 20,
              bottom: 40,
              left: 70
          },
        xScale = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([xMin, xMax]),
        yScale = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, yMax.y]),
        xAxis = d3.axisBottom(xScale).ticks( 4 ).tickFormat(formatDate),
        yAxis = d3.axisLeft(yScale);
        console.log(jsonData.length);
        vis.append("svg:g")
            .attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
            .call(xAxis);

        vis.append("svg:g")
            .attr("transform", "translate(" + (MARGINS.left) + ",0)")
            .call(yAxis);

        //Axis x title
        vis.append("svg:text")      // text label for the x axis
        .attr("x", (WIDTH/2) + MARGINS.right )
        .attr("y", HEIGHT -3 )
        .style("text-anchor", "middle")
        .text(xAxisTile);

        vis.append("svg:text")
        .attr("text-anchor", "middle")  // this makes it easy to centre the text as the transform is applied to the anchor
        .attr("transform", "translate("+ (MARGINS.right +10) +","+(HEIGHT/2)+")rotate(-90)")  // text is drawn off the screen top left, move down and out and rotate
        .text(yAxisTitle);

        //Line
        var lineGen = d3.line()
            .x(function(d) {
              return xScale(  new Date(d.x.replace(/-/g, '\/') ));
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
