<div class="wrainbo-cms-license-purchase">
  <h2>Purchase</h2>

  <script lang="text/javascript">
    $(function() {
      $( "#purchase" ).change(function() {
        $purchase = $(this).val();
        $purchase = $purchase*30
        var total = "$" + $purchase
        console.log(total);
        document.getElementById("amount").textContent = total;
      });
    });
  </script>

  <form>
    <div>
      <label>Purchase Additional Licenses</label>
      <input type="number" id="purchase" value="0"/>
    </div>

    <div class="wrainbo-cms-license-purchase-package">
      <button class="button disabled">Basic</button>
      <button class="button secondary">*Pro</button>
      <button class="button">Pro+</button>
      <span class="tip">*Current License</span>
    </div>
    <br />
    <div class="wrainbo-cms-license-purchase-payment">

        <label>Amount Due</label>
        <p id="amount">$2130</p>
        <input type="submit" class="button submitButton" value="CHECK OUT"/>

        <section>
            <img src="{{url('image/icon/mastercard.png') }}"/>
            <img src="{{url('image/icon/paypal.png') }}" />
            <img src="{{url('image/icon/visa.png') }}"/>
        </section>
    </div>

  </form>
</div>
