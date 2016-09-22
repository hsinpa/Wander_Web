@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="accessment-bg">
          <h1>Data-Driven Accessment</h1>

          <p>Gameplay results could be analyzed via web dashboard to provide<br />
            data-driven assessment and coaching.</p>

          <a href="/#wrainbo-home-contactus" class="theme_yellow">
              GET DEMO<img src="image/icon/ic-arrow.png" />
          </a>
    </div>
    @include('pages.accessment.accessment_detail')
  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.accessDetailPanel-2 .row'));
    }
  </script>
@stop
