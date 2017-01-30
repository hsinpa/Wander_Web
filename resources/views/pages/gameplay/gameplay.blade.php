@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="gameplay-bg">
          <h1>Immersive game-based learning</h1>

          <p>Hands-on simulation &#183; Bite-sized mobile learning
           &#183; On-demand learning tools</p>

          <!-- <img class="breakline" src="image/icon/breakline_yellow.png"></img> -->
            <!-- <div class="detail-bt">
              <a href="#wrainbo-intro-detail">

              <img src="image/icon/icon-detail.png"></img>
              <span>Detail</span>
            </a>

            </div> -->
          <a href="demo" class="theme_yellow">
              GET DEMO<img alt="arrow" src="image/icon/ic-arrow.png" />
          </a>

    </div>
    @include('pages.gameplay.gameplay_detail')
    @include('layouts.footer')
  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.gameplayDetailPanel-2 .row'));
    }
  </script>
@stop
