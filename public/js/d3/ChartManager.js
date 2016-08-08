$(document).ready(function(){
  var mChartType = "line", mFilterData = [];
  //Init
  $.get( "http://wrainbo.com/analytics/allUserID", function( data ) {
      data = JSON.parse( data);
      var optionString = "";
      for (var key in data){
        optionString += "<option value='"+data[key].guid+"'>"+data[key].guid+"</option>";
      }
      $("form select").append(optionString);
  });

  //Select Panel Click
  $("form select").change(function(){
      if ($(this).val() != "") {
          //Click Event
          Setup( $(this).val() );
      }
  });

  //Change Chart Type
  $( "button" ).click(function() {
    mChartType = $(this).val();
    DisplayChart(mChartType);
  });

  function DisplayChart(p_chart) {
    //Clear svg content
    $("svg").html("");

    switch (mChartType) {
      case "bar":
        BarChart.Plot(mFilterData);

      break;
      case "line":
        LineChart.Plot(mFilterData);

      break;
    }
  }


  function Setup(p_guid) {
    $.get( "http://wrainbo.com/analytics/score/"+p_guid, function( data ) {
      var jsonData = JSON.parse(data);
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
      DisplayChart( mChartType );
    });
  }

});
