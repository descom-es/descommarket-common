# Notifications

## NotificationDescomMarket

NotificationDescomMarket you can extend to create your own queue notification.

You need define this config in `dm360.php` file;

```php
    'notification' => [
        'queue' => [
            'connection' => 'database',
            'name' => 'default',
        ],
    ],
```

Then you need extends `NotificationDescomMarket` for your notifications
