@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="gameplay-bg">
        <h4>MAGITECH</h4>

        <h1>GAMEPLAY</h1>

        <p>Analyze, produce, and trade</p>
        <p>in a world where magic meets technology</p>
        <img class="breakline" src="image/icon/breakline_yellow.png"></img>
          <div class="detail-bt">
            <a href="#wrainbo-intro-detail">

            <img alt="arrow" src="image/icon/icon-detail.png"></img>
            <span>Detail</span>
          </a>

          </div>
    </div>
    @include('pages.feature.feature_detail')
  </article>

  <script>
    utilityModule.SetToScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.gameplayDetailPanel-2 .row'));
    }
  </script>
@stop
