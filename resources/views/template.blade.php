<!doctype html>
<html lang="">
  <head>
    <link rel="stylesheet" href="{{ url('css/foundation/foundation.css') }}" />
    <link rel="stylesheet" href="{{ url('css/foundation/motion-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/hint.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/tipped/tipped.css')}}" />
    <link rel="stylesheet" href="{{ url('css/main/stylesheets/app.css')}}">
  </head>
  <body>
    <script src="{{ url('js/utility.js') }}"></script>
    <script src="{{ url('lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('lib/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('lib/underscore-min.js')}}"></script>
    <script src="{{ url('lib/foundation.min.js')}}"></script>

    <!--  D3 Chart Module -->
    <script type="text/javascript" src="{{ url('js/d3/LineChart.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/d3/LineDateChart.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/d3/Barchart.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/d3/analysis/halfDonutChart.js')}}"></script>


    <div>
      @yield('content')
    </div>


  <script src="{{ url('lib/what-input.min.js')}}"></script>
  <script src="{{ url('lib/motion-ui.min.js')}}"></script>
  <script src="{{ url('lib/responsiveslides.min.js')}}"></script>
  <script src="{{ url('lib/jquery.fancybox.pack.js')}}"></script>
  <script src="{{ url('lib/tipped.js') }}"></script>

  <!-- D3 Chart module -->


  <script type="text/javascript" src="{{ url('js/d3/analysis/AnalyticsManager.js')}}"></script>

  <!-- <script type="text/javascript" src="script/analysis/SpellManager.js"></script> -->
  <script lang="text/javascript">
    $(document).foundation();
  </script>
  </body>
</html>
