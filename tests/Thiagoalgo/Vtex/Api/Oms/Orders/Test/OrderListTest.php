<?php

namespace Thiagoalgo\Vtex\Api\Oms\Orders\Test;


use Thiagoalgo\Vtex\Api\Oms\Orders\OrdersList;
use Thiagoalgo\Vtex\Config\Config;
use PHPUnit\Framework\TestCase;

class OrderListTest extends TestCase
{
    protected $config;

    public function setUp() {
        $this->config = new Config();
    }

    public function testHasList() {
        $params = [
            'f_creationDate' => 'creationDate:[2018-02-01T02:00:00.000Z TO 2018-03-01T02:59:59.999Z]',
            'orderBy' => 'creationDate,desc'
        ];

        $ordersList = new OrdersList($params, $this->config);
        $orders = $ordersList->getPage(0);

        $this->assertArrayHasKey('orderId', $orders[0]);
    }

    public function testTotalSize() {
        $params = [
            'f_creationDate' => 'creationDate:[2018-02-01T02:00:00.000Z TO 2018-03-01T02:59:59.999Z]',
            'orderBy' => 'creationDate,desc'
        ];

        $ordersList = new OrdersList($params, $this->config);
        $ordersList->getPage(0);

        $this->assertEquals(5146, $ordersList->getTotalSize());
    }
}