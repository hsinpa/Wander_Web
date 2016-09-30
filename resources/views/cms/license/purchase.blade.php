<div class="wrainbo-cms-license-purchase">
  <h2>Purchase</h2>

  <script lang="text/javascript">
    $(function() {
      $( "#purchase" ).change(function() {
        $purchase = $(this).val();
        $purchase = $purchase*30;
        var total = "$" + $purchase;
        document.getElementById("amount").textContent = total;
      });
    });
  </script>

  <style>
  .pro {
    background-color: #3392c1;
  }
  .pro:hover {
    background-color: #2d85b1;
  }
  </style>

  <form>
    <div>
      <label>Purchase Additional Licenses</label>
      <input type="number" id="purchase" value="0"/>
    </div>

    <div class="wrainbo-cms-license-purchase-package">
      <button class="button secondary">Basic</button>
      <button class="button pro">*Pro</button>
      <button class="button">Pro+</button>
      <span class="tip">*Current License</span>
    </div>
    <br />
    <div class="wrainbo-cms-license-purchase-payment">

        <label>Amount Due</label>
        <p id="amount">$0</p>
        <input type="submit" class="button submitButton" value="CHECK OUT"/>

        <section>
            <img src="{{url('image/icon/mastercard.png') }}"/>
            <img src="{{url('image/icon/paypal.png') }}" />
            <img src="{{url('image/icon/visa.png') }}"/>
        </section>
    </div>

  </form>
</div>
