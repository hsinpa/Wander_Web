var BarChart = (function () {
  var GetValue = function(value) {
    return (value < 0) ? 0 :value;
  }

  return {
    Plot : function(DOMTarget, jsonData, axisSelect) {
      //Setting
      var target = $(DOMTarget),
          yMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.y]) } ),
          xMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.x]) } ),
          sWidth = target.width(), sHeight =  target.height(),
          space = 40,
          MARGINS = {
              top: 20,
              right: 20,
              bottom: 20,
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
          yScale = d3.scaleLinear().domain([0, yMax[axisSelect.y]]).range([sHeight - MARGINS.top, MARGINS.bottom]);
        }


        chart
        .selectAll("rect")
        .data(jsonData)
        .enter()
        .append("rect")
        .attr("width", 20)
        .attr("height", function(d) { return GetValue( (sHeight -space - 10)- yScale(d[axisSelect.y])) ;})
        .attr("x", function(d,i) {return (xScale(d[axisSelect.x]) )-10  ;})
        .attr("y", function(d) {  return  yScale(d[axisSelect.y]) +30; } );

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


        d3.selectAll("#xAxisG").attr("transform","translate("+(-10)+", "+(sHeight - space + 20)+")");
        d3.selectAll("#yAxisG").attr("transform","translate("+space+", "+(sHeight - ( sHeight - space ) - 40 )+")")
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", space)
        .attr("dy", ".71em")
        .text("Coin");
    },
  }
})();
