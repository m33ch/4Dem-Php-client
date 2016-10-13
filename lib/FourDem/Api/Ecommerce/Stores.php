<?php

namespace FourDem\Api\Ecommerce;

use FourDem\HttpClient\HttpClient;

/**
 * Returns stores api instance
 *
 */
class Stores
{
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve stores
     *
     * '/stores/' GET
     */
    public function index(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/stores/', $body, $options);

        return $response;
    }

    /**
     * Retrieve one store
     *
     * '/stores/:store_id/' GET
     */
    public function show($storeId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/stores/'.rawurlencode($storeId), $body, $options);

        return $response;
    }

    /**
     * Create new store
     *
     * '/stores/' POST
     *
     * @param $email_address Email address of contact
     */
    public function store(array $body = array(), array $options = array())
    {
        $response = $this->client->post('/stores/', $body, $options);

        return $response->body;
    }

    /**
     * Update store
     *
     * '/stores/:store_id' PUT
     *
     * @param $email_address Email address of contact
     */
    public function update($storeId, array $body = array(), array $options = array())
    {
        $response = $this->client->put('/stores/'.rawurlencode($storeId).'', $body, $options);

        return $response;
    }

    /**
     * Delete one store
     *
     * '/stores/:store_id' DELETE
     */
    public function delete($storeId, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/stores/'.rawurlencode($storeId).'', $body, $options);

        return $response;
    }

}
