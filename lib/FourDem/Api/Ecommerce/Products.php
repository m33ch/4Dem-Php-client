<?php

namespace FourDem\Api\Ecommerce;

use FourDem\HttpClient\HttpClient;

/**
 * Returns recipient api instance
 *
 */
class Products
{
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve stores's products
     *
     * '/stores/:store_id/products/all' GET
     */
    public function index($storeId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/stores/'.rawurlencode($storeId).'/products/all', $body, $options);

        return $response;
    }

    /**
     * Retrieve one products on stores
     *
     * '/stores/:store_id/products/' GET
     */
    public function show($storeId, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('/stores/'.rawurlencode($storeId).'/products', $body, $options);

        return $response;
    }

    /**
     * Create new product
     *
     * '/stores/:store_id/products' POST
     *
     */
    public function store($storeId, array $body = array(), array $options = array())
    {
        $response = $this->client->post('/stores/'.rawurlencode($storeId).'/products', $body, $options);

        return $response->body;
    }

    /**
     * Update product
     *
     * '/stores/:store_id' PUT
     *
     * @param $email_address Email address of contact
     */
    public function update($storeId, array $body = array(), array $options = array())
    {
        $response = $this->client->put('/stores/'.rawurlencode($storeId).'/products', $body, $options);

        return $response;
    }

    /**
     * Delete one product
     *
     * '/stores/:store_id/products' DELETE
     */
    public function delete($storeId, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->delete('/stores/'.rawurlencode($storeId).'/products', $body, $options);

        return $response;
    }

}
