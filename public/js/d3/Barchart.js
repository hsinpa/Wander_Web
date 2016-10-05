var BarChart = (function () {
  var GetValue = function(value) {
    return (value < 0) ? 0 :value;
  }

  return {
    Plot : function(DOMTarget, jsonData, axisSelect, xAxisTile, yAxisTitle) {
      //Setting
      var target = $(DOMTarget),
          yMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.y]) } ),
          xMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.x]) } ),
          sWidth = target.width(), sHeight =  target.height(),
          space = 40,
          MARGINS = {
              top: 20,
              right: 20,
              bottom: 60,
              left: 50
          },
          yScale, xScale,
          chart = d3.select(DOMTarget);
        if ( isNaN (parseInt(jsonData[0][axisSelect.x]) )) {
          xScale = d3.scaleLinear().range([MARGINS.left, sWidth - MARGINS.right]);
        } else {
          xScale = d3.scaleLinear().range([MARGINS.left, sWidth - MARGINS.right]).domain([0,xMax[axisSelect.x]]);
        }

        if ( isNaN(parseInt(jsonData[0][axisSelect.y]) )) {
          yScale  = d3.scaleLinear().range([sHeight - MARGINS.top, MARGINS.bottom, 0]);
        } else {
          yScale = d3.scaleLinear().domain([0, yMax[axisSelect.y]]).range([sHeight - (MARGINS.top ), MARGINS.bottom]);
        }


        chart
        .selectAll("rect")
        .data(jsonData)
        .enter()
        .append("rect")
        .attr("width", 20)
        .attr("height", function(d) { return GetValue( (sHeight -space)- yScale(d[axisSelect.y])) ;})
        .attr("x", function(d,i) {return (xScale(d[axisSelect.x]) )  ;})
        .attr("y", function(d) {  return  yScale(d[axisSelect.y]) ; } );

        var xAxis = d3.axisBottom(xScale).ticks(jsonData.length);
        var yAxis = d3.axisLeft(yScale);
        //
        // chart.append('path')
        //   .attr({
        //     'd': line(data),
        //     'stroke': '#09c',
        //     'fill': 'none'
        //   });

        chart.append('g').attr("id", "xAxisG")
         .call(xAxis);  //call axisX

        chart.append('g').attr("id", "yAxisG")
         .call(yAxis);  //call axisY


       //Axis x title
       chart.append("svg:text")      // text label for the x axis
       .attr("x", (sWidth/2) + MARGINS.right )
       .attr("y", sHeight -3 )
       .style("text-anchor", "middle")
       .text(xAxisTile);

       //Axis y title
       chart.append("svg:text")
       .attr("text-anchor", "middle")  // this makes it easy to centre the text as the transform is applied to the anchor
       .attr("transform", "translate("+ (MARGINS.right) +","+(sHeight/2)+")rotate(-90)")  // text is drawn off the screen top left, move down and out and rotate
       .text(yAxisTitle);

        d3.selectAll("#xAxisG").attr("transform","translate("+(0)+", "+(sHeight - space )+")");
        d3.selectAll("#yAxisG").attr("transform","translate("+(space +10)+", "+(sHeight - ( sHeight - space ) - 60 )+")")
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", space)
        .attr("dy", ".71em")
        .text("Coin");
    },
  }
})();
