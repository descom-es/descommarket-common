<?php

namespace DescomMarket\Common\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private string $subject, private string $message)
    {
    }

    public function via($notifiable)
    {
        $channels = [];

        if ($notifiable->routeNotificationForMail($this)) {
            $channels[] = 'mail';
        }

        return $channels;
    }

    public function toMail($notifiable)
    {
        $mailMessage = new MailMessage();

        $mailMessage->subject($this->subject)
            ->line($this->message)
            ->salutation('El equipo Yapayoo');

        if ($this->urlAction) {
            $mailMessage->action('VER', $this->urlAction);
        }

        return $mailMessage;
    }
}
