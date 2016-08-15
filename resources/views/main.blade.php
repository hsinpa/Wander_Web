<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Wrainbo is a mobile game platform that enables developing mobile games that teach practical job skills.
     Its first game, Magitech, is a mobile fantasy game that helps in business learning.">

    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/foundation/motion-ui.min.css" />
    <link rel="stylesheet" href="css/imgSlide.css">
    <link rel="stylesheet" href="css/imgSlide_theme.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main/stylesheet/stylesheets/app.css">
  </head>

  <body>
    <script src="js/utility.js"></script>
    <script src="lib/jquery.min.js"></script>
    <script src="lib/what-input.min.js"></script>
    <script src="lib/foundation.min.js"></script>
    <script src="lib/motion-ui.min.js"></script>
    <script src="lib/responsiveslides.min.js"></script>
    <script src="lib/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="lib/d3.min.js"></script>
    <script type="text/javascript" src="lib/underscore-min.js"></script>


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
