@extends('main')
@section('content')
  <div id="wrainbo-home">
    @include('pages.home.headBoard')
    @include('pages.home.gameIntro')
    @include('pages.home.introPortal')
    @include('pages.home.contact')

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
    maxwidth: 800,
    namespace: "transparent-btns"
  });

  $( "#wrainbo-home-contactus form" ).submit(function( event ) {
    event.preventDefault();
    var email = $("#wrainbo-home-contactus form input[type='email']");

    if (email.val() == "") {
        alert("No Empty");
      } else {
        var googleFormID="1BkZ-z9URb8hloY3O4ATzfqaDDoBUkn2hTH3hbtaXe2E";
        $.ajax({
          url: "https://docs.google.com/forms/d/"+googleFormID+"/formResponse",
          data: {"entry.1505027198": email.val() },
          type: "POST",
          dataType: "xml"})
          .done(function() {
         });
         alert("Success");
         email.val("");
      }
  });

    //Set front page equal to your screen size
    utilityModule.SetToScreenHeight($("#wrainbo-home-headboard"));
  </script>
@stop
