<?php

namespace FourDem\HttpClient;

use Guzzle\Common\Event;

/**
 * AuthHandler takes care of devising the auth type and using it
 */
class AuthHandler
{
    private $auth;

    const HTTP_HEADER = 1;

    public function __construct(array $auth = array())
    {
        $this->auth = $auth;
    }

    public function onRequestBeforeSend(Event $event)
    {
        if (empty($this->auth)) {
            throw new \ErrorException('Server requires authentication to proceed further. Please check');
        }

        $event['request']->setHeader('Authorization', sprintf('Bearer %s', $this->auth['http_header']));

        return $event;
    }
}
