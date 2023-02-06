<?php

namespace App\Actions\Message;

use App\Http\Requests\Conversation\MessageStoreRequest;
use App\Models\User;
use App\Notifications\Message\MessageNotification;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Conversation;

final class MessageAction
{
    public function send(User $user, Conversation $conversation, MessageStoreRequest $request): void
    {
        if ($user->credits <= 0) {
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

        $user->notify(new MessageNotification($user, $conversation));
    }
}
