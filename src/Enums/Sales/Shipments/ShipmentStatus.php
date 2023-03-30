<?php

namespace DescomMarket\Common\Enums\Sales\Shipments;

enum ShipmentStatus: string
{
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
}
