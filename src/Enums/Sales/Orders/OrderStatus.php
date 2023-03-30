<?php

namespace DescomMarket\Common\Enums\Sales;

enum OrderStatus: string
{
    case PAYMENT_PENDING = 'payment_pending';
    case PAYMENT_ACCEPTED = 'payment_accepted';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
    case COMPLETED = 'completed';
    case COMPLETED_PARTIAL = 'completed_partial';
}
