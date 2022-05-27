<?php
$speed = "price_1L3mXPLYkSC4CFkX1NdpeWNX";
$slow ='price_1L3mWcLYkSC4CFkXZYxtHozv';
$unique = 'price_1L3mVgLYkSC4CFkXeODCeQi6';
$clignotant = 'price_1L3SH2LYkSC4CFkXdWJvfwio';
$sac = 'price_1L3S1hLYkSC4CFkX3yLu0ISA';
$rétroviseur = 'price_1L3S1TLYkSC4CFkXqGpiqd2T';
$casque = 'price_1L3S14LYkSC4CFkXF3qvd6ML';
$roue = 'price_1L3n2QLYkSC4CFkXZ8Fy6OEo';
$items = strtolower($_GET['buy']);
$selected_item;

switch(true) {
  case stristr($items,'slow'): 
    $selected_item = $slow;
    break;
  case stristr($items,'speed'): 
    $selected_item = $speed;
    break;
  case stristr($items,'unique'): 
    $selected_item = $unique;
    break;
  case stristr($items,'clignotant'): 
    $selected_item = $clignotant;
    break;
  case stristr($items,'sac'): 
    $selected_item = $sac;
    break;
  case stristr($items,'rétroviseur'): 
    $selected_item = $rétroviseur;
    break;
  case stristr($items,'casque'): 
    $selected_item = $casque;
    break;
  case stristr($items,'roue'): 
    $selected_item = $roue;
    break;
}

echo($selected_item);



require '../../../home/pierre/vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51L3RkeLYkSC4CFkXW8RGmdYJ9S6El7VJq2j7q4XGLAzftMeRfJ0GAjMvZIaqCKPAJxGyY8PiRUNVtnI18i8sHrKE00jXMvoLBe');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://electrot.info';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $selected_item,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/shopping_cart.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);?>