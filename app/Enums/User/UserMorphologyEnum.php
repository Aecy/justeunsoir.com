<?php

namespace App\Enums\User;

enum UserMorphologyEnum: string
{
    case ATHLETE = 'athlete';
    case SLIM = 'slim';
    case DELICATE = 'delicate';
    case NORMAL = 'normal';
    case EXTRA = 'extra';
    case ROUND = 'round';

    public static function random()
    {
        return collect(self::cases())->random();
    }
}
