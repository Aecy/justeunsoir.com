<?php

namespace App\Actions\Like;

use App\Models\User;
use App\Notifications\Like\DislikeNotification;
use App\Notifications\Like\LikeNotification;

final class LikeAction
{
    public function toggle(User $sender, User $receiver): void
    {
        if ($sender->id === $receiver->id) {
            return;
        }

        $sender->toggleLike($receiver);

        if ($sender->hasLiked($receiver)) {
            $receiver->notify(new LikeNotification($sender));
        } else {
            $receiver->notify(new DislikeNotification($sender));
        }
    }
}
