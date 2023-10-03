<?php

namespace DescomMarket\Common\Parsers;

use Exception;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

final class MobileParser
{
    private static $defaultRegion = 'ES';

    public static function parse(string $mobile): ?string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $phoneNumber = $phoneUtil->parse($mobile, static::$defaultRegion);

            $mobileE164 = $phoneUtil->format($phoneNumber, PhoneNumberFormat::E164);

            if (method_exists(static::class, 'validate' . static::$defaultRegion)) {
                $validateMethod = 'validate' . static::$defaultRegion;

                if (! static::$validateMethod($mobileE164)) {
                    return null;
                }
            }

            return $mobileE164;
        } catch (Exception $e) {
            return null;
        }
    }

    private static function validateES(string $mobileE164): bool
    {
        $length = strlen($mobileE164);

        if ($length !== 12) {
            return false;
        }

        $prefix = substr($mobileE164, 0, 4);

        if ($prefix !== '+346' && $prefix !== '+347') {
            return false;
        }

        return true;
    }
}
