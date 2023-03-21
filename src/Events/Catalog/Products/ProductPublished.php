<?php

namespace DescomMarket\Common\Events\Catalog\Products;

class ProductPublished
{
    public function __construct(public readonly int $productId)
    {
    }
}
