<?php

namespace DescomMarket\Common\Notifiables;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class AdminNotifiable
{
    use Notifiable;

    private static array $emails = [];
    private static ?string $mobile = null;

    public function getKey(): string
    {
        return 'admin';
    }

    public static function configEmails(array $emails): void
    {
        self::$emails = $emails;
    }

    public static function configMobile(string $mobile): void
    {
        self::$mobile = $mobile;
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
