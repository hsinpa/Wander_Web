@extends('main')
@section('content')
  <div id="wrainbo-home">
    @include('pages.home.headBoard')
    @include('pages.home.introPortal')
    @include('pages.home.quote')
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

    //Set front page equal to your screen size
    utilityModule.SetToScreenHeight($("#wrainbo-home-headboard"));

    //Intro panel
    if ($(window).width() < 640) {
      utilityModule.SwapDomElement($('.homeDetailPanel-2 .row'));
      utilityModule.SwapDomElement($('.homeDetailPanel-3 .row'));
    }
  </script>
@stop
