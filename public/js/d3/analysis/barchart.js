var BarChart = (function () {


  return {
    Plot : function(jsonData, axisSelect) {
      //Setting
      var yMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.y]) } ),
          xMax = _.max(jsonData , function(g) {return parseInt(g[axisSelect.x]) } ),
          sWidth = $("svg.chart").width(), sHeight =  $("svg.chart").height(),
          space = 40,
          margin = {top: 20, right: 20, bottom: 30, left: 40},
          yScale, xScale,
          chart = d3.select("svg.chart");

        if ( isNaN (parseInt(jsonData[0][axisSelect.x]) )) {
          xScale  = d3.scaleOrdinal().range([0, sWidth - space - 40]);
        } else {
          xScale = d3.scaleLinear().domain([0, xMax[axisSelect.x]]).range([0, sWidth - space - 40]);
        }

        if ( isNaN(parseInt(jsonData[0][axisSelect.y]) )) {
          yScale  = d3.scaleOrdinal().range([sHeight - space -20, 0]);
        } else {
          yScale = d3.scaleLinear().domain([0, yMax[axisSelect.y]]).range([sHeight - space -20, 0]);
        }


        chart
        .selectAll("rect")
        .data(jsonData)
        .enter()
        .append("rect")
        .attr("width", 13)
        .attr("height", function(d) { return (sHeight -space - 10)- yScale(d[axisSelect.y]);})
        .attr("x", function(d,i) {return (xScale(d[axisSelect.x]) ) + space  ;})
        .attr("y", function(d) {  return  yScale(d[axisSelect.y]); } );

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

        //  vis.append("svg:g")
        //      .attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
        //      .call(xAxis);
         //
        //  vis.append("svg:g")
        //      .attr("transform", "translate(" + (MARGINS.left) + ",0)")
        //      .call(yAxis);


         d3.selectAll("#xAxisG").attr("transform","translate("+space+" ,"+(sHeight - space  - 10)+")");
         d3.selectAll("#yAxisG").attr("transform","translate("+space+","+(sHeight -( sHeight - space ) - 30 )+")")
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", space)
        .attr("dy", ".71em")
        .text("Coin");



    },
  }
})();
