<?php

namespace DescomMarket\Common\Repositories\Catalog\Products;

interface ProductRepositoryInterface
{
    public function get(int $productId): ?array;
}
