<?php

namespace DescomMarket\Common\Tests\Stubs;

use DescomMarket\Common\Notifications\NotificationDescomMarket;
use Illuminate\Notifications\Messages\MailMessage;

class TestNotification extends NotificationDescomMarket
{
    public function __construct(public readonly string $message)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Test Notification')
            ->line($this->message);
    }
}
