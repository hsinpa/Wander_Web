$(document).ready(function(){
  var mChartType = "line", mFilterData = [],
      axisSelect =  {
        "y" : "coin",
         "x" :"level"
      };

  //Init
  $.get( "http://wrainbo.com/analytics/allUserID", function( data ) {
      data = JSON.parse( data);
      var optionString = "";

      for (var key in data){
        optionString += "<option value='"+data[key].guid+"'>"+data[key].guid+"</option>";
      }

      $(".userSelecter").append(optionString);
  });

  //Select Panel Click
  $("form select").change(function(){
      if ($(this).val() != "") {
          //Click Event
          Setup( $(this).val() );
      }
  });

  //Select xy Axsi Click
  $(".AxisSelect").change(function(){
      if ($(this).val() != "") {
          //Click Event
          axisSelect[ $(this).attr("axis") ] = $(this).val();
          PlotChart();
          //Setup( $(this).val() );
      }
  });


  //Change Chart Type
  $( "button" ).click(function() {
    mChartType = $(this).val();
    PlotChart();
  });

  function PlotChart() {
    //Clear svg content
    $("svg").html("");

    switch (mChartType) {
      case "bar":
        BarChart.Plot(mFilterData, axisSelect);

      break;
      case "line":
        LineChart.Plot(mFilterData);

      break;
    }
  }


  function Setup(p_guid) {
    $.get( "http://wrainbo.com/analytics/score/"+p_guid, function( data ) {
      var jsonData = JSON.parse(data);

      if (jsonData.length <= 0) return;
      var axisString = "<option value=''>Pick One</option>",
          keyList = Object.keys( jsonData[0]);
      //console.log( JSON.parse(data) );
      mFilterData = [];

      var groupData = _.groupBy(jsonData, function(j){
         return j.level;
        });

      _.each(groupData, function(data) {
        mFilterData.push(_.max(data , function(g) {
              return g.coin;
            })
          );
        });
      console.log(mFilterData);
      PlotChart( );

      //Set Axis Select
      for (var i in keyList){
        axisString += "<option value='"+keyList[i]+"'>"+keyList[i]+"</option>";
      }
      $(".AxisSelect").html("");
      $(".AxisSelect").append(axisString);
    });
  }
});
