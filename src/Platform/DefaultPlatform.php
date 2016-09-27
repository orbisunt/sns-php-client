<?php

namespace Orbis\SNS\Platform;

use Orbis\SNS\Message\RawMessage;

/**
 * Class DefaultPlatform
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class DefaultPlatform extends AbstractPlatform
{
    public function __construct($tokenArm)
    {
        parent::__construct($tokenArm, PlatformType::UKNOW, new RawMessage());
    }

}