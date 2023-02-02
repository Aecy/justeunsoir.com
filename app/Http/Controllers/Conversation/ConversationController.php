<?php

namespace App\Http\Controllers\Conversation;

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

    public function message(Conversation $conversation, MessageStoreRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $url = $request->image->storeAs("conversations/{$conversation->id}", $fileName, 'public');

            Chat::message($request->get('content'))
                ->type('image')
                ->data(['file_name' => $fileName, 'file_url' => $url])
                ->from($this->getUser())
                ->to($conversation)
                ->send();
        } else {
            Chat::message($request->get('content'))
                ->from($this->getUser())
                ->to($conversation)
                ->send();
        }

        return Redirect::to(
            route('conversations.show', $conversation)
        );
    }
}
