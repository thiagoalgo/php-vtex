<?php

namespace Thiagoalgo\Vtex\Api\Oms\Orders;

use GuzzleHttp\Client;
use Thiagoalgo\Vtex\Config\Config;

class Order
{

    private $config;
    private $httpClient;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->httpClient = new Client();
    }

    public function get($orderId)
    {
        $url = $this->config->getBaseUrl() . "/api/oms/pvt/orders/" . $orderId;
        $response = $this->httpClient->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-VTEX-API-AppKey' => $this->config->key,
                'X-VTEX-API-AppToken' => $this->config->token
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);

    }

} 