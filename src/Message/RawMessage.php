<?php

namespace Orbis\SNS\Message;

/**
 * Class RawMessage
 *
 * @package Orbis\SNS\Message
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class RawMessage implements MessageInterface
{
    /**
     * {@inheritdoc}
     */
    public function factory($data)
    {
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'text';
    }
}