<?php

namespace App\Http\Controllers\Conversation;

use App\Actions\Message\MessageAction;
use App\Events\MessageCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Conversation\MessageStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Conversation;

class ConversationController extends Controller
{
    public function index(): View
    {
        $conversations = Chat::conversations(Chat::conversations()->conversation)
            ->setParticipant($this->getUser())
            ->get();

        return view('conversations.index', [
            'conversations' => $conversations
        ]);
    }

    public function store(User $user): RedirectResponse
    {
        $conversation = Chat::createConversation([$this->getUser(), $user]);

        return Redirect::to(
            route('conversations.show', $conversation)
        );
    }

    public function show(Conversation $conversation): View
    {
        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    }

    public function message(Conversation $conversation, MessageStoreRequest $request, MessageAction $action): RedirectResponse
    {
        $action->send($this->getUser(), $conversation, $request);

        return Redirect::to(
            route('conversations.show', $conversation)
        );
    }
}
