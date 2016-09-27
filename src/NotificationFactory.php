<?php

namespace Orbis\SNS;

use Orbis\SNS\Exception\InvalidArgumentException;
use Orbis\SNS\Platform\AndroidPlatform;
use Orbis\SNS\Platform\DefaultPlatform;
use Orbis\SNS\Platform\IOSPlatform;
use Orbis\SNS\Platform\PlatformType;

/**
 * Class NotificationFactory
 *
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class NotificationFactory
{
    /**
     * Create notification service from options
     *
     * @param array $options
     * @return NotificationService
     */
    public static function creteService(array $options = [])
    {
        if (!isset($options['sns_client'])) {
            throw new InvalidArgumentException('sns_client parameters is required');
        }

        $platform = isset($options['platform']) ?
            $options['platform'] :
            [];

        switch ($platform['type']) {
            case PlatformType::ANDROID:
                $platformType = new AndroidPlatform($platform['arn']);
                break;

            case PlatformType::IOS:
                $platformType = new IOSPlatform($platform['arn']);
                break;

            case PlatformType::WP:
                // todo add wp platform
                break;

            case PlatformType::AUTO :
                // todo add auto-discover platform
                break;
            default:
                $platformType = new DefaultPlatform($platform['arn']);
                break;
        }

        return new NotificationService($options['sns_client'], $platformType);
    }
}