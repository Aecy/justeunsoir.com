<?php

namespace App\Enums\Order;

enum OrderStatusEnum: string
{
    case VALIDATED = 'validated';
    case CANCELLED = 'cancelled';
    case PENDING = 'pending';
}
