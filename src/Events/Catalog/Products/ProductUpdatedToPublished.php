<?php

namespace DescomMarket\Common\Events\Catalog\Products;

/**
 * El producto ha sido actualizado en la base de datos y está listo para ser publicado
 */
class ProductUpdatedToPublished
{
    public function __construct(public readonly int $productId)
    {
    }
}
