<?php

namespace Thiagoalgo\Vtex\Api\Oms\Orders;


use GuzzleHttp\Client;
use Thiagoalgo\Vtex\Config\Config;
use Elliotchance\Iterator\AbstractPagedIterator;

class OrdersList extends AbstractPagedIterator
{

    protected $params;
    protected $config;
    protected $httpClient;
    protected $totalSize = 0;

    public function __construct(array $params, Config $config) {
        $this->params = $params;
        $this->config = $config;
        $this->httpClient = new Client();
    }

    public function getPageSize()
    {
        return 100;
    }

    public function getTotalSize()
    {
        return $this->totalSize;
    }

    public function getPage($pageNumber)
    {
        // inject pagination data in params array
        $params['per_page'] = $this->getPageSize();
        $params['page'] = $pageNumber + 1;

        $url = $this->config->getBaseUrl() . "/api/oms/pvt/orders";
        $response = $this->httpClient->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-VTEX-API-AppKey' => $this->config->key,
                'X-VTEX-API-AppToken' => $this->config->token
            ],
            'query' => $this->params
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        $this->totalSize = $result['paging']['total'];

        return $result['list'];
    }
}