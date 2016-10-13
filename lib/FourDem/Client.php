<?php

namespace FourDem;

use FourDem\HttpClient\HttpClient;

class Client
{
    private $httpClient;

    public function __construct($apikey = '', array $options = array())
    {
        $this->httpClient = new HttpClient($options);

        if ($this->httpClient->getToken() == false) {
            $this->authenticate($apikey);
        }
    }

    /**
     * Returns subscriber api instance
     *
     * @param $recipient_id Id of subscriber recipient's
     */
    public function subscribers($recipientId)
    {
        return new Api\Subscribers($recipientId, $this->httpClient);
    }

    /**
     * Returns recipient api instance
     */
    public function recipients()
    {
        return new Api\Recipients($this->httpClient);
    }

    /**
     * Returns custom fields api instance
     */
    public function customFields()
    {
        return new Api\CustomFields($this->httpClient);
    }

    /**
     * Returns stores api instance
     */
    public function stores()
    {
        return new Api\Ecommerce\Stores($this->httpClient);
    }

    /**
     * Returns products api instance
     */
    public function products()
    {
        return new Api\Ecommerce\Products($this->httpClient);
    }

    /**
     * Returns user information
     */
    public function me()
    {
        return $this->httpClient->get('/me');
    }

    /**
     * Authenticate user
     * @param  string $apiKey
     */
    private function authenticate($apiKey)
    {
        $body = array('APIKey' => $apiKey);

        $response = $this->httpClient->post('/authenticate', $body);

        $this->httpClient->setToken($response->body['token']);
        $this->httpClient->addAuthListener();
    }

}
