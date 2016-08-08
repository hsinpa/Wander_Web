var BarChart = (function () {


  return {
    Plot : function(jsonData) {
      //Setting
      var yMax = _.max(jsonData , function(g) {return parseInt(g.coin) } ),
          xMax = _.max(jsonData , function(g) {return parseInt(g.level) } ),
          sWidth = $("svg.chart").width(), sHeight =  $("svg.chart").height(),
          space = 40,
          yScale = d3.scaleLinear().domain([ yMax.coin,0]).range([0, sHeight - space - 10]),
          xScale = d3.scaleLinear().domain([0, xMax.level]).range([0, sWidth - space - 40]),

          chart = d3.select("svg.chart");

        chart
        .selectAll("rect")
        .data(jsonData)
        .enter()
        .append("rect")
        .attr("width", 13)
        .attr("height", function(d) {return yScale(d.coin);})
        .attr("x", function(d,i) {return (xScale(d.level) ) + space  ;})
        .attr("y", function(d) {  return sHeight - yScale(d.coin) - space; } );

        var xAxis = d3.axisBottom(xScale).ticks(jsonData.length);
        var yAxis = d3.axisLeft(yScale) .ticks(jsonData.length);
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

         d3.selectAll("#xAxisG").attr("transform","translate("+space+" ,"+(sHeight - space )+")");
         d3.selectAll("#yAxisG").attr("transform","translate("+space+","+(sHeight -( sHeight - space+30 ) )+")")
         .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", space)
        .attr("dy", ".71em")
        .text("Coin");



    },
  }
})();
