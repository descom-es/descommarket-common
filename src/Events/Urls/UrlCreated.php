<?php

namespace DescomMarket\Common\Events\Urls;

class UrlCreated
{
    public function __construct(public readonly string $url)
    {
    }
}
