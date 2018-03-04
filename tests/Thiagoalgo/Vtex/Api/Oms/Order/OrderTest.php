<?php

namespace Thiagoalgo\Vtex\Api\Oms\Order;


use Thiagoalgo\Vtex\Api\Oms\Order;

class OrderTest {
    protected $config;

    public function setUp() {
        $this->config = new Config();
    }

    public function testHasOrderId() {
        $order = new Order($config);
        $ord = $order->get('v1850336lbll-01');

        $ord = json_decode($ord);
        $this->assertArrayHasKey('orderId', $ord);
    }


} 