<?php

namespace DescomMarket\Common\Services;

use DescomMarket\Common\Contracts\Runnable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class AbstractService implements Runnable
{
    protected Request $request;

    public function __construct(array|Request $request)
    {
        $this->request = $request instanceof Request
            ? $request
            : new Request($request);
    }

    public function run(): void
    {
        $this->validate();
    }

    protected function validations(): array
    {
        return [];
    }

    private function validate()
    {
        $this->request->validate($this->validations());
    }
}
