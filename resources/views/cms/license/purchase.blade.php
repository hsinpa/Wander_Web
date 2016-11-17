<?php require_once 'C:\Users\Michael\Projects\Wrainbo_Website\public\js\cms\license\config.php'; ?>
<div class="wrainbo-cms-license-purchase">
  <h2>Purchase</h2>
  <script lang="text/javascript">
    $( document ).ready(function() {
      $( "#purchase" ).change(function() {
        $purchase = $(this).val();
        $purchase = $purchase*30;
        var total = "$" + $purchase;
        document.getElementById("amount").textContent = total;
      });

      $('.license-select > .button').on("click", function () {
        $('.license-select > .button').css('border','3px solid white');
        $(event.target).css('border','3px solid darkgray');
        $('.license-select > .button > input').prop("checked", false);
        $(event.target).find(">:first-child").prop("checked", true);
      });
    });
  </script>

  <style>
    .pro, .proplus, .basic {
      border: 3px solid white;
      padding-top: 8px;
      padding-bottom: 8px;
    }
    .pro input, .proplus input, .basic input {
      display: none;
    }
    .pro {
      background-color: #3392c1;
    }
    .pro:hover {
      background-color: #2d85b1;
    }
    .proplus {
      margin-bottom: 0;
    }
    .license-select {
       list-style-type:none;
       margin-bottom: 0;
    }
    .license-select input[type="radio"]:checked{
      opacity: .8;
    }
    .license-select > li {
      display: block;
    }
    #amount {
      margin-bottom: 0;
    }
  </style>

  <form id="license-form" action="charge" method="post">
    <div>
      <label>Purchase Additional Licenses</label>
      <input type="number" id="purchase" value="0"/>
    </div>

    <div class="wrainbo-cms-license-purchase-package">
      <ul class="license-select">
        <li class="button secondary basic">
          <input type="radio" id="license-basic" name="license-type" />
          <label for="license-basic">Basic</label>
        </li>
        <li class="button pro">
          <input type="radio" id="license-pro" name="license-type" />
          <label for="license-pro">Pro</label>
        </li>
        <li class="button proplus">
          <input type="radio" id="license-proplus" name="license-type" />
          <label for="license-proplus">Pro+</label>
        </li>
      </ul>
    </div>

    <script>
      $( document ).ready(function() {
        $('input[name=license-type]').change(function () {
          $('input[name=license-type]:not(:checked)').parent().css('border','3px solid white');
          $('input[name=license-type]:checked').parent().css('border','3px solid darkgray');
        });
      });
    </script>

    <span class="tip">*Current License</span>
    <br />
    <div class="wrainbo-cms-license-purchase-payment">

        <label>Amount Due</label>
        <p id="amount">$0</p>
        <input id="checkout" type="submit" class="button submitButton" value="CHECK OUT"/>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <section>
            <img src="{{url('image/icon/mastercard.png') }}"/>
            <img src="{{url('image/icon/paypal.png') }}" />
            <img src="{{url('image/icon/visa.png') }}"/>
        </section>
    </div>
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo $stripe['publishable_key']; ?>"
            data-description="Access for a year"
            data-amount="5000"
            data-locale="auto"></script>

  </form>
</div>
