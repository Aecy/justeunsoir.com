<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserSelf extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis par l'User.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'about_me'
    ];

    /**
     * Relation entre l'User et UserSelf.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
