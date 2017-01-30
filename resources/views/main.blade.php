<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @if (isset($metaDesc))
      <meta name="description" content="{{$metaDesc}}">
    @else
      <meta name="description" content="Wrainbo is a learning platform that combines mobile gaming and big data assessment. We help organizations improve learning engagement and retention in critical subjects, ranging from business analytics to leadership.">
    @endif



    <link rel="stylesheet" href="{{ url('css/foundation/foundation.css') }}" />
    <link rel="stylesheet" href="{{ url('css/foundation/motion-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/imgSlide.css') }}">
    <link rel="stylesheet" href="{{ url('css/imgSlide_theme.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ url('css/tipped/tipped.css')}}" />

    <link rel="stylesheet" href="{{ url('css/main/stylesheets/app.css') }}">
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
              <li><a href="http://wrainbo.com/gameplay">Game-Based Learning</a></li>
              <!-- <li><a href="http://wrainbo.com/learning">LEARNING</a></li> -->
              <li><a href="http://wrainbo.com/assessment">Data-Driven Assessment</a></li>
              <li><a href="http://wrainbo.com/platform">Customizable Platform</a></li>
              <li><a href="http://wrainbo.com/games">Games</a></li>
              <!-- <li><a href="http://wrainbo.com/package">PACKAGE</a></li> -->
              <li><a href="http://wrainbo.com/aboutUs">About Us</a></li>
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

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85057802-1', 'auto');
  ga('send', 'pageview');

  //Track Page Click
  $("#responsive-menu a").on("click", function() {
    ga('send', 'event', 'page', 'click', $(this).attr("href"));
  });

  //Trailer
  $("fancybox.iframe").on("click", function() {
    ga('send', 'event', 'page', 'click', "youtube_trailer");
  });

  //SocialMedia Tracker
  $(".footer a").on("click", function() {
    ga('send', 'event', 'social-media', 'click', $(this).attr("data-attr"));
  });

</script>
</body>
</html>
