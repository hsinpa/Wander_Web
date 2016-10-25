@extends('main')
@section('content')
<article id="wrainbo-aboutus">
  <div id="wrainbo-aboutus-main">
    <h2>Learning and assessment platform <br />that combines mobile gaming and big data</h2>
    <a href="demo" class="theme_yellow">
        GET DEMO<img src="image/icon/ic-arrow.png" />
    </a>
  </div>

  @include('pages.aboutus.aboutus_detail')
  @include('pages.aboutus.aboutus_recognition')
  @include('pages.aboutus.aboutus_media')
  @include('pages.aboutus.aboutus_contact')

</article>
  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-aboutus-main"));
    if ($(window).width() < 640) {
      //utilityModule.SwapDomElement($('#wrainbo-aboutus-contact .row'));
    }

    $("#wrainbo-aboutus-media section").click(function() {
      location.href = $(this).attr("link");
    });

  </script>
@stop
