<?php

namespace Orbis\SNS\Message;

/**
 * Class IOSMessage
 *
 * @package Orbis\SNS\Message
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class IOSMessage implements MessageInterface
{
    /**
     * {@inheritdoc}
     */
    public function factory($data)
    {
        return json_encode([
           'AppSanBox'=> [
               'title' => $data['title'],
               'body'  => $data['body']
           ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'json';
    }
}
