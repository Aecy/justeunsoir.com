<?php

namespace App\Enums\Order;

enum OrderStatusEnum: string
{
    case VALIDATED = 'validated';
    case CANCELLED = 'cancelled';
    case PENDING = 'pending';

    public function color(): string
    {
        return match ($this) {
            self::VALIDATED => 'success',
            self::CANCELLED => 'warning',
            self::PENDING => 'secondary',
        };
    }
}
