@extends('main')
@section('content')
<article id="wrainbo-aboutus">
  <div id="wrainbo-aboutus-main">

  <img class="aboutUsMainIcon" src="image/aboutus/ic-wrainbo.png"></img>
  <h2>Game platform for practical job skills</h2>
      <!-- <a href="#wrainbo-aboutus-detail">
          <img src="image/aboutus/bt-seehow.png"></img>
        </a> -->
  </div>

  @include('pages.aboutus.aboutus_detail')
  @include('pages.aboutus.aboutus_contact')

</article>
  <script>
    utilityModule.SetToHalfScreenHeight( $("#wrainbo-aboutus-main"));
    if ($(window).width() < 640) {
      //utilityModule.SwapDomElement($('#wrainbo-aboutus-contact .row'));
    }

  </script>
@stop
