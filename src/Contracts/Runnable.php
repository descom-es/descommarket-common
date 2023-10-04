<?php

namespace DescomMarket\Common\Contracts;

interface Runnable
{
    /**
     * Must run parent::run() to validate request
     */
    public function run(): mixed;
}
