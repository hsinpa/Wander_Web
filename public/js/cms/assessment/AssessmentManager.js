$(document).ready(function(){
//Global Data
var grabChartData = {}, currentChartState;



  var Parse = {
    Completion : function (){},
    Increment : function(data, yString, xString) {
      var increment = 0;
      for (var i in data) {
            increment += parseInt( data[i][yString]);
            data[i].y = increment;
            data[i].x =  data[i][xString];
      }
      return data;
    },
    UserLevel : function(userLevel) {
        var data = [], max = _.max(userLevel, function(x){ return x.MaxLevel; }).MaxLevel;
        for (var i = 1; i <= max; i++) {
          var number = _.countBy(userLevel, function(x) {
                      return x.MaxLevel == i;
                    }).true;
          data.push({"level" : i, "number": (isNaN(number)) ? 0 :number });
        }
        return data;
    }
  };


  //Toggle
  $( "#wrainbo-cms-assessment-usage" ).on('click', '.swap', function(e) {
    currentChartState = (currentChartState == "total_level") ? "total_time" : "total_level";
    $(".lineChart-holder").html("");
    LineDateChart.Plot(".lineChart-holder", grabChartData[currentChartState]);
  });

  //Load
  $.get( "getUsageData", function( data ) {
      data = JSON.parse( data);
      var totalTime = data.totalPlay,
      totalCompletion = data.totalLevel,
      totalUserLevel = data.userLevel;
      currentLineChartState = "total_level";
      console.log(Parse.Increment(totalTime, "time", "date") );
      Parse.Increment( totalCompletion, "levels", "create_time");

      grabChartData["total_level"] = totalCompletion;
      grabChartData["total_time"] = totalTime;

      LineDateChart.Plot(".lineChart-holder", totalCompletion);
      BarChart.Plot(".barChart-holder", Parse.UserLevel(totalUserLevel),
       {x:"level", y:"number"});
  });
});
