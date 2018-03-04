<?php

namespace Thiagoalgo\Vtex\Config;

use Noodlehaus\Config as ConfigLoader;

class Config {

    public $account;
    public $environment;
    public $key;
    public $token;

    public function __construct($file = null) {
        $this->loadProperties($file);
    }

    private function loadProperties($file) {
        if (!is_null($file)) {
            $config = ConfigLoader::load($file);
        } else {
            $config = ConfigLoader::load('vtex.json');
        }

        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($props as $prop) {
            $property = $prop->getName();
            if ($config->has($property)) {
                $this->{$property} = $config->get($property);
            }

        }

    }

    public function getBaseUrl() {
        return "http://" . $this->account . "." . $this->environment  . ".com.br";
    }

}