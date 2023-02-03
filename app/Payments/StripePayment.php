<?php

namespace App\Payments;

use App\Models\Product;
use Stripe\Checkout\Session;
use Stripe\Stripe;

final class StripePayment
{
    public function createSession(Product $product)
    {
        Stripe::setApiKey(config('stripe.secret_key'));

        return Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('stripe.cancel', [], true),
        ]);
    }
}
