<?php

namespace Orbis\SNS\Platform;

use Orbis\SNS\Exception\InvalidArgumentException;
use Orbis\SNS\Message\MessageInterface;
use SplPriorityQueue;

/**
 * Class ChainPlatform
 *
 * @package Orbis\SNS\Platform
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class ChainPlatform implements PlaftFormInterface
{
    protected $queue;
    protected $type;

    public function __construct(array $platforms = [])
    {
        $this->queue = new SplPriorityQueue();

        foreach ($platforms as $platform) {
            $this->queue->insert($platform, -1);
        }
    }

    public function addPlatform(PlaftFormInterface $plaftForm, $priority = -1)
    {
        $this->queue->insert($plaftForm, $priority);
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenArn()
    {
        return $this->getPlatform()->getTokenArn();
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->getPlatform()->getMessage();
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        if (!PlatformType::isValidValue($type)) {
            throw new InvalidArgumentException(sprintf("Platform '%s' is not supported", $type));
        }

        $this->type = $type;
    }

    /**
     * @return PlaftFormInterface
     */
    private function getPlatform()
    {
        foreach ($this->queue as $platform) {
            if ($platform->getType() == $this->getType()) {
                return $platform;
            }
        }

        return $this->queue->top();
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage(MessageInterface $message)
    {
        $this->getPlatform()->setMessage($message);
    }
}