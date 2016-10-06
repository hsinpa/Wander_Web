var FunctionManager = (function() {

  var testData = [{"label":"Pricing", "value":90},
                  {"label":"Segment", "value": 89 },
                  {"label":"Promotion", "value": 75 } ],
      testData2 = [{"label":"One", "value":90},
                  {"label":"Two", "value": 100 }],
      testData3 = [{"label":"One", "value":90},
                  {"label":"Two", "value": 100 },
                  {"label":"Two", "value": 100 }];

  var LoadChart = function(mainClass, angle1, angle2, angle3) {
    $(".halfDonatChart-holder").html("");

    var testData4 = [];
    for (var i =0 ; i < 100; i++) {
      testData4.push({"label":"", "value":i });
    }
    console.log(angle2);
    HalfDonutChart.Plot(mainClass+"-marketing svg", testData4, angle1);
    HalfDonutChart.Plot(mainClass+"-operation svg", testData4, angle2);
    HalfDonutChart.Plot(mainClass+"-finance svg", testData4, angle3);
  }

  return {
    "Load" : LoadChart
  };

})();
