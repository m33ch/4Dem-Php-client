<?php

namespace FourDem\Api;

use FourDem\HttpClient\HttpClient;

/**
 * Returns recipient api instance
 *
 */
class Recipients
{
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve contacts
     *
     * '/recipients/:recipient_id' GET
     */
    public function index(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/recipients/', $body, $options);

        return $response;
    }

    /**
     * Retrieve custom fields for given recipients contacts
     *
     * '/recipients/:recipient_id/custom_fields' GET
     */
    public function customFields($recipientId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/recipients/'.rawurlencode($recipientId).'/custom_fields', $body, $options);

        return $response;
    }

    /**
     * Retrieve one recipient
     *
     * '/recipients/:recipient_id/:recipient_id' GET
     */
    public function show($recipientId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/recipients/'.rawurlencode($recipient_id), $body, $options);

        return $response;
    }

    /**
     * Subscribe new contact
     *
     * '/recipients/:recipient_id' POST
     *
     * @param $email_address Email address of contact
     */
    public function store(array $body = array(), array $options = array())
    {
        $response = $this->client->post('/recipients/', $body, $options);

        return $response->body;
    }

    /**
     * Update contact
     *
     * '/recipients/:recipient_id/:recipient_id' PUT
     *
     * @param $email_address Email address of contact
     */
    public function update($recipientId, array $body = array(), array $options = array())
    {
        $response = $this->client->put('/recipients/'.rawurlencode($recipientId).'', $body, $options);

        return $response;
    }

    /**
     * Delete one recipient
     *
     * '/recipients/:recipient_id/:recipient_id' DELETE
     */
    public function delete($recipientId, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/recipients/'.rawurlencode($recipientId).'', $body, $options);

        return $response;
    }

}
