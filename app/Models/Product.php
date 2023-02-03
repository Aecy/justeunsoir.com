<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis par l'administrateur.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'credits'
    ];
}
