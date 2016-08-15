@extends('main')
@section('content')
  <div id="wrainbo-home">
    @include('pages.home.headBoard')
    @include('pages.home.gameIntro')
    @include('pages.home.introPortal')
    @include('pages.home.quote')
    @include('pages.home.contact')
    @include('layouts.footer')
  </div>
  <script>
  //Video Popup
  $(".various").fancybox({
    maxWidth	: 1400,
    maxHeight	: 1200,
    fitToView	: true,
    width		: '90%',
    height		: '90%',
    autoSize	: true,
    closeClick	: false,
    openEffect	: 'none',
    closeEffect	: 'none'
  });

  //Image gallery
  $(".rslides").responsiveSlides({
    auto: true,
    pager: true,
    nav: true,
    speed: 500,
    timeout: 4000,
    maxwidth: 650,
    namespace: "transparent-btns"
  });

    //Set front page equal to your screen size
    utilityModule.SetToScreenHeight($("#wrainbo-home-headboard"));

    //Intro panel
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.homeDetailPanel-2 .row'));
      utilityModule.SwapDomElement($('.homeDetailPanel-3 .row'));
    }
  </script>
@stop
