"use strict";
var UsageManager = (function() {
  var grabChartData = {}, currentChartState, totalTime, totalCompletion,
      totalUserLevel, allUserName = [], grabUserChartData = {}, userState;

  var Parse = {
    Completion : function (){},
    Increment : function(data, yString, xString) {
      var increment = 0;
      for (var i in data) {
            increment += Math.round( data[i][yString] * 10 ) / 10;
            data[i].y = increment;
            data[i].x =  data[i][xString];
      }
      return data;
    },
    UserLevel : function(userLevel) {
        var data = [], max = _.max(userLevel, function(x){ return parseInt( x.MaxLevel ); }).MaxLevel;

        for (var i = 1; i <= max; i++) {
          var number = _.countBy(userLevel, function(x) {
                      return x.MaxLevel == i;
                    }).true;
          data.push({"level" : i, "number": (isNaN(number)) ? 0 :number });
        }
        return data;
      }
    };

  var LoadDefaultChart = function() {
    LoadLineChart(grabChartData);
    LoadBarChart(Parse.UserLevel(totalUserLevel), "Number of People");
  },
  LoadChart = function(p_organizationId) {
    $.get( "getUsageData/"+p_organizationId, function( data ) {
        data = JSON.parse( data);
        console.log(data);
        totalTime = data.totalPlay;
        totalCompletion = data.totalLevel;
        totalUserLevel = data.userLevel;
        currentChartState = "total_level";
        userState = "whole";

        Parse.Increment(totalTime.data, "time", "date");
        Parse.Increment(totalCompletion.data, "levels", "create_time");
        InsertAutocompleteData( totalUserLevel, "suggest_name");
        InsertAutocompleteData( data.allOrganization, "suggest_organization");
        UpdateMetric(data.metric);

        grabChartData["total_level"] = totalCompletion;
        grabChartData["total_time"] = totalTime;
        LoadDefaultChart();
      });
  },
   LoadLineChart = function(p_selectGrabData) {
    $(".lineChart-holder").html("");
    LineDateChart.Plot(".lineChart-holder", p_selectGrabData[currentChartState].data,
      p_selectGrabData[currentChartState].xAxis, p_selectGrabData[currentChartState].yAxis);
  },
   LoadBarChart = function(userData, y_title) {
    $(".barChart-holder").html("");
    BarChart.Plot(".barChart-holder", userData,
     {x:"level", y:"number"}, "Level", y_title);
  },
   InsertAutocompleteData = function (userLevelData, input_id) {
      $( "#"+input_id ).html("");
      userLevelData.forEach(function(user) {
        var insertValue = "<option value='" + user.name+" -" + user.id + "'/>";
        $( "#"+input_id ).append( insertValue );
      });
  },
   LoadUniqueUserChart = function (user_value) {
      var stopPoint = user_value.length - user_value.indexOf('-')-1,
          userID = parseInt( user_value.slice(-stopPoint) );

          //IF not integer then stop here
          if(!Number.isInteger(userID) ) return;

      $.get( "getUserUsageData/"+userID, function( data ) {
          data = JSON.parse( data);
          console.log(data);

          data.totalPlay.data = Parse.Increment(data.totalPlay.data, "time", "date");
          Parse.Increment(data.totalLevel.data, "levels", "create_time");
          grabUserChartData["total_level"] = data.totalLevel;
          grabUserChartData["total_time"] = data.totalPlay;

          console.log(data.totalPlay.data);
          LoadLineChart( grabUserChartData );
          LoadBarChart(data.userLevel, "Number of Play");
      });
  },
  UpdateMetric = function(metric) {
    $("h5[data='avg_play']").html(metric.average_play);
    $("h5[data='avg_time']").html(metric.average_time);
    $("h5[data='avg_star']").html(metric.star);
    $("h5[data='complete_rate']").html(metric.complete_rate+"%");
  }


  function Init() {
    //Toggle
    $( "#wrainbo-cms-assessment-usage" ).on('click', '.swap', function(e) {
      var grabData = (userState == "whole") ? grabChartData : grabUserChartData;
      currentChartState = (currentChartState == "total_level") ? "total_time" : "total_level";
      $(".lineChart-holder").html("");
      LineDateChart.Plot(".lineChart-holder", grabData[currentChartState].data,
        grabData[currentChartState].xAxis, grabData[currentChartState].yAxis);
    });

    $('#wrainbo-cms-assessment-tabs input[list="suggest_name"]').on('input', function() {
      if ($(this).val() == "") {
        userState = "whole";
        LoadDefaultChart();
      } else {
        userState = "user";
        LoadUniqueUserChart($(this).val());
      }
    } );

    $('#wrainbo-cms-assessment-tabs input[list="suggest_organization"]').on('input', function() {
      if ($(this).val() == "") {
        userState = "whole";
        LoadChart(0);
      } else {
        var org = $(this).val();
        var stopPoint = org.length - org.indexOf('-')-1,
            orgID = parseInt( org.slice(-stopPoint) );

        LoadChart(orgID);
      }
    } );

    //Load
    LoadChart(0);
    }

    return {
      "Init" : Init,
      "Load" : LoadDefaultChart
    };

})();
