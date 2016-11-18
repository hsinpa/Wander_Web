<div class="wrainbo-cms-license-purchase">
  <h2>Purchase</h2>
  <script lang="text/javascript">
    Stripe.setPublishableKey('pk_test_K1GnAWJfmeCt5ahBj6UGPH0K');
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

  <form action="charge" method="POST" id="payment-form">
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
      <a data-open="license-form"><button class="button submitButton" />CHECK OUT</button></a>

      <section>
          <img src="{{url('image/icon/mastercard.png') }}"/>
          <img src="{{url('image/icon/paypal.png') }}" />
          <img src="{{url('image/icon/visa.png') }}"/>
      </section>
  </div>
  <div class="reveal" id="license-form" action="charge" method="post" data-reveal>
    <h1>Payment Information</h1>
      <span class="payment-errors"></span>

      <div>
        <label>
          <span>Card Number</span>
          <input type="text" size="20" data-stripe="number">
        </label>
      </div>

      <div>
        <label>
          <span>Expiration (MM/YY)</span>
          <input type="text" size="2" data-stripe="exp_month">
        </label>
        <span> / </span>
        <input type="text" size="2" data-stripe="exp_year">
      </div>

      <div>
        <label>
          <span>CVC</span>
          <input type="text" size="4" data-stripe="cvc">
        </label>
      </div>

      <div>
        <label>
          <span>Billing Zip</span>
          <input type="text" size="6" data-stripe="address_zip">
        </label>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <input type="submit" class="submit" value="Submit Payment">
    </form>
  </div>

</div>
