<?php

namespace App\Actions\Like;

use App\Models\User;
use App\Notifications\Like\DislikeNotification;
use App\Notifications\Like\LikeNotification;
use Musonza\Chat\Facades\ChatFacade as Chat;

final class LikeAction
{
    public function toggle(User $sender, User $receiver): void
    {
        if ($sender->id === $receiver->id) {
            return;
        }

        $sender->toggleLike($receiver);

        if ($sender->hasLiked($receiver)) {
            $this->addLikeConversation($sender, $receiver);
            $receiver->notify(new LikeNotification($sender));
        } else {
            $this->removeLikeConversation($sender, $receiver);
            $receiver->notify(new DislikeNotification($sender));
        }
    }

    private function addLikeConversation(User $sender, User $receiver): void
    {
        $conversation = Chat::conversations()->between($sender, $receiver);
        if (is_null($conversation)) {
            $conversation = Chat::createConversation([$sender, $receiver])->makeDirect();
        }

        Chat::message("Envoi d'un coeur")
            ->type('like')
            ->from($sender)
            ->to($conversation)
            ->send();
    }

    private function removeLikeConversation(User $sender, User $receiver)
    {
        // Nothing.
    }
}
