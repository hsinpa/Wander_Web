@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="accessment-bg">
          <h1>Data-Driven Accessment</h1>

          <p>Data-driven insights &#183; Web-based dashboard &#183; Personalized assessment report</p>

          <a href="demo" class="theme_yellow">
              GET DEMO<img src="image/icon/ic-arrow.png" />
          </a>
    </div>
    @include('pages.accessment.accessment_detail')
    @include('layouts.footer')
  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.accessDetailPanel-2 .row'));
    }
  </script>
@stop
