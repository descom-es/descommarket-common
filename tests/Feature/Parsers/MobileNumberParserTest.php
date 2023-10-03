<?php

namespace DescomMarket\Common\Tests\Feature\Parsers;

use DescomMarket\Common\Parsers\MobileNumberParser;
use DescomMarket\Common\Tests\TestCase;

class MobileNumberParserTest extends TestCase
{
    public function testParseValid()
    {
        $test = collect([
            '666666666' => '+34666666666',
            '766666666' => '+34766666666',
            '666 666 666' => '+34666666666',
            '34666-666-666' => '+34666666666',
            '+34666 666-666' => '+34666666666',
            '0034666-666 666' => '+34666666666',
        ]);

        $test->each(function ($expected, $mobile) {
            $parsedMobile = MobileNumberParser::parse($mobile);

            $this->assertEquals($expected, $parsedMobile);
        });
    }

    public function testParseInvalid()
    {
        $test = collect([
            'aa',
            '61234567',
            '6123456789',
            '812345678',
        ]);

        $test->each(function ($mobile) {
            $parsedMobile = MobileNumberParser::parse($mobile);

            $this->assertNull($parsedMobile);
        });
    }
}
