<?php

namespace DescomMarket\Common\Tests\Feature\Notifications;

use DescomMarket\Common\Notifiables\AdminNotifiable;
use DescomMarket\Common\Tests\Stubs\TestNotification;
use DescomMarket\Common\Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class NotificationDescomMarketTest extends TestCase
{
    public function testSendReportNotification()
    {
        Notification::fake();

        AdminNotifiable::configEmails(['sample@example.com']);

        (new AdminNotifiable())->notify(new TestNotification('message'));

        Notification::assertSentTo(
            (new AdminNotifiable()),
            TestNotification::class
        );
    }
}
