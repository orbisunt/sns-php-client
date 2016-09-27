<?php

namespace Orbis\SNS\Message;

/**
 * Class AndroidMessage
 *
 * @package Orbis\SNS\Message
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class AndroidMessage implements MessageInterface
{
    /**
     * {@inheritdoc}
     */
    public function factory($data)
    {
        return json_encode([
            'default' => $data['title'],
            'GCM' => json_encode([
                'data' => $data['data'],
                'notification' => [
                    'title' => $data['title'],
                    'body' => $data['body']
                ]
            ])
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
