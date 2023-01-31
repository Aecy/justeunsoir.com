<?php

namespace App\Actions\Favorite;

use App\Models\User;

final class FavoriteAction
{
    public function toggle(User $sender, User $receiver): void
    {
        if ($sender->id === $receiver->id) {
            return;
        }

        $sender->toggleFavorite($receiver);
    }
}
