<?php

namespace App\Models;

use App\Enums\Order\OrderProviderEnum;
use App\Enums\Order\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Relation entre la facture et le produit.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relation entre la facture et l'utilisateur.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
