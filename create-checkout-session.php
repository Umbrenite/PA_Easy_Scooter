<?php

require '../../../home/pierre/vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51L3RkeLYkSC4CFkXW8RGmdYJ9S6El7VJq2j7q4XGLAzftMeRfJ0GAjMvZIaqCKPAJxGyY8PiRUNVtnI18i8sHrKE00jXMvoLBe');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/easyscoot';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1L3SH2LYkSC4CFkXdWJvfwio',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);?>