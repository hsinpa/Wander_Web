@extends('main')
@section('content')
  <article id="wrainbo-intro">
    <div id="wrainbo-product-main" class="pricing-bg">
          <h4>Magitech Packages</h4>
          <p>Magitech comes in three packages that fit different needs</p>
    </div>
    @include('pages.product.product_detail')
  </article>

  <script>
    utilityModule.SetToScreenHeight( $("#wrainbo-intro-main"));
  </script>
@stop
