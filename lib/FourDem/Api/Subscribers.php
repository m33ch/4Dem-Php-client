<?php

namespace FourDem\Api;

use FourDem\HttpClient\HttpClient;

/**
 * Returns subscriber api instance
 *
 * @param $recipient_id Id of subscriber recipient's
 * @param $subscriber_id Id of subscriber
 */
class Subscribers
{

    private $recipient_id;
    private $client;

    public function __construct($recipient_id, HttpClient $client)
    {
        $this->recipient_id = $recipient_id;
        $this->client = $client;
    }

    /**
     * Retrieve contacts
     *
     * '/subscribers/:recipient_id' GET
     */
    public function index(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/recipients/'.rawurlencode($this->recipient_id).'/contacts', $body, $options);

        return $response;
    }

    /**
     * Retrieve one subscriber
     *
     * '/subscribers/:recipient_id/:subscriber_id' GET
     */
    public function show($subscriberId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/recipients/'.rawurlencode($this->recipient_id).'/contacts/'.rawurlencode($subscriberId).'', $body, $options);

        return $response;
    }

    /**
     * Subscribe new contact
     *
     * '/subscribers/:recipient_id' POST
     *
     * @param $email_address Email address of contact
     */
    public function store(array $body = array(), array $options = array())
    {
        $response = $this->client->post('/recipients/'.rawurlencode($this->recipient_id).'/subscribe', $body, $options);

        return $response->body;
    }

    /**
     * Update contact
     *
     * '/subscribers/:recipient_id/:subscriber_id' PUT
     *
     * @param $email_address Email address of contact
     */
    public function update($subscriberId, array $body = array(), array $options = array())
    {
        $response = $this->client->put('/recipients/'.rawurlencode($this->recipient_id).'/contacts/'.rawurlencode($subscriberId).'/update', $body, $options);

        return $response;
    }

    /**
     * Unsubscribe contact from recipient
     *
     * '/subscribers/:recipient_id/unsubscribe' POST
     *
     */
    public function unsubscribe(array $body = array(), array $options = array())
    {
        $response = $this->client->post('/recipients/'.rawurlencode($this->recipient_id).'/unsubscribe', $body, $options);

        return $response;
    }

    /**
     * Delete one subscriber
     *
     * '/subscribers/:recipient_id/:subscriber_id' DELETE
     */
    public function delete($subscriberId, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/recipients/'.rawurlencode($this->recipient_id).'/'.rawurlencode($subscriberId).'', $body, $options);

        return $response;
    }

}
