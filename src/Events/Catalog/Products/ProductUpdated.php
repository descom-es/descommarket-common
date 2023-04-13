<?php

namespace DescomMarket\Common\Events\Catalog\Products;

/**
 * El producto ha sido actualizado
 */
class ProductUpdated
{
    public function __construct(public readonly int $productId, public readonly array $attributesChanged)
    {
    }
}
