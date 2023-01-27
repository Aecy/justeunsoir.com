<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserLifeStyle extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis par l'User.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'interest_for',
        'vacation_spot',
        'smoking',
        'alcohol',
    ];

    /**
     * Relation entre l'User et UserLooking.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
