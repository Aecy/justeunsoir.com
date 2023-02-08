<?php

namespace App\Enums\User;

enum UserMartialsEnum: string
{
    case SINGLE = 'single';
    case RELATIONSHIP = 'relationship';
    case ENGAGED = 'engaged';
    case MARRIED = 'married';
    case SEPARATED = 'separated';
    case DIVORCED = 'divorced';
    case WIDOWED = 'widowed';
    case COMPLICATED = 'complicated';

    public static function random()
    {
        return collect(self::cases())->random();
    }
}
