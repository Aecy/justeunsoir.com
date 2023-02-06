<?php

namespace App\Enums\User;

enum UserRolesEnum: string
{
    case MEMBER = 'member';
    case ADMIN = 'admin';
}
