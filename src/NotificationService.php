<?php

namespace Orbis\SNS;

use Orbis\SNS\Message\MessageInterface;
use Orbis\SNS\Platform\PlaftFormInterface;
use Aws\Sns\SnsClient;

/**
 * Class NotificationService
 *
 * @package Orbis\SNS
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class NotificationService
{
    protected $client;
    protected $platform;

    public function __construct(SnsClient $client, PlaftFormInterface $platform)
    {
        $this->client = $client;
        $this->platform = $platform;
    }

    public function createPlatformEndpoint($deviceToken, $data = [])
    {
        $result = $this->client->createPlatformEndpoint([
            'PlatformApplicationArn' => $this->platform->getTokenArn(),
            'Token' => $deviceToken,
            'CustomUserData' => isset($data['userData']) ? $data['userData'] : null,
            'Attributes' => [
                'Enabled' => 'true'
            ]
        ]);

        if (false === isset($result['EndpointArn'])) {
            return false;
        }

        return $result['EndpointArn'];
    }

    public function deleteEndpoint($endpointArn)
    {
        $this->client->deleteEndpoint(['EndpointArn' => $endpointArn]);
    }

    public function publish($tokenArn, $data)
    {
        $result = $this->client->publish([
            'TargetArn'        => $tokenArn,
            'Message'          => $this->platform->getMessage()->factory($data),
            'MessageStructure' => $this->platform->getMessage()->getType(),
        ]);

        if(false === isset($result['MessageId'])) {
            return false;
        }

        return $result['MessageId'];
    }

    public function setMessage(MessageInterface $message)
    {
        $this->platform->setMessage($message);
    }

    public function setPlatformType($type)
    {
        $this->platform->setType($type);
    }

    public function getPlatform()
    {
        return $this->platform;
    }
}