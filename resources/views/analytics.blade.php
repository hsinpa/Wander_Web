<!doctype html>
<html lang="">
  <head>
  <style>
    .chart rect {
    fill: steelblue;
    }

    .chart rect:hover {
    fill: brown;
    }

    .axis {
    font: 10px sans-serif;
    }

    .chart path,
    .chart line {
    fill: none;
    stroke: steelblue;
    shape-rendering: crispEdges;
    }

    .x.axis path {
    display: none;
    }

</style>

  </head>
  <body>
    <form>
      <select class="userSelecter">
        <option value="">Pick One</option>
      </select>
    </form>
    <button value="bar">Bar Chart</button>
    <button value="line">Line Chart</button><br />
    <label>X Axis<select class="AxisSelect" axis="x"></select></label>
    <label>Y Axis<select class="AxisSelect" axis="y"></select></label>

    <div id="vizcontainer">
      <svg class="chart" style="width:900px;height:450px;border:1px lightgray solid;" />
      <!-- <svg class="linechart" style="width:300px;height:300px;border:1px lightgray solid;" /> -->

    </div>

  <script type="text/javascript" src="../lib/d3.min.js"></script>
  <script type="text/javascript" src="../lib/underscore-min.js"></script>
  <script type="text/javascript" src="../lib/jquery.min.js"></script>

  <!-- <script type="text/javascript" src="script/ch2-1.js"></script> -->
  <script type="text/javascript" src="../js/d3/analysis/linechart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/barchart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/AnalyticsManager.js"></script>
  <!-- <script type="text/javascript" src="script/analysis/SpellManager.js"></script> -->

  </body>
</html>
