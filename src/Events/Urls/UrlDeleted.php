<?php

namespace DescomMarket\Common\Events\Urls;

class UrlDeleted
{
    public function __construct(public readonly string $url)
    {
    }
}
