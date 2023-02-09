<?php

namespace App\Models;

use App\Enums\Order\OrderProviderEnum;
use App\Enums\Order\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'provider',
        'status',
        'validated_at',
    ];

    /**
     * Les attributs directement caster avec l'objet qu'il faut.
     *
     * @var string[]
     */
    protected $casts = [
        'status' => OrderStatusEnum::class,
        'provider' => OrderProviderEnum::class,
        'validated_at' => 'datetime',
    ];
}
