<?php

namespace Thiagoalgo\Vtex\Api\Oms\Orders\Test;

use Thiagoalgo\Vtex\Config\Config;
use Thiagoalgo\Vtex\Api\Oms\Orders\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
    protected $config;

    public function setUp() {
        $this->config = new Config();
    }

    public function testHasOrderId() {
        $order = new Order($this->config);
        $ord = $order->get('v1850336lbll-01');

        $this->assertArrayHasKey('orderId', $ord);
    }


} 