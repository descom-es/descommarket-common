<?php

namespace DescomMarket\Common\Notifications\Admin;

use Descom\B2b\Core\App\WhatsApp\Template;
use Descom\B2b\Core\App\WhatsApp\WhatsApp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private ?string $whatsAppTemplate = null;

    public function __construct(private string $subject, private string $message, private ?string $urlAction = null)
    {
    }

    public function via($notifiable)
    {
        $channels = [];

        if (WhatsApp::canNotifyByWaba($notifiable) && $notifiable->whatsAppMobile($this)) {
            $channels[] = 'whatsapp';
        }

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

    public function toWhatsapp($notifiable)
    {
        $urlPath = $this->urlAction ? str_replace([Frontend::url(''), Frontend::urlApi('')], '', $this->urlAction) : null;

        $whatsapp = Template::build($this->whatsAppTemplate)
            ->parameters([$this->message]);

        if ($urlPath) {
            $whatsapp->link($urlPath);
        }

        return $whatsapp;
    }
}
