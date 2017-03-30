@extends('bizbattle')
@section('content')
  <div id="wrainbo-bizbattle">
    @include('pages.bizbattle.headBoard')
    @include('pages.bizbattle.video')
    @include('pages.bizbattle.gameIntro')

    @include('pages.bizbattle.introPortal')
    @include('pages.bizbattle.footer')
  </div>
  <script>

    //Set front page equal to your screen size
    utilityModule.SetToScreenHeight($("#wrainbo-bizbattle-headboard"));
    utilityModule.SetToScreenHeight($("#wrainbo-bizbattle-video"));
    // utilityModule.SetToScreenHeight($("#wrainbo-bizbattle-productIntro"));


    //Intro panel
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.homeDetailPanel-2 .row'));
      utilityModule.SwapDomElement($('.homeDetailPanel-3 .row'));
    }
  </script>
@stop
