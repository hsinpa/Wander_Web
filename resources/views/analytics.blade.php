<!doctype html>
<html lang="">
  <head>
    <link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/foundation/motion-ui.min.css" />
    <link rel="stylesheet" href="../css/tipped/tipped.css" />
    <link rel="stylesheet" href="../css/main/stylesheet/stylesheets/app.css">
  </head>
  <body>

    <div id="wrainbo-analytics">
      <h2>Magitech Capability Assessment</h2>
      <form class="row">
        <select class="menuSelecter">
          <option value="overall">Overall</option>
          <option value="marketing">Marketing acumen</option>
          <option value="operation">Operation acumen</option>
          <option value="financial">Financial acumen</option>
        </select>
        <select class="userSelecter">
          <option value="">Pick One</option>
        </select>

        <div class="functionGroup">
          <button class="secondary tiny button" value="halfDonut">Summary</button>
          <button class="secondary tiny button" value="bar">Trend</button>
        </div>
      </form>

      <!-- <label>X Axis<select class="AxisSelect" axis="x"></select></label>
      <label>Y Axis<select class="AxisSelect" axis="y"></select></label> -->

      <div id="vizcontainer" class="row" data-equalizer data-equalize-on="medium" >
        <section class="medium-8 columns" >
          <svg class="chart" />
          <div class="textGroup">
            <h3>75</h3>
            <h5></h5>
            <h4>Level 5</h4>
          </div>
        </section>

        <section class="medium-4 columns" >
            <div class="positive_element" class="row">
              <img src="../image/accessment/gogo.png" class="medium-2 columns"/>
              <div class="medium-10 columns">

              </div>
            </div>

            <hr />

            <div class="negative_element" class="row">
              <img src="../image/accessment/chacha.png" class="medium-2 columns"/>
              <div class="medium-10 columns">

              </div>
            </div>
        </section>
      </div>
  </div>

  <script src="../js/utility.js"></script>
  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/what-input.min.js"></script>
  <script src="../lib/foundation.min.js"></script>
  <script src="../lib/motion-ui.min.js"></script>
  <script src="../lib/responsiveslides.min.js"></script>
  <script src="../lib/jquery.fancybox.pack.js"></script>
  <script src="../lib/tipped.js"></script>

  <script type="text/javascript" src="../lib/d3.min.js"></script>
  <script type="text/javascript" src="../lib/underscore-min.js"></script>

  <!-- <script type="text/javascript" src="script/ch2-1.js"></script> -->
  <script type="text/javascript" src="../js/d3/analysis/linechart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/barchart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/halfDonutChart.js"></script>
  <script type="text/javascript" src="../js/d3/analysis/AnalyticsManager.js"></script>
  <!-- <script type="text/javascript" src="script/analysis/SpellManager.js"></script> -->
  <script lang="text/javascript">
    $(document).foundation();
  </script>
  </body>
</html>
