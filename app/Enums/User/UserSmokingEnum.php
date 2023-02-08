<?php

namespace App\Enums\User;

enum UserSmokingEnum: string
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
