<?php require_once 'C:\Users\Michael\Projects\Wrainbo_Website\public\js\cms\license\config.php'; ?>
<div class="wrainbo-cms-license-register">
  <h2>Payment Information</h2>
  <style>
  </style>
  <script lang="text/javascript">
  </script>
  <form action="charge" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
      data-key="<?php echo $stripe['publishable_key']; ?>"
      data-description="Access for a year"
      data-amount="5000"
      data-zip-code="true"
      data-locale="auto">
    </script>
  </form>
</div>
