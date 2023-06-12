<?php

namespace DescomMarket\Common\Repositories\Catalog\Products;

final class ProductRepository
{
    private static ?ProductRepositoryInterface $repository = null;

    public function __construct()
    {
    }

    public static function config(ProductRepositoryInterface $repository): void
    {
        static::$repository = $repository;
    }

    public static function configDefined(): bool
    {
        return isset(static::$repository);
    }

    public static function clearConfig(): void
    {
        static::$repository = null;
    }

    public static function get(int $productId): ?array
    {
        if (! isset(static::$repository)) {
            return null;
        }

        return static::$repository->get($productId);
    }
}
