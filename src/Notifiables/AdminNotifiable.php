<?php

namespace DescomMarket\Common\Notifiables;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class AdminNotifiable
{
    use Notifiable;

    private static array $emails = [];
    private static ?string $mobile = null;

    private static function configEmails(array $emails): void
    {
        self::$emails = $emails;
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        return self::$emails;
    }

    public function whatsAppMobile(): string
    {
        return self::$mobile;
    }
}
