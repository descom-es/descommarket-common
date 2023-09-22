<?php

namespace DescomMarket\Common\Contracts;

interface Runnable
{
    /**
     * Must run parent::run() to validate request
     *
     * @return void
     */
    public function run(): void;
}
