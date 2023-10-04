<?php

namespace DescomMarket\Common\Tests\Feature\Services;

use DescomMarket\Common\Services\AbstractService;
use DescomMarket\Common\Tests\TestCase;
use Illuminate\Validation\ValidationException;

class ServiceTest extends TestCase
{
    public function testRunServiceFailIfNotValidate()
    {
        $service = new MyService([
            'name' => 'John Doe',
            'email' => '',
        ]);

        $this->expectException(ValidationException::class);

        $service->run();
    }

    public function testRunServiceNotFailIfIsValid()
    {
        $service = new MyService([
            'name' => 'John Doe',
            'email' => 'example@example.com',
        ]);

        $service->run();

        $this->assertTrue(true);
    }
}


class MyService extends AbstractService
{
    protected function validations(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
        ];
    }

    public function run(): mixed
    {
        parent::run();

        return null;
    }
}
