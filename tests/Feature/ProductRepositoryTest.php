<?php

namespace DescomMarket\Common\Tests\Feature;

use DescomMarket\Common\Repositories\Catalog\Products\ProductRepository;
use DescomMarket\Common\Tests\Stubs\ProductRepositoryDriver;
use DescomMarket\Common\Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    public function testGetRepositoryUni()
    {
        $product = ProductRepository::get(1);

        $this->assertNull($product);
    }

    public function testGetRepository()
    {
        ProductRepository::config(new ProductRepositoryDriver());

        $product = ProductRepository::get(1);

        $this->assertEquals(1, $product['id']);
    }
}
