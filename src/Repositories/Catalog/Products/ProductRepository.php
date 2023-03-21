<?php

namespace DescomMarket\Common\Repositories\Catalog\Products;

class ProductRepository
{
    private static ProductRepositoryInterface $repository;

    public function __construct()
    {
    }

    public static function config(ProductRepositoryInterface $repository): void
    {
        static::$repository = $repository;
    }

    public static function get(int $productId): ?array
    {
        if (! isset(static::$repository)) {
            return null;
        }

        return static::$repository->get($productId);
    }
}
