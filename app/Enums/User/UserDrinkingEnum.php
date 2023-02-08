<?php

namespace App\Enums\User;

enum UserDrinkingEnum: string
{
    case YES = 'yes';
    case NO = 'no';
    case RARELY = 'rarely';
    case PRIVATE = 'private';

    public static function random()
    {
        return collect(self::cases())->random();
    }
}
