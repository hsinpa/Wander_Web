<div class="wrainbo-cms-license-purchase">
  <h2>Purchase</h2>
  <script lang="text/javascript">
    Stripe.setPublishableKey('pk_test_K1GnAWJfmeCt5ahBj6UGPH0K');
    $( document ).ready(function() {
      $('.license-form-card > label > input').payment('formatCardNumber');
      $('.license-form-cvc > label > input').payment('formatCardCVC');      
      $('input[name=license-type]:checked').css('border','3px solid darkgray');
      $( "#purchase" ).on("input", function() {
        if ($('input[name=license-type]:checked').length){
          if ($('input[name=license-type]:checked').val() == 0) {
            $purchase = $('#purchase').val();
            $purchase = $purchase*50;
            var total = "$" + $purchase;
            document.getElementById("amount").textContent = total;
          } else if ($('input[name=license-type]:checked').val() == 1) {
            $purchase = $('#purchase').val();
            $purchase = $purchase*75;
            var total = "$" + $purchase;
            document.getElementById("amount").textContent = total;
          } else if ($('input[name=license-type]:checked').val() == 2) {
            $purchase = $('#purchase').val();
            $purchase = $purchase*100;
            var total = "$" + $purchase;
            document.getElementById("amount").textContent = total;
          }
        }
      });
      $('.license-select:first-child').on("click", function() {
        if ($('input[name=license-type]:checked').val() == 0) {
          $purchase = $('#purchase').val();
          $purchase = $purchase*50;
          var total = "$" + $purchase;
          document.getElementById("amount").textContent = total;
        } else if ($('input[name=license-type]:checked').val() == 1) {
          $purchase = $('#purchase').val();
          $purchase = $purchase*75;
          var total = "$" + $purchase;
          document.getElementById("amount").textContent = total;
        } else if ($('input[name=license-type]:checked').val() == 2) {
          $purchase = $('#purchase').val();
          $purchase = $purchase*100;
          var total = "$" + $purchase;
          document.getElementById("amount").textContent = total;
        }
      });

      $('.license-select > .button').on("click", function () {
        $('.license-select > .button').css('border','3px solid white');
        $(event.target).css('border','3px solid darkgray');
        $('.license-select > .button > input').prop("checked", false);
        $(event.target).find(">:first-child").prop("checked", true);
      });

      var $form = $('#payment-form');
      $form.submit(function(event) {
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit').prop('disabled', true);

        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from being submitted:
        return false;
      });
    });
    function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#payment-form');

      if (response.error) { // Problem!

        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission

      } else { // Token was created!

        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));

        // Submit the form:
        $form.get(0).submit();
      }
    };
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
       margin-left: 0;
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
    .license-form-right {
      float: right;
      display: inline-block;
      width: 50%;
    }
    .license-form-right > h1 {
      color: white;
      padding-top: 25%;
    }
    .license-form-left {
      padding: 0;
      width: 50%;
      background-color: white;
      margin-left: -8px;
      float: left;
    }
    #license-form {
      background-color: rgb(41, 41, 41);
    }
    .license-form-expiration > div {
      font-family: 'LatoWebLight', Calibri, Candara, Optima, Arial, sans-serif;
      color: #444;
    }
    .license-form-expiration:nth-child(3), .license-form-expiration > span, .license-form-expiration > input {
      display: inline-block;
    }
    .license-form-expiration > input {
      width: 40%;
    }
    .license-form-zip, .license-form-cvc {
      width: 40%;
      display: inline-block;
    }
    .license-form-cvc {
      margin-left: 5%;
    }
    .license-form-left > input {
      display: block;
      margin-left: 40%;
    }
  </style>

  <form action="charge" method="POST" id="payment-form">
  <div>
    <label>Purchase Additional Licenses</label>
    <input type="number" name="purchase" id="purchase" value="0"/>
  </div>

  <div class="wrainbo-cms-license-purchase-package">
    <ul class="license-select">
      <li class="button secondary basic">
        <input type="radio" id="license-basic" name="license-type" value="0" />
        Basic
      </li>
      <li class="button pro">
        <input type="radio" id="license-pro" name="license-type" value="1" />
        Pro
      </li>
      <li class="button proplus">
        <input type="radio" id="license-proplus" name="license-type" value="2" />
        Pro+
      </li>
    </ul>
  </div>

  <span class="tip">*Current License</span>
  <br />
  <div class="wrainbo-cms-license-purchase-payment">

      <label>Amount Due</label>
      <p id="amount">$0</p>
      <a data-open="license-form"><button class="button submitButton" />CHECK OUT</button></a>

      <section>
          <img src="{{url('image/icon/mastercard.png') }}"/>
          <img src="{{url('image/icon/paypal.png') }}" />
          <img src="{{url('image/icon/visa.png') }}"/>
      </section>
  </div>
  <div class="reveal xlarge" id="license-form" action="charge" method="post" data-reveal>
    <div class="license-form-left">
        <span class="payment-errors"></span>

        <div class="license-form-card">
          <label>
            <span>Card Number</span>
            <input type="text" size="20" data-stripe="number">
          </label>
        </div>

        <div class="license-form-expiration">
            <div>Expiration (MM/YY)</div>
            <input type="text" size="2" data-stripe="exp_month">
          <span> / </span>
          <input type="text" size="2" data-stripe="exp_year">
        </div>

        <span class="license-form-cvc">
          <label>
            <span>CVC</span>
            <input type="text" size="4" data-stripe="cvc">
          </label>
        </span>

        <span class="license-form-zip">
          <label>
            <span>Billing Zip</span>
            <input type="text" size="6" data-stripe="address_zip">
          </label>
        </span>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="submit" class="submit submitButton" value="Submit Payment">
      </form>
    </div>
    <div class="license-form-right">
      <h1>Payment Information</h1>
    </div>
  </div>

</div>
