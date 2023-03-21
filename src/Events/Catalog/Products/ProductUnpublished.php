<?php

namespace DescomMarket\Common\Events\Catalog\Products;

class ProductUnpublished
{
    public function __construct(public readonly int $productId)
    {
    }
}
