<?php

namespace App\Notifications\Message;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Musonza\Chat\Models\Conversation;
use function route;

class MessageNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        private User $user,
        private Conversation $conversation
    ) { }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("Un membre vous a envoyé un message")
            ->subject("Un membre vous a envoyé un message")
            ->line("{$this->user->name} vous a envoyé un message.")
            ->action("Voir la conversation", route('conversations.show', $this->conversation));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
