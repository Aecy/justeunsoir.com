<?php

namespace App\Actions\Favorite;

use App\Models\User;
use App\Notifications\Favorite\FavoriteAddNotification;
use App\Notifications\Favorite\FavoriteRemoveNotification;

final class FavoriteAction
{
    public function toggle(User $sender, User $receiver): void
    {
        if ($sender->id === $receiver->id) {
            return;
        }

        $sender->toggleFavorite($receiver);

        if ($sender->hasFavorited($receiver)) {
            $receiver->notify(new FavoriteAddNotification($sender));
        } else {
            $receiver->notify(new FavoriteRemoveNotification($sender));
        }
    }
}
