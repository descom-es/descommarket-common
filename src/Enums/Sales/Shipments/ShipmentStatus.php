<?php

namespace DescomMarket\Common\Enums\Sales\Shippings;

enum ShipmentStatus: string
{
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
}
