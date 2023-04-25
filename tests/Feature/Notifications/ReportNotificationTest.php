<?php

namespace DescomMarket\Common\Tests\Feature;

use DescomMarket\Common\Notifiables\AdminNotifiable;
use DescomMarket\Common\Notifications\Admin\ReportNotification;
use DescomMarket\Common\Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class ReportNotificationTest extends TestCase
{
    public function testSendReportNotification()
    {
        Notification::fake();

        AdminNotifiable::configEmails(['sample@example.com']);

        (new AdminNotifiable())->notify(new ReportNotification('subject', 'body'));

        Notification::assertSentTo(
            (new AdminNotifiable()),
            ReportNotification::class
        );
    }
}
