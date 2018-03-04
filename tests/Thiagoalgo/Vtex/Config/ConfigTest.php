<?php

namespace Thiagoalgo\Vtex\Config\Test;

use Thiagoalgo\Vtex\Config\Config;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {

    protected $config;

    public function setUp() {
        $this->config = new Config();
    }

    public function testInstanceOfConfig() {
        $this->assertInstanceOf(Config::class, $this->config);
    }

    public function testHasProperties() {
        $this->assertObjectHasAttribute('account', $this->config);
        $this->assertObjectHasAttribute('environment', $this->config);
        $this->assertObjectHasAttribute('key', $this->config);
        $this->assertObjectHasAttribute('token', $this->config);
    }

}
 