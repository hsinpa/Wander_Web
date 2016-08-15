<!doctype html>
<html lang="">
  <head>
    <link rel="stylesheet" href="../css/main/stylesheet/stylesheets/app.css">
  </head>
  <body>

    <div id="wrainbo-analytics">
      <form>
        <select class="userSelecter">
          <option value="">Pick One</option>
        </select>

        <div class="functionGroup">
          <button value="halfDonut">Summary</button>
          <button value="bar">Trend</button>
        </div>
      </form>

      <!-- <label>X Axis<select class="AxisSelect" axis="x"></select></label>
      <label>Y Axis<select class="AxisSelect" axis="y"></select></label> -->

      <div id="vizcontainer">
        <svg class="chart" style="width:900px;height:450px;" />
        <div class="textGroup">
          <h3>75</h3>
          <h5></h5>
          <h4>Level 5</h4>
        </div>
      </div>
  </div>

  <script type="text/javascript" src="../lib/d3.min.js"></script>
  <script type="text/javascript" src="../lib/underscore-min.js"></script>
  <script type="text/javascript" src="../lib/jquery.min.js"></script>

  <!-- <script type="text/javascript" src="script/ch2-1.js"></script> -->
  <script type="text/javascript" src="../js/d3/analysis/linechart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/barchart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/halfDonutChart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/AnalyticsManager.js"></script>
  <!-- <script type="text/javascript" src="script/analysis/SpellManager.js"></script> -->

  </body>
</html>
