<?php

namespace DescomMarket\Common\Tests\Stubs;

use DescomMarket\Common\Repositories\Catalog\Products\ProductRepositoryInterface;

class ProductRepositoryDriver implements ProductRepositoryInterface
{
    public function get(int $productId): ?array
    {
        return [
            'id' => $productId,
            'sku' => 'SKU-123',
            'gtin' => 'GTIN-123',
            'name' => 'Product name',
            'description' => 'Product description',
            'price' => 100,
            'stock' => 10,
            'visibility' => true,
        ];
    }
}
