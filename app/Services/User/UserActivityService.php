<?php

namespace App\Services\User;

use App\Enums\User\UserGendersEnum;
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
     * Récupère la liste des utilisateurs connectés en tant qu'homme.
     *
     * @return Collection
     */
    public function getOnlineManUsers(): Collection
    {
        $users = User::all();
        return $users->filter(fn ($user) => $user->gender === UserGendersEnum::Homme && Cache::get("users_online-{$user->id}"));
    }

    /**
     * Récupère la liste des utilisateurs connectés en tant que femme.
     *
     * @return Collection
     */
    public function getOnlineWomanUsers(): Collection
    {
        $users = User::all();
        return $users->filter(fn ($user) => $user->gender === UserGendersEnum::Femme && Cache::get("users_online-{$user->id}"));
    }
}
