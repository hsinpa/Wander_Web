@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="games-bg">
          <h1>Games</h1>

          <p>Business Venture &#183; Magitech &#183; 21st Century Mentor</p>

          <!-- <img class="breakline" src="image/icon/breakline_yellow.png"></img> -->
            <!-- <div class="detail-bt">
              <a href="#wrainbo-intro-detail">

              <img src="image/icon/icon-detail.png"></img>
              <span>Detail</span>
            </a>

            </div> -->
          <a href="demo" class="theme_yellow">
              GET DEMO<img src="image/icon/ic-arrow.png" />
          </a>

    </div>
    @include('pages.games.games_detail')
    @include('layouts.footer')
  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.platformDetailPanel-2 .row'));
    }
    $(".rslides").responsiveSlides({
      auto: true,
      pager: true,
      nav: true,
      speed: 500,
      timeout: 4000,
      maxwidth: 500,
      namespace: "transparent-btns"
    });
  </script>
@stop
