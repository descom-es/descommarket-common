<?php

namespace DescomMarket\Common\Events\Catalog\Products;

/**
 * El producto ha sido creado en la base de datos y está listo para ser publicado
 */
class ProductReadyToPublished
{
    public function __construct(public readonly int $productId)
    {
    }
}
