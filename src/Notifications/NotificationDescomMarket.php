<?php

namespace DescomMarket\Common\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

abstract class NotificationDescomMarket extends Notification implements ShouldQueue
{
    use Queueable;

    public $tries = 10;

    public function __construct()
    {
        $this->onConnection(config('dm360.notifications.queue.connection', 'sync'));

        $this->onQueue(config('dm360.notifications.queue.name'));
    }

    public function backoff(): int
    {
        return 600;
    }
}
