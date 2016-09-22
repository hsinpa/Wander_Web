@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="gameplay-bg">
          <h1>Magitech Overview</h1>

          <p>In Magitech, fantasy mobile gameplay is seamlessly blended with<br />
            practical business learning in bite-sized levels.</p>

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
    @include('pages.home.gameIntro')
    @include('pages.gameplay.gameplay_detail')
  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.gameplayDetailPanel-2 .row'));
    }
  </script>
@stop
