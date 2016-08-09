@extends('main')
@section('content')
<article id="wrainbo-aboutus">
  <div id="wrainbo-aboutus-main">

  <img class="aboutUsMainIcon" src="image/aboutus/ic-wrainbo.png"></img>
  <h5>「 Intelligence Learning Studio 」</h5>
  <h1>MAKE LEARNING ENGAGING AND EFFECTIVE</h1>
      <a href="#wrainbo-aboutus-detail">
          <img src="image/aboutus/bt-seehow.png"></img>
        </a>
  </div>

  @include('pages.aboutus.aboutus_detail')
  @include('pages.aboutus.aboutus_priceTable')
  @include('pages.aboutus.aboutus_contact')

</article>
  <script>
    utilityModule.SetToScreenHeight( $("#wrainbo-aboutus-main"));
  </script>
@stop
