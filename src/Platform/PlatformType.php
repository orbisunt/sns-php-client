<?php

namespace Orbis\SNS\Platform;

/**
 * Class PlatformType
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class PlatformType
{
    const ANDROID = 'android';
    const IOS = 'ios';
    const WP = 'windows';
    const UKNOW = 'default';
    const AUTO = 'auto';

    public static function isValidValue($value)
    {
        return $value == static::ANDROID ||
               $value == static::IOS ||
               $value == static::WP ||
               $value == static::UKNOW;
    }

}