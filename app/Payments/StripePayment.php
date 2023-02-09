<?php

namespace App\Payments;

use App\Enums\Order\OrderProviderEnum;
use App\Enums\Order\OrderStatusEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Stripe\Checkout\Session;
use Stripe\Stripe;

final class StripePayment
{
    public function createSession(Product $product, User $user)
    {
        Stripe::setApiKey(config('stripe.secret_key'));

        $order = Order::create([
            'provider' => OrderProviderEnum::STRIPE,
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price,
            'status' => OrderStatusEnum::PENDING,
        ]);

        \Illuminate\Support\Facades\Session::put('cur_order_id', $order->id);

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
