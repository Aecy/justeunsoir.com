<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
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
            'conversation' => $conversation,
            'user' => $this->getUser()
        ]);
    }

    /**
     * Supprime une conversation entre deux utilisateurs.
     *
     * @param Conversation $conversation
     * @return RedirectResponse
     */
    public function delete(Conversation $conversation): RedirectResponse
    {
        if ($conversation->getParticipants()->count() >= 2) {
            foreach ($conversation->getParticipants() as $user) {
                Chat::conversation($conversation)->removeParticipants([$user]);
            }
        }

        return redirect()->to(
            route('conversations.index')
        );
    }
}
