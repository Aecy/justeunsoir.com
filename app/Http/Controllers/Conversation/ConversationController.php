<?php

namespace App\Http\Controllers\Conversation;

use App\Actions\Message\MessageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Conversation\MessageStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Conversation;

class ConversationController extends Controller
{
    /**
     * Affiche toutes les conversations de l'utilisateur.
     *
     * @return View
     */
    public function index(): View
    {
        $conversations = Chat::conversations(Chat::conversations()->conversation)
            ->setParticipant($this->getUser())
            ->get();

        return view('conversations.index', [
            'conversations' => $conversations
        ]);
    }

    /**
     * Créer une conversation entre deux utilisateurs.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function store(User $user): RedirectResponse
    {
        $conversation = Chat::createConversation([$this->getUser(), $user]);

        return redirect()->to(
            route('conversations.show', $conversation)
        );
    }

    /**
     * Affiche une conversation en cours avec ses messages.
     *
     * @param Conversation $conversation
     * @return View
     */
    public function show(Conversation $conversation): View
    {
        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    }

    /**
     * Permet d'envoyer un message dans une conversation.
     *
     * @param Conversation $conversation
     * @param MessageStoreRequest $request
     * @param MessageAction $action
     * @return RedirectResponse
     */
    public function message(Conversation $conversation, MessageStoreRequest $request, MessageAction $action): RedirectResponse
    {
        $action->send($this->getUser(), $conversation, $request);

        return redirect()->to(
            route('conversations.show', $conversation)
        );
    }
}
