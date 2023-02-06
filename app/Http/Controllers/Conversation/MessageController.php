<?php

namespace App\Http\Controllers\Conversation;

use App\Actions\Message\MessageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Conversation\MessageStoreRequest;
use Illuminate\Http\RedirectResponse;
use Musonza\Chat\Models\Conversation;

class MessageController extends Controller
{
    /**
     * Permet d'envoyer un message dans une conversation.
     *
     * @param Conversation $conversation
     * @param MessageStoreRequest $request
     * @param MessageAction $action
     * @return RedirectResponse
     */
    public function store(Conversation $conversation, MessageStoreRequest $request, MessageAction $action): RedirectResponse
    {
        $action->send(
            user: $this->getUser(),
            conversation: $conversation,
            request: $request
        );

        return redirect()->to(
            route('conversations.show', $conversation)
        );
    }
}
