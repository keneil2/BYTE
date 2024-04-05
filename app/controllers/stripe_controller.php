<?php
use Stripe\Stripe;
$stripe_api_key=$_ENV["STRIPE_API_KEY"];
$stripe=new Stripe;
$stripe::setApiKey($stripe_api_key);
$stripe_charge=new \Stripe\Charge;
$stripe_charge->create([
    "amount"=>$price
]);
