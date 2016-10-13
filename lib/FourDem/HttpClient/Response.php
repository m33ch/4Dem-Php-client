<?php

namespace FourDem\HttpClient;

/*
 * Response object contains the response returned by the client
 */
class Response
{
    function __construct($body, $code, $headers) {
        $this->body = $body;
        $this->code = $code;
        $this->headers = $headers;
    }

    public function __get($name)
    {
        if ($name == 'code') return $this->code;

        if ($name == 'headers') return $this->headers;

        if (isset($this->body->data[$name]))
            return $this->body->data[$name];

        if (isset($this->body['meta'][$name]))
            return $this->body['meta'][$name];
    }
}
