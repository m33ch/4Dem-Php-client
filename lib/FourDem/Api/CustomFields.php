<?php

namespace FourDem\Api;

use FourDem\HttpClient\HttpClient;

/**
 * Returns custom field api instance
 *
 */
class CustomFields
{
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve custom fields
     *
     * '/custom_fields/:customFieldId' GET
     */
    public function index(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/custom_fields/', $body, $options);

        return $response;
    }

    /**
     * Retrieve one custom field
     *
     * '/custom_fields/:customFieldId/' GET
     */
    public function show($customFieldId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/custom_fields/'.rawurlencode($customFieldId), $body, $options);

        return $response;
    }

    /**
     * Create new custom field
     *
     * '/custom_fields/:customFieldId' POST
     *
     * @param $email_address Email address of contact
     */
    public function store(array $body = array(), array $options = array())
    {
        $response = $this->client->post('/custom_fields/', $body, $options);

        return $response->body;
    }

    /**
     * Update custom field
     *
     * '/custom_fields/:customFieldId' PUT
     *
     * @param $email_address Email address of contact
     */
    public function update($customFieldId, array $body = array(), array $options = array())
    {
        $response = $this->client->put('/custom_fields/'.rawurlencode($customFieldId).'', $body, $options);

        return $response;
    }

    /**
     * Delete one custom field
     *
     * '/custom_fields/:customFieldId' DELETE
     */
    public function delete($customFieldId, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/custom_fields/'.rawurlencode($customFieldId).'', $body, $options);

        return $response;
    }

}
