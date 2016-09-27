<?php

namespace Orbis\SNS\Platform;

use Orbis\SNS\Message\IOSMessage;

/**
 * Class IOSPlatform
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class IOSPlatform extends AbstractPlatform
{
    public function __construct($tokenArm)
    {
        parent::__construct($tokenArm, PlatformType::IOS, new IOSMessage());
    }
}