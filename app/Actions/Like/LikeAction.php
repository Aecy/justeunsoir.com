<?php

namespace App\Actions\Like;

use App\Models\User;

final class LikeAction
{
    public function toggle(User $sender, User $receiver): void
    {
        if ($sender->id === $receiver->id) {
            return;
        }

        $sender->toggleLike($receiver);
    }
}
