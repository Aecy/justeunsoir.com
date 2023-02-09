<?php

namespace App\Enums\Order;

enum OrderProviderEnum: string
{
    case PAYPAL = 'paypal';
    case STRIPE = 'stripe';
}
