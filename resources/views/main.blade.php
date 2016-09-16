<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Wrainbo is a learning platform that combines mobile gaming and big data assessment. We help organizations improve learning engagement and retention in critical subjects, ranging from business analytics to leadership.">

    <link rel="stylesheet" href="{{ url('css/foundation/foundation.css') }}" />
    <link rel="stylesheet" href="{{ url('css/foundation/motion-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/imgSlide.css') }}">
    <link rel="stylesheet" href="{{ url('css/imgSlide_theme.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ url('css/tipped/tipped.css')}}" />

    <link rel="stylesheet" href="{{ url('css/main/stylesheet/stylesheets/app.css') }}">
  </head>

  <body>
    <script src="{{ url('js/utility.js') }}"></script>
    <script src="{{ url('lib/jquery.min.js') }}"></script>
    <script src="{{ url('lib/what-input.min.js') }}"></script>
    <script src="{{ url('lib/foundation.min.js') }}"></script>
    <script src="{{ url('lib/motion-ui.min.js') }}"></script>
    <script src="{{ url('lib/responsiveslides.min.js') }}"></script>
    <script src="{{ url('lib/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ url('lib/tipped.js') }}"></script>
    <script type="text/javascript" src="{{ url('lib/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('lib/underscore-min.js') }}"></script>


    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
          <ul class="off-canvas-list">
              <li><label>Menu</label></li>
              <li><a href="http://wrainbo.com/">Home</a></li>
              <li><a href="http://wrainbo.com/gameplay">GAMEPLAY</a></li>
              <li><a href="http://wrainbo.com/learning">LEARNING</a></li>
              <li><a href="http://wrainbo.com/assessment">ASSESSMENT</a></li>
              <li><a href="http://wrainbo.com/package">PACKAGES</a></li>
              <li><a href="http://wrainbo.com/aboutUs">ABOUT US</a></li>
          </ul>

        </div>
        <div class="off-canvas-content" data-off-canvas-content >
          @include('layouts.header')

          @yield('content')

        </div>
      </div>
    </div>

<script lang="text/javascript">
  $(document).foundation();
</script>
</body>
</html>
