<?php
require_once ('C:\Users\Michael\Projects\Wrainbo_Website\vendor\autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_hx194iFHfvBWG6Nanzq9dj0d",
  "publishable_key" => "pk_test_K1GnAWJfmeCt5ahBj6UGPH0K"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
