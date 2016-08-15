$(document).ready(function(){
  var axisSelect =  {
    "y" : "level",
    "x" : "carrySpell"
  };


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

  function Setup(p_guid) {
    $.get( "http://wrainbo.com/analytics/spell_level/"+p_guid, function( data ) {
      var jsonData = JSON.parse(data);
      console.log(jsonData);

      if (jsonData.length <= 0) return;
      var axisString = "<option value=''>Pick One</option>",
          keyList = Object.keys( jsonData[0]);


          

      BarChart.Plot(jsonData, axisSelect);

      //Set Axis Select
      for (var i in keyList){
        axisString += "<option value='"+keyList[i]+"'>"+keyList[i]+"</option>";
      }
      $(".AxisSelect").html("");
      $(".AxisSelect").append(axisString);
    });
  }


});
