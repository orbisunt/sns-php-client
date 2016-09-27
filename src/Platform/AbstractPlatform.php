<?php

namespace Orbis\SNS\Platform;

use Orbis\SNS\Message\MessageInterface;

/**
 * Class AbstractPlatform
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
abstract class AbstractPlatform implements PlaftFormInterface
{
    protected $message;
    protected $tokenArm;
    protected $type;

    public function __construct($tokenArm, $type, MessageInterface $message)
    {
        $this->tokenArm = $tokenArm;
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage(MessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenArn()
    {
        return $this->tokenArm;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

}