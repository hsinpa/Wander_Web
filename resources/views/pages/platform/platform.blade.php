@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="platform-bg">
          <h1>Customizable platform</h1>

          <p>Wrainbo is a customizable learning and assessment platform <br />
            that combines mobile gaming and big data</p>

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
    @include('pages.platform.platform_detail')
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
