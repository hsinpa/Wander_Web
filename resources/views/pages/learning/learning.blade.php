@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="learning-bg">
          <h1>Practical Learning</h1>

          <p>Using Magitech, players develop business acumen<br />
            and
            data-driven problem solving through simulation and embedded library.</p>

          <a href="demo" class="theme_yellow">
              GET DEMO<img src="image/icon/ic-arrow.png" />
          </a>
    </div>
    @include('pages.learning.learning_detail')

  </article>

  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.learningDetailPanel-2 .row'));
    }
  </script>
@stop
