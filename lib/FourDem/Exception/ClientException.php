<?php

namespace FourDem\Exception;

/**
 * ClientException is used when the api returns an error
 */
class ClientException extends \ErrorException implements ExceptionInterface
{

    public $code = null;
    public $body = null;

    public function __construct($message,$body, $code) {
        $this->code = $code;
        $this->body = $body;
        parent::__construct($message);
    }

}
