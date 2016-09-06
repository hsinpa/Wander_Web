$(document).ready(function(){
  var mChartType = "halfDonut", mFilterData = [],
      axisSelect =  {
        "y" : "coin",
         "x" :"level"
      },
      fakeData = {
        "overall" :{"score" : 75, "positive" : ["Marketing acumen"], "negative" : ["Operations acumen"]} ,
        "marketing" :{"score" : 90, "positive" : ["Customer targeting","Channel expansion"], "negative" : ["Pricing strategy"]} ,
        "operation" :{"score" : 60, "positive" : ["Production management"], "negative" : ["Quality control", "Capacity planning"]},
        "financial" :{"score" : 75, "positive" : ["Cashflow control"], "negative" : ["Financing strategy"]}
      },
      attrData = {
        "Marketing acumen" : {"desc" : "Ability to select the most profitable customer segment", "tip" : "Consider investing in customers that has strong growth momentum in the future"},
        "Operations acumen" : {"desc" : "Ability to differentiate the product to tailor to customer needs", "tip": "Consider casting differentiation spell when there is strong price competition from competitors"},
        "Customer targeting" : {"desc" : "Ability to select the most profitable customer segment", "tip" : "Consider investing in customers that has strong growth momentum in the future"},
        "Product stategy" : {"desc" : "Ability to differentiate the product to tailor to customer needs", "tip": "Consider casting differentiation spell when there is strong price competition from competitors"},
        "Pricing strategy" : {"desc" : "Ability to set prices that maximizes profit", "tip": "When anticipating a demand increase, consider raising prices even at the expense of incurring inventory"},
        "Channel expansion" : {"desc" : "Ability to expand channel with positive ROI", "tip": "Invest the amount that could be matched by production capacity"},
        "Production management" : {"desc" : "Ability to produce the right type of product at the right amount", "tip": "Ensure production is aligned with pricing strategy by analyzing customer demand"},
        "Capacity planning" : {"desc" : "Ability to plan and manage capacity to meet customer demands", "tip": "It is important to identify the bottleneck, the process that has the lowest productivity. The overall productivity will not improve unless bottleneck is improved"},
        "Quality control" : {"desc" : "Ability to minimize defect rate", "tip": "Select the process that has higher variation beyond upper and lower control limit to minimize defect rate"}
      },

      currentAcumen = fakeData["overall"];

  //Init
  $.get( "http://wrainbo.com/analytics/allUserID", function( data ) {
      data = JSON.parse( data);
      var optionString = "";

      for (var key in data){
        optionString += "<option value='"+data[key].guid+"'>"+data[key].name+"</option>";
      }

      $(".userSelecter").append(optionString);

      //Set SVG Size
      $("#vizcontainer svg").width(700);
      $("#vizcontainer svg").height(270);
  });

  //Select Panel Click
  $(".userSelecter").change(function(){
      if ($(this).val() != "") {
          //Click Event
          Setup( $(this).val() );
          SetScoreInfo( currentAcumen );
      }
  });

  //Select Panel Click
  $(".menuSelecter").change(function(){
      currentAcumen = fakeData[ $(this).val() ];
      SetScoreInfo( currentAcumen );
      PlotChart();

  });

  //Change Chart Type
  $( "button" ).click(function(event) {
    event.preventDefault();

    mChartType = $(this).val();
    //SetScoreInfo( currentAcumen );
    PlotChart();
  });

  function PlotChart() {
    if (mFilterData.length <= 0) return;

    //Clear svg content
    $("svg").html("");
    $("#vizcontainer .textGroup").css("display", "none");

    switch (mChartType) {
      case "bar":
        BarChart.Plot(mFilterData, axisSelect);

      break;
      case "line":
        LineChart.Plot(mFilterData);

      break;
      case "halfDonut":
        $("#vizcontainer .textGroup").css("display", "block");
        var maxStar = mFilterData.length * 3,
            mStar = 0;

        if (currentAcumen == fakeData["overall"]) {
          for (var j in mFilterData) {
            mStar += parseInt( mFilterData[j].star );
          }
        } else {
          //hard code the rest
          mStar = currentAcumen.score;
          maxStar = 100;
        }

        var data = [{"label":"One", "value":mStar},
                    {"label":"Two", "value": maxStar - mStar }];
        HalfDonutChart.Plot(mFilterData, data);
      break;
    }
  }

  function SetScoreInfo(p_acumen) {
      //if (mFilterData.length <= 0) return;

      $(".positive_element div").html(GetScoreInfo(currentAcumen.positive));
      $(".negative_element div").html(GetScoreInfo(currentAcumen.negative));
      Tipped.create('.hint-attr',function(element) {
        var title = $(element).attr("data-title");
        var string = "<div class='attr_hint_panel'><h5>"+title+"<\/h5>";
            string +="<h6>Definition<\/h6>";
            string +="<p>"+ attrData[title].desc +"<\/p>";
            string +="<h6>Tips<\/h6>";
            string +="<p>"+ attrData[title].tip +"<\/p><\/div>";
        return string;
      }, {
        position: 'left',
        size: 'large',
        maxWidth: 350
      });

  }

  function GetScoreInfo(attributes) {
      var string = "<ul>";
      for (var a in attributes) {
          string += "<li class='hint-attr' data-title='"+attributes[a]+"'>"+ attributes[a] +"</li>";
      }
      string += "</ul>";
      return string;
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

    });
  }
});
