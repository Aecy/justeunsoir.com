<?php

namespace App\Services\Message;

use App\Http\Requests\Conversation\MessageStoreRequest;
use App\Models\Bot;
use App\Models\User;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Conversation;

final class FakeConversationService
{
    public function send(User $user, Conversation $conversation, MessageStoreRequest $request): void
    {
        $message = $request->get('content');
        $response = (new Bot())->generateResponse($message);

        Chat::message($response)
            ->from($user)
            ->to($conversation)
            ->send();
    }
}
