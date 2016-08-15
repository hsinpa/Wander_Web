$(document).ready(function(){

  $("form select").change(function(){
      if ($(this).val() != "") {
          //Click Event
          Setup( $(this).val() );
      }
  });


  $.get( "http://wrainbo.com/analytics/allUserID", function( data ) {
      data = JSON.parse( data);
      var optionString = "";
      for (var key in data){
        optionString += "<option value='"+data[key].guid+"'>"+data[key].guid+"</option>";
      }
      $("form select").append(optionString);
  });


  function Setup(p_guid) {
    $.get( "http://wrainbo.com/analytics/score/"+p_guid, function( data ) {
      var jsonData = JSON.parse(data);
      //console.log( JSON.parse(data) );

      var filterData = [], groupData = _.groupBy(jsonData, function(j){

         return j.level;
        });

      _.each(groupData, function(data) {
        filterData.push(_.max(data , function(g) {
              return g.coin;
            })
          );
        });

      console.log(filterData);
      //Clear svg content
      $("svg").html("");

      PlotBarChart(filterData);
      PlotLineChart(filterData);

    });
  }


  function PlotLineChart(scatterData) {
    var width = 20, height =  $("svg.linechart").height(), space = 15;

    var maxLevel = _.max(scatterData , function(g) {return parseInt(g.level) } );
    var yMax = _.max(scatterData , function(g) {return parseInt(g.coin) } );


    var xScale = d3.scaleLinear().domain([0, maxLevel.level]).range([0,100]);
    var yScale = d3.scaleLinear().domain([ 0, yMax.coin] ).range([0,100]);

          d3.select("svg.linechart")
          .selectAll("circle")
          .data(scatterData).enter()
          .append("circle")
          .attr("r", 5)
          .attr("cx", function(d) { return xScale(d.level); })
          .attr("cy", function(d) { return height - yScale(d.coin) - space; });


      var yAxis = d3.axisRight(yScale);
        d3.select("svg.linechart").append("g").attr("id", "yAxisG").call(yAxis);
      var xAxis =  d3.axisBottom(xScale).ticks(maxLevel.level);;
        d3.select("svg.linechart").append("g").attr("id", "xAxisG").call(xAxis);


       d3.selectAll("path.domain").style("fill", "none").style("stroke", "black");
       d3.selectAll("line").style("stroke", "black");
       d3.selectAll("#xAxisG").attr("transform","translate(0,"+(height -space )+")");
       d3.selectAll("#yAxisG").attr("transform","translate(0,"+(200)+")");

  }


  function PlotBarChart(jsonData) {

    var yMax = _.max(jsonData , function(g) {return parseInt(g.coin) } ),
        yScale = d3.scaleLinear().domain([0, yMax.coin]).range([0, 100]),
        width = 20, height =  $("svg.barchart").height();

      d3.select("svg.barchart")
      .selectAll("rect")
      .data(jsonData)
      .enter()
      .append("rect")
      .attr("width", 20)
      .attr("height", function(d) {return yScale(d.coin);})
      .style("fill", "blue")
      .style("stroke", "red")
      .style("stroke-width", "1px")
      .style("opacity", 0.25)
      .attr("x", function(d,i) {return (i *20 * 1.1);})
      .attr("y", function(d) {  return height - yScale(d.coin); } );

      AddLabel(jsonData, width, height);
  }

  function AddLabel(p_jsonData, p_width, p_height) {
    var text =
        d3.select("svg.barchart").selectAll("text")
        .data(p_jsonData)
        .enter()
        .append("text")
        .attr("x", function(d, i) { return (i *20 * 1.1); })
        .attr("y", function(d) { return p_height-10; })
        .text( function (d) { return d.coin; })
        .attr("font-family", "sans-serif")
        .attr("font-size", "5px")
        .attr("fill", "black");

  }
});
