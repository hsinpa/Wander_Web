@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-intro-main" class="learning-bg">
          <h4>MAGITECH</h4>

          <h1>LEARNING</h1>

          <p>Link gameplay to business concepts and cases.</p>
          <p>Master Economcis, Statistics, and Accounting</p>

          <img class="breakline" src="image/icon/breakline_yellow.png"></img>
            <div class="detail-bt">
              <a href="#wrainbo-intro-detail">

              <img src="image/icon/icon-detail.png"></img>
              <span>Detail</span>
            </a>

            </div>
    </div>
    @include('pages.learning.learning_detail')
  </article>

  <script>
    utilityModule.SetToScreenHeight( $("#wrainbo-intro-main"));
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.learningDetailPanel-2 .row'));
    }
  </script>
@stop
