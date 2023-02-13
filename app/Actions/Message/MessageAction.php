<?php

namespace App\Actions\Message;

use App\Actions\User\DecrementUserCreditAction;
use App\Http\Requests\Conversation\MessageStoreRequest;
use App\Models\User;
use App\Notifications\Message\MessageNotification;
use App\Services\Message\FakeConversationService;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Conversation;

final class MessageAction
{
    public function send(User $user, Conversation $conversation, MessageStoreRequest $request): void
    {
        if ($user->credits <= 0) {
            toast("Vous n'avez pas assez de crédit pour envoyer un message privé !", 'error');
            return;
        }

        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $url = $request->image->storeAs("conversations/{$conversation->id}", $fileName, 'public');

            Chat::message($request->get('content'))
                ->type('image')
                ->data(['file_name' => $fileName, 'file_url' => $url])
                ->from($user)
                ->to($conversation)
                ->send();
        } else {
            Chat::message($request->get('content'))
                ->from($user)
                ->to($conversation)
                ->send();
        }

        if ($user->isMember()) {
            app(abstract: DecrementUserCreditAction::class)->execute(
                user: $user,
                credits: 1
            );
        }

        $fakeConversation = false;
        $fakeUser = null;
        foreach ($conversation->getParticipants() as $participant) {
            if ($participant->fake_account) {
                $fakeConversation = true;
                $fakeUser = $participant;
            }
        }

        if ($fakeConversation) {
            app(FakeConversationService::class)->send(
                $fakeUser,
                $conversation,
                $request
            );
        }

        $user->notify(new MessageNotification($user, $conversation));
    }
}
