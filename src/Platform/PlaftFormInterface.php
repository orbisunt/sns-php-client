<?php

namespace Orbis\SNS\Platform;

use Orbis\SNS\Message\MessageInterface;

/**
 * Interface PlaftFormInterface
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
interface PlaftFormInterface
{
    /**
     * Return message platform interface
     *
     * @return MessageInterface
     */
    public function getMessage();

    /**
     * Return message interface
     *
     * @param MessageInterface $message
     * @return void
     */
    public function setMessage(MessageInterface $message);

    /**
     * Return token topic arn
     *
     * @return string
     */
    public function getTokenArn();

    /**
     * Return platform type
     *
     * @return string
     */
    public function getType();

    /**
     * Set platform type
     *
     * @param $type
     * @return string
     */
    public function setType($type);
}