var UsageManager = (function() {
  var grabChartData = {}, currentChartState, totalTime, totalCompletion,
      totalUserLevel;

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
        var data = [], max = _.max(userLevel, function(x){ return parseInt( x.MaxLevel ); }).MaxLevel;
        console.log(max);
        for (var i = 1; i <= max; i++) {
          var number = _.countBy(userLevel, function(x) {
                      return x.MaxLevel == i;
                    }).true;
          data.push({"level" : i, "number": (isNaN(number)) ? 0 :number });
        }
        return data;
      }
    };

  var LoadChart = function() {
    $(".lineChart-holder").html("");

    LineDateChart.Plot(".lineChart-holder", grabChartData[currentChartState].data,
      grabChartData[currentChartState].xAxis, grabChartData[currentChartState].yAxis);
  }

  function Init() {
    //Toggle
    $( "#wrainbo-cms-assessment-usage" ).on('click', '.swap', function(e) {
      currentChartState = (currentChartState == "total_level") ? "total_time" : "total_level";
      console.log(currentChartState);
      $(".lineChart-holder").html("");
      LineDateChart.Plot(".lineChart-holder", grabChartData[currentChartState].data,
        grabChartData[currentChartState].xAxis, grabChartData[currentChartState].yAxis);
    });

    //Load
    $.get( "getUsageData", function( data ) {
        data = JSON.parse( data);
        totalTime = data.totalPlay;
        totalCompletion = data.totalLevel;
        totalUserLevel = data.userLevel;
        currentChartState = "total_level";

        Parse.Increment(totalTime.data, "time", "date");
        Parse.Increment(totalCompletion.data, "levels", "create_time");

        grabChartData["total_level"] = totalCompletion;
        grabChartData["total_time"] = totalTime;
        LoadChart();
        BarChart.Plot(".barChart-holder", Parse.UserLevel(totalUserLevel),
         {x:"level", y:"number"}, "Level", "Number of People");
      });
    }

    return {
      "Init" : Init,
      "Load" : LoadChart
    };

})();
