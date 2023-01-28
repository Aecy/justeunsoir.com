<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class UserActivityService
{
    /**
     * Récupère la liste des utilisateurs connectés.
     *
     * @return Collection
     */
    public function getOnlineUsers(): Collection
    {
        $users = User::all();
        return $users->filter(fn ($user) => Cache::get('users_online-' . $user->id));
    }

    /**
     * Récupère la liste des utilsateurs connectés par leur genre.
     *
     * @param string $gender
     * @return Collection
     */
    public function getOnlineByGender(string $gender): Collection
    {
        $users = User::all();
        return $users->filter(fn ($user) => $user->gender === $gender && Cache::get('users_online-' . $user->id));
    }
}
