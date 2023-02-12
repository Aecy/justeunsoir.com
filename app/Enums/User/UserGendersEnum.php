<?php

namespace App\Enums\User;

enum UserGendersEnum: string
{
    case Homme = 'man';
    case Femme = 'woman';
    // case Autre = 'other';

    public static function random(): mixed
    {
        return collect(self::cases())->random();
    }
}
