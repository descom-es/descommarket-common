<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class AbstractService
{
    protected Request $request;

    public function __construct(array|Request $request)
    {
        $this->request = $request instanceof Request
            ? $request
            : new Request($request);
    }

    protected function validations(): array
    {
        return [];
    }

    public function run()
    {
        $this->validate();
    }

    protected function validate()
    {
        $this->request->validate($this->validations());
    }
}
